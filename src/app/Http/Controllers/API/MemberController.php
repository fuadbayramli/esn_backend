<?php

namespace App\Http\Controllers\API;

use App\Exceptions\InvalidOldPasswordException;
use App\Exceptions\InvalidOldPasswordJsonException;
use App\Exceptions\JsonException;
use App\Exceptions\MemberNotFoundException;
use App\Exceptions\MemberNotFoundJsonException;
use App\Exceptions\RoleNotFoundException;
use App\Exceptions\RoleNotFoundJsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Member\MemberRepository;
use App\Http\Requests\AllMemberRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Http\Resources\Member\MemberResourceCollection;
use App\Http\Services\Member\MemberService;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MemberController
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class MemberController extends Controller
{
    use ApiResponser;

    /**
     * @var MemberRepository
     */
    private MemberRepository $memberRepository;

    /**
     * Member constructor
     *
     * @param  MemberRepository  $memberRepository
     */
    public function __construct(
        MemberRepository $memberRepository
    ) {
        $this->memberRepository = $memberRepository;
    }

    /**
     * @param int $id
     * @param MemberService $memberService
     * @return JsonResponse
     * @throws JsonException
     * @throws MemberNotFoundJsonException
     * @throws RoleNotFoundJsonException
     */
    public function show(int $id, MemberService $memberService): JsonResponse
    {
        try {
            $member = $memberService->show($id);
        } catch (RoleNotFoundException $e) {
            throw new RoleNotFoundJsonException($e->getMessage(), $e->getCode());
        } catch (MemberNotFoundException $e) {
            throw new MemberNotFoundJsonException($e->getMessage(), $e->getCode());

        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(
            __('messages.success'), ['member' => $member],
            Response::HTTP_ACCEPTED
        );
    }

    /**
     * Get all member
     *
     * @param AllMemberRequest $allMemberRequest
     * @param MemberService $memberService
     * @return MemberResourceCollection
     * @throws JsonException
     * @throws RoleNotFoundJsonException
     */
   public function all(AllMemberRequest $allMemberRequest, MemberService $memberService): MemberResourceCollection
   {
       $params = $allMemberRequest->validated();
       try {
           $data = $memberService->all($params);
       } catch (RoleNotFoundException $e) {
           throw new RoleNotFoundJsonException($e->getMessage(), $e->getCode());
       } catch (Exception) {
           throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
       }

       return new MemberResourceCollection($data);
   }

    /**
     * Update existing member profile
     *
     * @param int $id
     * @param MemberUpdateRequest $memberUpdateRequest
     * @param MemberService $memberService
     * @return JsonResponse
     * @throws JsonException
     * @throws MemberNotFoundJsonException
     * @throws InvalidOldPasswordJsonException
     */
    public function update(
        int $id,
        MemberUpdateRequest $memberUpdateRequest,
        MemberService $memberService
    ): JsonResponse
    {
        $params = $memberUpdateRequest->validated();

        try {
            $data = $memberService->update($id, $params);
        } catch (MemberNotFoundException $e) {
            throw new MemberNotFoundJsonException($e->getMessage(), $e->getCode());
        } catch (InvalidOldPasswordException $e) {
            throw new InvalidOldPasswordJsonException($e->getMessage(), $e->getCode());
        } catch (Exception $e) {
            throw new JsonException($e->getMessage(), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(
            __('messages.success_update'), ['user' => $data],
            Response::HTTP_ACCEPTED
        );
    }
}
