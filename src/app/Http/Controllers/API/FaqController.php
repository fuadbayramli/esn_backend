<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Faq\FaqRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FaqController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class FaqController extends Controller
{
    use ApiResponser;

    /**
     * @var FaqRepository
     */
    private FaqRepository $faqRepository;

    /**
     * FaqController constructor
     *
     * @param FaqRepository $faqRepository
     */
    public function __construct(
        FaqRepository $faqRepository
    ) {
        $this->faqRepository = $faqRepository;
    }

    /**
     * Get faqs
     *
     * @throws JsonException
     */
    public function all(): JsonResponse
    {
        try {
            $faqs = $this->faqRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'faqs' => $faqs
        ]);
    }
}
