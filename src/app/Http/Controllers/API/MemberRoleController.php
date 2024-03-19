<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Member\MemberRoleRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MemberRoleController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class MemberRoleController extends Controller
{
    use ApiResponser;

    /**
     * @var MemberRoleRepository
     */
    private MemberRoleRepository $memberRoleRepository;

    /**
     * MemberRoleController constructor
     *
     * @param MemberRoleRepository $memberRoleRepository
     */
    public function __construct(
        MemberRoleRepository $memberRoleRepository
    ) {
        $this->memberRoleRepository = $memberRoleRepository;
    }

    /**
     * Get roles
     *
     * @throws JsonException
     */
    public function all(): JsonResponse
    {
        try {
            $roles = $this->memberRoleRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'roles' => $roles
        ]);
    }
}
