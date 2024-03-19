<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Event\EventRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class EventController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class EventController extends Controller
{
    use ApiResponser;

    /**
     * @var EventRepository
     */
    private EventRepository $eventRepository;

    /**
     * EventController constructor
     *
     * @param EventRepository $eventRepository
     */
    public function __construct(
        EventRepository $eventRepository
    ) {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Get Events
     *
     * @throws JsonException
     */
    public function all(): JsonResponse
    {
        try {
            $events = $this->eventRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'Events' => $events
        ]);
    }
}
