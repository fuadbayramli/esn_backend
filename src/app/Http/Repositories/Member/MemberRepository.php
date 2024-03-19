<?php

namespace App\Http\Repositories\Member;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\RepositoryInterface;
use App\Models\API\Member;

/**
 * Class Member Repository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class MemberRepository extends BaseRepository implements MemberRepositoryInterface
{
    /**
     * MemberRepository Constructor
     *
     * @param Member $model
     */
    public function __construct(Member $model)
    {
        parent::__construct($model);
    }

    /**
     * Find member by Email
     *
     * @param string $email
     * @return mixed|null
     */
    public function findByEmail(string $email): mixed
    {
        $member = $this->model->where('email', '=', $email)->first();

        if (!$member) {
            return null;
        }

        return $member;
    }

    /**
     * Find member by ID
     *
     * @param int $id
     * @return mixed|null
     */
    public function findById(int $id): mixed
    {
        $member = $this->model->where('id', '=', $id)->first();

        if (!$member) {
            return null;
        }

        return $member;
    }

    /**
     * Get Members by filter
     *
     * @param array $params
     * @return mixed
     */
    public function all(array $params = []): mixed
    {

        $limit = $params['limit'] ?? RepositoryInterface::ALL_METHOD_LIMIT;
        $collection = $this->model::with(['roles', 'roleHistories'])->orderBy('id', "DESC");

        if (array_key_exists('first_name', $params)) {
            $collection = $collection->where('first_name', 'LIKE', "%{$params['first_name']}%");
        }

        if (array_key_exists('last_name', $params)) {
            $collection = $collection->where('last_name', 'LIKE', "%{$params['last_name']}%");
        }

        if (array_key_exists('national_chapter_id', $params)) {
            $collection = $collection->where('national_chapter', $params['national_chapter_id']);
        }

        if (array_key_exists('role_id', $params)) {
            $collection = $collection->whereHas('roles', function ($query) use ($params) {
                $query->where('role_id', $params['role_id']);
            });
        }

        $collection = $collection->paginate($limit);

        if (!$collection) {
            return null;
        }

        return $collection;
    }
}
