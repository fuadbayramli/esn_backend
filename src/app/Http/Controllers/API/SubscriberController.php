<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Subscriber\SubscriberRepository;
use App\Http\Requests\SubscriberCreateRequest;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SubscriberController
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class SubscriberController extends Controller
{
    use ApiResponser;

    /**
     * @var SubscriberRepository
     */
    private SubscriberRepository $subscriberRepository;

    /**
     * @param SubscriberRepository $subscriberRepository
     */
    public function __construct(SubscriberRepository $subscriberRepository){
        $this->subscriberRepository = $subscriberRepository;
    }

    /**
     * Create new subscriber
     *
     * @throws JsonException
     */
    public function store(SubscriberCreateRequest $subscriberCreateRequest): JsonResponse
    {
        $data = $subscriberCreateRequest->validated();

        try {
            $message = $this->subscriberRepository->insert($data);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'message' => $message
        ]);
    }
}
