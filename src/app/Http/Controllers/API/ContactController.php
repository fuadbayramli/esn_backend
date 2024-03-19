<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Contact\ContactRepository;
use App\Http\Requests\ContactRequest;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ContactController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ContactController extends Controller
{
    use ApiResponser;

    /**
     * @var ContactRepository
     */
    private ContactRepository $contactRepository;

    /**
     * ContactController constructor
     *
     * @param ContactRepository $contactRepository
     */
    public function __construct(
        ContactRepository $contactRepository
    ) {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Create new message
     *
     * @throws JsonException
     */
    public function message(ContactRequest $contactRequest): JsonResponse
    {
        $data = $contactRequest->validated();

        try {
            $message = $this->contactRepository->insert($data);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'message' => $message
        ]);
    }
}
