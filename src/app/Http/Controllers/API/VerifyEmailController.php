<?php

namespace App\Http\Controllers\API;

use App\Exceptions\AlreadyVerifiedException;
use App\Exceptions\AlreadyVerifiedJsonException;
use App\Exceptions\InvalidSignatureJsonException;
use App\Exceptions\JsonException;
use App\Exceptions\MemberNotFoundException;
use App\Exceptions\MemberNotFoundJsonException;
use App\Http\Controllers\Controller;
use App\Http\Services\Member\MemberService;
use App\Http\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Exceptions\InvalidSignatureException;
use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthController
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class VerifyEmailController extends Controller
{
    use ApiResponser;

    /**
     * Verify member
     *
     * @throws JsonException
     * @throws InvalidSignatureJsonException
     * @throws MemberNotFoundJsonException
     * @throws AlreadyVerifiedJsonException
     */
    public function verify(
        $member_id,
        Request $request,
        MemberService $memberService
    ): JsonResponse
    {
        try {
            $memberVerify = $memberService->verify($request, $member_id);
        } catch (InvalidSignatureException $e) {
            throw new InvalidSignatureJsonException($e->getMessage(), $e->getCode());
        } catch (MemberNotFoundException $e) {
            throw new MemberNotFoundJsonException($e->getMessage(), $e->getCode());
        } catch (AlreadyVerifiedException $e) {
            throw new AlreadyVerifiedJsonException($e->getMessage(), $e->getCode());
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success_verify'),
            ['user' => $memberVerify], Response::HTTP_OK);
    }

    /**
     * Reverification member
     *
     * @throws JsonException
     * @throws AlreadyVerifiedJsonException
     */
    public function resend(MemberService $memberService): JsonResponse
    {
        try {
            $memberService->resend();
        } catch (AlreadyVerifiedException $e) {
            throw new AlreadyVerifiedJsonException($e->getMessage(), $e->getCode());
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.verify_link_sent'),
            [], Response::HTTP_OK);
    }
}
