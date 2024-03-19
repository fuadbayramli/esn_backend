<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Timeline\TimelineRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TimelineController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class TimelineController extends Controller
{
    use ApiResponser;

    /**
     * @var TimelineRepository
     */
    private TimelineRepository $timelineRepository;

    /**
     * TimelineController constructor
     *
     * @param TimelineRepository $timelineRepository
     */
    public function __construct(
        TimelineRepository $timelineRepository
    ) {
        $this->timelineRepository = $timelineRepository;
    }

    /**
     * Get Timelines
     *
     * @throws JsonException
     */
    public function all(): JsonResponse
    {
        try {
            $timelines = $this->timelineRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'timelines' => $timelines
        ]);
    }
}
