<?php

namespace App\Http\Services\News;

use App\Exceptions\AlreadyDislikedFalseException;
use App\Exceptions\AlreadyDislikedTrueException;
use App\Exceptions\AlreadyLikedFalseException;
use App\Exceptions\AlreadyLikedTrueException;
use App\Http\Repositories\News\NewsDislikeRepository;
use App\Http\Repositories\News\NewsLikeRepository;
use App\Http\Repositories\News\NewsRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class NewsService
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class NewsService
{
    /**
     * @var Authenticatable|null
     */
    protected ?Authenticatable $auth;

    /**
     * @var NewsRepository
     */
    protected NewsRepository $newsRepository;

    /**
     * @var NewsLikeRepository;
     */
    protected NewsLikeRepository $newsLikeRepository;

    /**
     * @var NewsDislikeRepository;
     */
    protected NewsDislikeRepository $newsDislikeRepository;

    /**
     * NewsService constructor.
     *
     * @param  NewsRepository  $newsRepository
     * @param  NewsLikeRepository  $newsLikeRepository
     * @param  NewsDislikeRepository  $newsDislikeRepository
     * @param  Authenticatable|null  $auth
     */
    public function __construct(
        NewsRepository $newsRepository,
        NewsLikeRepository $newsLikeRepository,
        NewsDislikeRepository $newsDislikeRepository,
        ?Authenticatable $auth
    )
    {
        $this->newsRepository = $newsRepository;
        $this->newsLikeRepository = $newsLikeRepository;
        $this->newsDislikeRepository = $newsDislikeRepository;
        $this->auth = $auth;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id): mixed
    {
        $news = $this->newsRepository->findById($id);

        if (!isset($news)) {
            throw new ModelNotFoundException();
        }

        $news->increment('read_count');

        return $news;
    }

    /**
     * @param  array  $data
     * @return mixed
     * @throws AlreadyLikedFalseException
     * @throws AlreadyLikedTrueException
     */
    public function like(array $data): mixed
    {
        $news = $this->newsRepository->show($data['news_id'])->toArray();
        $this->checkLikeStatus($news);

        return $this->newsLikeRepository->create([
            'news_id' => $news['id'],
            'active' => true,
            'member_id' => $this->auth->getAuthIdentifier()
        ]);
    }

    /**
     * @param  array  $data
     * @return mixed
     * @throws AlreadyDislikedFalseException
     * @throws AlreadyDislikedTrueException
     */
    public function disLike(array $data): mixed
    {
        $news = $this->newsRepository->show($data['news_id'])->toArray();
        $this->checkDislikeStatus($news);

        return $this->newsDislikeRepository->create([
            'news_id' => $news['id'],
            'active' => true,
            'member_id' => $this->auth->getAuthIdentifier()
        ]);
    }

    /**
     * Client Like status
     *
     * @param  array  $data
     * @return bool
     * @throws AlreadyLikedFalseException
     * @throws AlreadyLikedTrueException
     */
    public function checkLikeStatus(array $data): bool
    {
        $likeCredentials = $this->getLikeData($data['id']);
        $dislikeCredentials = $this->getDislikeData($data['id']);

        $like = $this->newsLikeRepository->findByParams($likeCredentials);
        $dislike = $this->newsDislikeRepository->findByParams($dislikeCredentials);

        if ($like && $like['active']) {
            $this->newsLikeRepository->update($like->id, ['active' => false]);
            throw new AlreadyLikedFalseException();
        }
        if ($like && !$like['active']) {
            $this->newsLikeRepository->update($like->id, ['active' => true]);
            throw new AlreadyLikedTrueException();
        }

        if ($dislike) {
            $this->newsDislikeRepository->delete($dislike->id);
        }

        return true;
    }

    /**
     * @param  array  $data
     * @return bool
     * @throws AlreadyDislikedFalseException
     * @throws AlreadyDislikedTrueException
     */
    public function checkDislikeStatus(array $data): bool
    {
        $likeCredentials = $this->getLikeData($data['id']);
        $dislikeCredentials = $this->getDislikeData($data['id']);

        $like = $this->newsLikeRepository->findByParams($likeCredentials);
        $dislike = $this->newsDislikeRepository->findByParams($dislikeCredentials);

        if ($dislike && $dislike['active']) {
            $this->newsDislikeRepository->update($dislike->id, ['active' => false]);
            throw new AlreadyDislikedFalseException();
        }
        if ($dislike && !$dislike['active']) {
            $this->newsDislikeRepository->update($dislike->id, ['active' => true]);
            throw new AlreadyDislikedTrueException();
        }

        if ($like) {
            $this->newsLikeRepository->delete($like->id);
        }

        return true;
    }

    /**
     * Get like data
     *
     * @param  int  $newsId
     * @return array
     */
    public function getLikeData(int $newsId): array
    {
        return [
            'news_id' => $newsId,
            'member_id' => $this->auth->getAuthIdentifier()
        ];
    }

    /**
     * Get dislike data
     *
     * @param  int  $newsId
     * @return array
     */
    public function getDislikeData(int $newsId): array
    {
        return [
            'news_id' => $newsId,
            'member_id' => $this->auth->getAuthIdentifier()
        ];
    }
}
