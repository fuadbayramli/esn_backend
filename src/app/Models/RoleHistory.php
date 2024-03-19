<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class RoleHistory extends Model
{
    /**
     * @var string
     */
    protected $table = 'role_histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'member_id',
        'role_name',
        'action',
        'user',
        'date',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

}
