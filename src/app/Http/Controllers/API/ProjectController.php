<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Project\ProjectRepository;
use App\Http\Requests\AllProjectRequest;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class ProjectController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ProjectController extends Controller
{
    use ApiResponser;

    /**
     * @var ProjectRepository
     */
    private ProjectRepository $projectRepository;

    /**
     * ProjectController constructor
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(
        ProjectRepository $projectRepository
    ) {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Get all projects
     *
     * @throws JsonException
     */
    public function all(AllProjectRequest $allProjectRequest): JsonResponse
    {
        $params = $allProjectRequest->validated();
        try {
            $projects = $this->projectRepository->all($params);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'projects' => $projects
        ]);
    }

    /**
     * Get Project by ID

     * @throws JsonException
     */
    public function show(int $id): JsonResponse
    {
        try {
            $project = $this->projectRepository->show($id);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        }
        catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'project' => $project
        ]);
    }
}
