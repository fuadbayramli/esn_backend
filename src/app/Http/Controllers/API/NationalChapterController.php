<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\NationalChapter\NationalChapterRepository;
use App\Http\Requests\AllNationalChapterRequest;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NationalChapterController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class NationalChapterController extends Controller
{
    use ApiResponser;

    /**
     * @var NationalChapterRepository
     */
    private NationalChapterRepository $nationalChapterRepository;

    /**
     * NationalChapterController constructor
     *
     * @param NationalChapterRepository $nationalChapterRepository
     */
    public function __construct(
        NationalChapterRepository $nationalChapterRepository
    ) {
        $this->nationalChapterRepository = $nationalChapterRepository;
    }

    /**
     * Get National Chapters
     *
     * @throws JsonException
     */
    public function all(AllNationalChapterRequest $allNationalChapterRequest): JsonResponse
    {
        $params = $allNationalChapterRequest->validated();
        try {
            $nationalChapters = $this->nationalChapterRepository->all($params);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'national_chapters' => $nationalChapters
        ]);
    }

    /**
     * Get National Chapter by ID

     * @throws JsonException
     */
    public function show(int $id): JsonResponse
    {
        try {
            $nationalChapter = $this->nationalChapterRepository->show($id);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        }
        catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'national_chapter' => $nationalChapter
        ]);
    }
}
