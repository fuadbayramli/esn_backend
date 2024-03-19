<?php

namespace App\Http\Repositories\Member;

use App\Http\Repositories\BaseRepository;
use App\Models\API\Role;

/**
 * Class MemberRoleRepository Repository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class MemberRoleRepository extends BaseRepository
{
    /**
     * MemberRoleRepository Constructor
     *
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

}

