<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Status extends Model
{
    /**
     * Member statuses
     */
    public const VALUES = [
        'pending'  => 1,
        'active'   => 2,
        'rejected' => 3
    ];

    /**
     * @var string[]
     */
    protected $hidden = ['created_at','updated_at'];
}
