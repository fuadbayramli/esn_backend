<?php

namespace App\Http\Repositories\Member;

use App\Http\Repositories\BaseRepository;

/**
 * Interface MemberRepositoryInterface
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
interface MemberRepositoryInterface
{
    /**
     * Find user by email
     *
     * @param string $email
     * @return mixed
     */
    public function findByEmail(string $email);

    /**
     * Find user by id
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id);
}
