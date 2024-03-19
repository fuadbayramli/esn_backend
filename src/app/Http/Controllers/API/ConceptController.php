<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Concept\ConceptRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ConceptController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ConceptController extends Controller
{
    use ApiResponser;

    /**
     * @var ConceptRepository
     */
    private ConceptRepository $conceptRepository;

    /**
     * ConceptController constructor
     *
     * @param ConceptRepository $conceptRepository
     */
    public function __construct(
        ConceptRepository $conceptRepository
    ) {
        $this->conceptRepository = $conceptRepository;
    }

    /**
     * Get Concepts
     *
     * @throws JsonException
     */
    public function all(): JsonResponse
    {
        try {
            $concepts = $this->conceptRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'concepts' => $concepts
        ]);
    }
}
