<?php

namespace App\Http\Services\Member;

use App\Exceptions\InvalidPasswordException;
use App\Exceptions\InvalidTokenException;
use App\Exceptions\MemberNotFoundException;
use App\Exceptions\ThrottleRequestsException;
use App\Http\Repositories\Member\MemberRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

/**
 * Class MemberAuthService
 *
 * @author Mahmmad Mammadov <<muhammed.mammadov.89@gmail.com>>
 */
class MemberAuthService
{
    /**
     * @var MemberRepository
     */
    protected MemberRepository $memberRepository;

    /**
     * MemberAuthService constructor.
     *
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Check up member credentials
     *
     * @param string $email
     * @param string $password
     * @return mixed|null
     * @throws InvalidPasswordException
     * @throws MemberNotFoundException
     */
    public function loginAttempt(string $email, string $password): mixed
    {
        $user = $this->memberRepository->findByEmail($email);

        if (!isset($user)) {
            throw new MemberNotFoundException();
        }

        $validPassword = Hash::check($password, $user->getAuthPassword());

        if (!$validPassword) {
            throw new InvalidPasswordException();
        }

            return $user->load(['roles', 'roleHistories', 'blogs.status', 'articles.status']);
    }

    /**
     * Created Password reset link
     *
     * @throws MemberNotFoundException
     * @throws ThrottleRequestsException
     */
    public function forgotPasswordLink(array $data): bool|string
    {
        $response = Password::sendResetLink($data);

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return true;
            case Password::INVALID_USER:
                throw new MemberNotFoundException();
            case Password::RESET_THROTTLED:
                throw new ThrottleRequestsException();
        }

        return $response;
    }

    /**
     * Reset Password
     *
     * @param array $data
     * @return bool
     * @throws InvalidTokenException
     * @throws MemberNotFoundException
     */
    public function resetPassword(array $data): bool
    {
        $response =  Password::reset($data, function($member, $password){
            $this->resetPasswordMember($member, $password);
        });

        switch ($response) {
            case Password::INVALID_USER:
                throw new MemberNotFoundException();
            case Password::INVALID_TOKEN:
                throw new InvalidTokenException();
            case Password::PASSWORD_RESET:
                return true;
        }

        return true;
    }

    /**
     * Reset Member password
     *
     * @param $member
     * @param $password
     */
    protected function resetPasswordMember($member, $password): void
    {
        $member->forceFill([
            'password' => Hash::make($password)
        ])->save();
    }

    /**
     * Logout member
     *
     * @return void
     */
    public function logout(): void
    {
        Auth::user()->token()->revoke();
    }
}
