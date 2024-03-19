<?php

namespace App\Http\Controllers\API;

use App\Exceptions\AlreadyDislikedFalseException;
use App\Exceptions\AlreadyDislikedFalseJsonException;
use App\Exceptions\AlreadyDislikedTrueException;
use App\Exceptions\AlreadyDislikedTrueJsonException;
use App\Exceptions\AlreadyLikedFalseException;
use App\Exceptions\AlreadyLikedFalseJsonException;
use App\Exceptions\AlreadyLikedTrueException;
use App\Exceptions\AlreadyLikedTrueJsonException;
use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\News\NewsRepository;
use App\Http\Requests\AllNewsRequest;
use App\Http\Requests\NewsDislikeRequest;
use App\Http\Requests\NewsLikeRequest;
use App\Http\Resources\News\NewsResourceCollection;
use App\Http\Services\News\NewsService;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NewsController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class NewsController extends Controller
{
    use ApiResponser;

    /**
     * @var NewsRepository
     */
    private NewsRepository $newsRepository;

    /**
     * NewsController constructor
     *
     * @param NewsRepository $newsRepository
     */
    public function __construct(
        NewsRepository $newsRepository
    ) {
        $this->newsRepository = $newsRepository;
    }

    /**
     * Get all news
     *
     * @throws JsonException
     */
    public function all(AllNewsRequest $allNewsRequest): NewsResourceCollection
    {
        $params = $allNewsRequest->validated();

        try {
            $news = $this->newsRepository->all($params);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return new NewsResourceCollection($news);
    }

    /**
     * Get News by ID
     *
     * @param  int  $id
     * @param  NewsService  $newsService
     * @return JsonResponse
     * @throws JsonException
     */
    public function show(int $id, NewsService $newsService): JsonResponse
    {
        try {
            $news = $newsService->show($id);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(
            __('messages.success'), ['news' => $news],
            Response::HTTP_ACCEPTED
        );
    }

    /**
     * @param  NewsLikeRequest  $newsLikeRequest
     * @param  NewsService  $newsService
     * @return JsonResponse
     * @throws AlreadyLikedFalseJsonException
     * @throws AlreadyLikedTrueJsonException
     * @throws JsonException
     */
    public function newsLike(NewsLikeRequest $newsLikeRequest, NewsService $newsService): JsonResponse
    {
        $data = $newsLikeRequest->validated();

        try {
            $newsLike = $newsService->like($data);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        } catch (AlreadyLikedFalseException $e) {
            throw new AlreadyLikedFalseJsonException($e->getMessage(), $e->getCode());
        }  catch (AlreadyLikedTrueException $e) {
            throw new AlreadyLikedTrueJsonException($e->getMessage(), $e->getCode());
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success_like_news'),  ['newsLike' => $newsLike],  Response::HTTP_OK);
    }

    /**
     * @param  NewsDislikeRequest  $newsDislikeRequest
     * @param  NewsService  $newsService
     * @return JsonResponse
     * @throws AlreadyDislikedFalseJsonException
     * @throws AlreadyDislikedTrueJsonException
     * @throws JsonException
     */
    public function newsDislike(NewsDislikeRequest $newsDislikeRequest, NewsService $newsService): JsonResponse
    {
        $data = $newsDislikeRequest->validated();

        try {
            $newsDislike = $newsService->dislike($data);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        } catch (AlreadyDislikedFalseException $e) {
            throw new AlreadyDislikedFalseJsonException($e->getMessage(), $e->getCode());
        } catch (AlreadyDislikedTrueException $e) {
            throw new AlreadyDislikedTrueJsonException($e->getMessage(), $e->getCode());
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success_dislike_news'),  ['newsDislike' => $newsDislike],  Response::HTTP_OK);
    }
}
