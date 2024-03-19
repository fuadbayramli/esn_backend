<?php

namespace App\Http\Controllers\API;

use App\Events\Registered;
use App\Exceptions\InvalidPasswordException;
use App\Exceptions\InvalidPasswordJsonException;
use App\Exceptions\InvalidTokenException;
use App\Exceptions\InvalidTokenJsonException;
use App\Exceptions\JsonException;
use App\Exceptions\MemberNotFoundException;
use App\Exceptions\MemberNotFoundJsonException;
use App\Exceptions\ThrottleRequestsException;
use App\Exceptions\ThrottleRequestsJsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\MemberAuthRequest;
use App\Http\Requests\MemberRegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Services\Member\MemberAuthService;
use App\Http\Services\Member\MemberService;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class AuthController extends Controller
{
    use ApiResponser;

    /**
     * @var MemberAuthService
     */
    protected MemberAuthService $memberAuthService;

    /**
     * MemberAuthController construct
     *
     * @param MemberAuthService $memberAuthService
     */
    public function __construct(MemberAuthService $memberAuthService)
    {
        $this->memberAuthService = $memberAuthService;
    }

    /**
     * Member registration
     *
     * @param MemberRegisterRequest $memberRegisterRequest
     * @param MemberService $memberService
     * @return JsonResponse
     * @throws JsonException
     */
    public function register(
        MemberRegisterRequest $memberRegisterRequest,
        MemberService $memberService
    ): JsonResponse
    {
        $data = $memberRegisterRequest->validated();

        try {
            $member = $memberService->create($data);
            event(new Registered($member));
            $token = $member->createToken('EsnToken')->accessToken;

            $memberData = [
                'user' => $member,
                'access_token' => $token
            ];
        } catch (Exception $e) {
            throw new JsonException($e->getMessage(), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success_registration'),
            $memberData, Response::HTTP_CREATED);
    }

    /**
     * Authorization Member
     *
     * @param MemberAuthRequest $memberAuthRequest
     * @return JsonResponse
     * @throws InvalidPasswordJsonException
     * @throws JsonException
     * @throws MemberNotFoundJsonException
     */
    public function auth(
        MemberAuthRequest $memberAuthRequest,
    ): JsonResponse
    {
        $data = $memberAuthRequest->validated();

        try {
            $member = $this->memberAuthService->loginAttempt($data['email'], $data['password']);
            $token = $member->createToken('EsnToken')->accessToken;
        } catch (MemberNotFoundException $e) {
            throw new MemberNotFoundJsonException($e->getMessage(), $e->getCode());
        } catch (InvalidPasswordException $e) {
            throw new InvalidPasswordJsonException($e->getMessage(), $e->getCode());
        } catch (Exception $e) {
            throw new JsonException($e->getMessage(), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('auth.success'), [
            'user' => $member,
            'access_token' => $token
        ]);
    }

    /**
     * Forgot password
     *
     * @throws JsonException
     * @throws ThrottleRequestsJsonException
     * @throws MemberNotFoundJsonException
     */
    public function forgotPassword(ForgotPasswordRequest $forgotPasswordRequest): JsonResponse
    {
        $data = $forgotPasswordRequest->validated();

        try {
            $response = $this->memberAuthService->forgotPasswordLink($data);
        } catch (MemberNotFoundException $e) {
            throw new MemberNotFoundJsonException($e->getMessage(), $e->getCode());
        } catch(ThrottleRequestsException $e) {
            throw new ThrottleRequestsJsonException($e->getMessage(), $e->getCode());
        } catch(Exception $e) {
            throw new JsonException($e->getMessage(), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return  $this->successResponse(__('passwords.sent'),  ['resetLink' => $response]);

    }

    /**
     * Reset Password
     *
     * @throws JsonException
     * @throws MemberNotFoundJsonException|InvalidTokenJsonException
     */
    public function resetPassword(ResetPasswordRequest $resetPasswordRequest): JsonResponse
    {
        $credentials = $resetPasswordRequest->validated();

        try{
            $resetUserPassword = $this->memberAuthService->resetPassword($credentials);
        } catch (MemberNotFoundException $e) {
            throw new MemberNotFoundJsonException($e->getMessage(), $e->getCode());
        } catch (InvalidTokenException $e) {
            throw new InvalidTokenJsonException($e->getMessage(), $e->getCode());
        } catch(Exception $e) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return  $this->successResponse(__('passwords.reset'),  ['resetPassword' => $resetUserPassword]);
    }

    /**
     * Member logout
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->memberAuthService->logout();

        return $this->successResponse(__('auth.logout'));
    }
}
