<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\BoardSecretariat\BoardSecretariatRepository;
use App\Http\Requests\AllBoardSecretariatRequest;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class BoardSecretariatController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class BoardSecretariatController extends Controller
{
    use ApiResponser;

    /**
     * @var BoardSecretariatRepository
     */
    private BoardSecretariatRepository $boardSecretariatRepository;

    /**
     * BoardSecretariatController constructor
     *
     * @param BoardSecretariatRepository $boardSecretariatRepository
     */
    public function __construct(
        BoardSecretariatRepository $boardSecretariatRepository
    ) {
        $this->boardSecretariatRepository = $boardSecretariatRepository;
    }

    /**
     * Get all BoardSecretariats
     *
     * @throws JsonException
     */
    public function all(AllBoardSecretariatRequest $allBoardSecretariatRequest): JsonResponse
    {
        $params = $allBoardSecretariatRequest->validated();
        try {
            $boardSecretariats = $this->boardSecretariatRepository->all($params);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'boardSecretariats' => $boardSecretariats
        ]);
    }

    /**
     * Get BoardSecretariat by ID

     * @throws JsonException
     */
    public function show(int $id): JsonResponse
    {
        try {
            $boardSecretariat = $this->boardSecretariatRepository->show($id);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        }
        catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'boardSecretariat' => $boardSecretariat
        ]);
    }
}
