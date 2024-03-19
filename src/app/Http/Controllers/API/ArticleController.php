<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Article\ArticleRepository;
use App\Http\Requests\AllArticleRequest;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Services\Article\ArticleService;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ArticleController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ArticleController extends Controller
{
    use ApiResponser;

    /**
     * @var ArticleService
     */
    protected ArticleService $articleService;

    /**
     * @var articleRepository
     */
    protected ArticleRepository $articleRepository;

    /**
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService,ArticleRepository $articleRepository){
        $this->articleService = $articleService;
        $this->articleRepository = $articleRepository;
    }

    /**
     * Create new article
     *
     * @throws JsonException
     */
    public function store(
        ArticleCreateRequest $articleCreateRequest,
        ArticleService $articleService): JsonResponse
    {
        $data = $articleCreateRequest->validated();

        try {
            $blogData = $articleService->create($data);
        } catch (Exception $e) {
            throw new JsonException($e->getMessage(), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success_create_blog'),
            ['article' => $blogData], Response::HTTP_CREATED);
    }

    /**
     * Get Article by ID

     * @throws JsonException
     */
    public function show(int $id): JsonResponse
    {
        try {
            $blog = $this->articleRepository->show($id);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        }
        catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'article' => $blog
        ]);
    }

    /**
     * Get Articles
     *
     * @throws JsonException
     */
    public function all(AllArticleRequest $allArticleRequest): JsonResponse
    {
        $params = $allArticleRequest->validated();
        try {
            $blogs = $this->articleRepository->all($params);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'articles' => $blogs
        ]);
    }
}
