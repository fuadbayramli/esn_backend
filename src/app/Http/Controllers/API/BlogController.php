<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Blog\BlogRepository;
use App\Http\Requests\AllBlogRequest;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Services\Blog\BlogService;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class BlogController extends Controller
{
    use ApiResponser;

    /**
     * @var BlogService
     */
    protected BlogService $blogService;

    /**
     * @var BlogRepository
     */
    protected BlogRepository $blogRepository;

    /**
     * @param BlogService $blogService
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogService $blogService, BlogRepository $blogRepository){
        $this->blogService = $blogService;
        $this->blogRepository = $blogRepository;
    }

    /**
     * Create new blog
     *
     * @throws JsonException
     */
    public function store(
        BlogCreateRequest $blogCreateRequest,
        BlogService    $blogService): JsonResponse
    {
        $data = $blogCreateRequest->validated();

        try {
            $blogData = $blogService->create($data);
        } catch (Exception $e) {
            throw new JsonException($e->getMessage(), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success_create_blog'),
            ['blog' => $blogData], Response::HTTP_CREATED);
    }

    /**
     * Get Blog by ID

     * @throws JsonException
     */
    public function show(int $id): JsonResponse
    {
        try {
            $blog = $this->blogRepository->show($id);
        } catch (ModelNotFoundException) {
            throw new JsonException(__('messages.not_found'), Response::HTTP_NOT_FOUND);
        }
        catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'blog' => $blog
        ]);
    }

    /**
     * Get Blogs
     *
     * @throws JsonException
     */
    public function all(AllBlogRequest $allBlogRequest): JsonResponse
    {
        $params = $allBlogRequest->validated();
        try {
            $blogs = $this->blogRepository->all($params);
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'blogs' => $blogs
        ]);
    }
}
