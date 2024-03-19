<?php

namespace App\Http\Services\Article;

use App\Http\Repositories\Article\ArticleRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class ArticleService
 *
 * @author Mahmmad Mammadov <<muhammed.mammadov.89@gmail.com>>
 */
class ArticleService
{
    /**
     * @var ArticleRepository
     */
    protected ArticleRepository $articleRepository;

    /**
     * @var Authenticatable|null
     */
    protected ?Authenticatable $auth;

    /**
     * @var string
     */
    protected string $directory = 'article/images';
    protected string $directoryPDF = 'article/pdf';

    /**
     * @param ArticleRepository $articleRepository
     * @param Authenticatable|null $auth
     */
    public function __construct(ArticleRepository $articleRepository, ?Authenticatable $auth)
    {
        $this->articleRepository = $articleRepository;
        $this->auth = $auth;
    }

    /**
     * Create new article
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed {
        $data['user_id'] = $this->auth->getAuthIdentifier();
        $data['cover_image'] = $this->uploadImage($data['cover_image']);
        $data['pdf_file'] = $this->uploadPDF($data['pdf_file']);

        return $this->articleRepository->create((new ArticleCreateDataFactory($data))->getData());
    }

    /**
     * Upload article image
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

    /**
     * Upload article pdf
     *
     * @param $pdf
     * @return string
     */
    protected function uploadPDF($pdf): string
    {
        $fileName = date('Y-m-d') . '/' .Str::random(32) . '.' . $pdf->getClientOriginalExtension();
        $fullPath = $this->directoryPDF . '/' . $fileName;

        Storage::disk('public')->put($fullPath, @file_get_contents($pdf));

        return $fullPath;
    }
}
