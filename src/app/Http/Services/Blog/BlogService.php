<?php

namespace App\Http\Services\Blog;

use App\Http\Repositories\Blog\BlogRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class BlogService
 *
 * @author Mahmmad Mammadov <<muhammed.mammadov.89@gmail.com>>
 */
class BlogService
{
    /**
     * @var BlogRepository
     */
    protected BlogRepository $blogRepository;

    /**
     * @var Authenticatable|null
     */
    protected ?Authenticatable $auth;

    /**
     * @var string
     */
    protected string $directory = 'blog/images';

    /**
     * @param BlogRepository $blogRepository
     * @param Authenticatable|null $auth
     */
    public function __construct(BlogRepository $blogRepository, ?Authenticatable $auth)
    {
        $this->blogRepository = $blogRepository;
        $this->auth = $auth;
    }

    /**
     * Create new blog
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed {
        $data['user_id'] = $this->auth->getAuthIdentifier();
        $data['cover_image'] = $this->uploadImage($data['cover_image']);

        return $this->blogRepository->create((new BlogCreateDataFactory($data))->getData());
    }

    /**
     * Upload blog image
     *
     * @param $image
     * @return string
     */
    protected function uploadImage($image): string
    {
        $imageName = date('Y-m-d') . '/' .Str::random(32) . '.' . $image->getClientOriginalExtension();
        $fullPath = $this->directory . '/' . $imageName;

        Storage::disk('public')->put($fullPath, @file_get_contents($image));

        return $fullPath;
    }
}
