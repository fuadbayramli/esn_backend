<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Testimonial\TestimonialRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TestimonialController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class TestimonialController extends Controller
{
    use ApiResponser;

    /**
     * @var TestimonialRepository
     */
    private TestimonialRepository $testimonialRepository;

    /**
     * TestimonialController constructor
     *
     * @param TestimonialRepository $testimonialRepository
     */
    public function __construct(
        TestimonialRepository $testimonialRepository
    ) {
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * Get Testimonials
     *
     * @throws JsonException
     */
    public function all(): JsonResponse
    {
        try {
            $testimonials = $this->testimonialRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'testimonials' => $testimonials
        ]);
    }
}
