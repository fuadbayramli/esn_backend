<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsLike
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class NewsLike extends Model
{
    /**
     * @var string
     */
    protected $table = 'news_likes';

    /**
     * @var string[]
     */
    protected $fillable = ['news_id', 'member_id', 'active'];
}
