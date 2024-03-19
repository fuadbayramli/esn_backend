<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Opportunity\OpportunityRepository;
use App\Http\Requests\AllOpportunityRequest;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class OpportunityController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class OpportunityController extends Controller
{
    use ApiResponser;

    /**
     * @var OpportunityRepository
     */
    private OpportunityRepository $opportunityRepository;

    /**
     * OpportunityController constructor
     *
     * @param OpportunityRepository $opportunityRepository
     */
    public function __construct(
        OpportunityRepository $opportunityRepository
    ) {
        $this->opportunityRepository = $opportunityRepository;
    }

    /**
     * Get all opportunities
     *
     * @throws JsonException
     */
    public function all(AllOpportunityRequest $allOpportunityRequest): JsonResponse
    {
        $params = $allOpportunityRequest->validated();
        try {
            $opportunities = $this->opportunityRepository->all($params);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'opportunities' => $opportunities
        ]);
    }

    /**
     * Get Opportunity by ID

     * @throws JsonException
     */
    public function show(int $id): JsonResponse
    {
        try {
            $opportunity = $this->opportunityRepository->show($id);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        }
        catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'opportunity' => $opportunity
        ]);
    }
}
