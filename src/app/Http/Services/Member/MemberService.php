<?php

namespace App\Http\Services\Member;

use App\Exceptions\AlreadyVerifiedException;
use App\Exceptions\InvalidOldPasswordException;
use App\Exceptions\InvalidSignatureException;
use App\Exceptions\MemberNotFoundException;
use App\Exceptions\RoleNotFoundException;
use App\Http\Repositories\Member\MemberRepository;
use App\Models\Status;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class MemberService
 *
 * @author Mahmmad Mammadov <<muhammed.mammadov.89@gmail.com>>
 */
class MemberService
{
    /**
     * @var MemberRepository
     */
    protected MemberRepository $memberRepository;

    /**
     * @var Authenticatable|null
     */
    protected ?Authenticatable $auth;

    /**
     * @var string
     */
    protected string $directory = 'images';

    /**
     * MemberService constructor
     *
     * @param MemberRepository $memberRepository
     * @param Authenticatable|null $auth
     */
    public function __construct(MemberRepository $memberRepository, ?Authenticatable $auth)
    {
        $this->memberRepository = $memberRepository;
        $this->auth = $auth;
    }

    /**
     * Create Member
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        if (isset($data['avatar'])) {
            $data['avatar'] = $this->uploadAvatar($data['avatar']);
        }

        $data['status_id'] = Status::VALUES['pending'];

        return $this->memberRepository->create((new MemberRegisterDataFactory($data))->getData());
    }

    /**
     * Update Member
     *
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws InvalidOldPasswordException
     * @throws MemberNotFoundException
     */
    public function update(int $id, array $data): mixed
    {
        $member = $this->memberRepository->findById($id);

        if (!isset($member)) {
            throw new MemberNotFoundException();
        }

        $oldAvatar = $member->avatar;

        if (isset($data['old_password'])) {
            $this->verifyPassword($data['old_password'], $member->id);
        }

        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        } else {
            $data['password'] = $member->getAuthPassword();
        }

        if (isset($data['avatar'])) {
            $data['avatar'] = $this->uploadAvatar($data['avatar'], $oldAvatar);
        }

        return $this->memberRepository->update($id, $data);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws MemberNotFoundException
     * @throws RoleNotFoundException
     */
    public function show(int $id): mixed
    {
        $roles = $this->auth->roles;

        if (count($roles) == 0 && $this->auth->getAuthIdentifier() != $id) {
            throw new RoleNotFoundException();
        }

        $member = $this->memberRepository->findById($id);

        if (!isset($member)) {
            throw new MemberNotFoundException();
        }

        return $member->load(['roles', 'roleHistories', 'blogs.status', 'articles.status']);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws RoleNotFoundException
     */
    public function all(array $data): mixed
    {
        $roles = $this->auth->roles;

        if (count($roles) == 0) {
            throw new RoleNotFoundException();
        }

        return $this->memberRepository->all($data);
    }

    /**
     * Verify member
     *
     * @throws MemberNotFoundException
     * @throws InvalidSignatureException
     * @throws AlreadyVerifiedException
     */
    public function verify(Request $request, $member_id)
    {
        $member = $this->memberRepository->findById($member_id);

        if (!isset($member)) {
            throw new MemberNotFoundException();
        }

        if (!$request->hasValidSignature()) {
            throw new InvalidSignatureException();
        }

        if ($member->hasVerifiedEmail()) {
            throw new AlreadyVerifiedException();
        }

        $member->markEmailAsVerified();

        return $member;
    }

    /**
     * Reverification member
     *
     * @return void
     * @throws AlreadyVerifiedException
     */
    public function resend(): void
    {
        if ($this->auth->hasVerifiedEmail()) {
            throw new AlreadyVerifiedException();
        }

        $this->auth->sendEmailVerificationNotification();
    }

    /**
     * Upload member avatar
     *
     * @param $image
     * @param null $oldImage
     * @return string
     */
    protected function uploadAvatar($image, $oldImage = null): string
    {
        if (
            $oldImage != null
            && File::exists(storage_path('/app/public') . '/' .$oldImage)
        ) {
            File::delete(storage_path('/app/public') . '/' . $oldImage);
        }

        $imageName = date('Y-m-d') . '/' .Str::random(32) . '.' . $image->getClientOriginalExtension();
        $fullPath = $this->directory . '/' . $imageName;

        Storage::disk('public')->put($fullPath, @file_get_contents($image));

        return $fullPath;
    }

    /**
     * Verify password
     *
     * @param string $oldPassword
     * @param int $memberId
     * @return void
     * @throws InvalidOldPasswordException
     */
    public function verifyPassword(string $oldPassword, int $memberId): void
    {

        $member = $this->memberRepository->show($memberId);

        $validPassword = Hash::check($oldPassword, $member->getAuthPassword());

        if (!$validPassword) {
            throw new InvalidOldPasswordException();
        }
    }
}
