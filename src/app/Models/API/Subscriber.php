<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscriber
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class Subscriber extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'email'
    ];

}
