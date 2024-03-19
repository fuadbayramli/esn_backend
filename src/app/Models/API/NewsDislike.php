<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsDislike
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class NewsDislike extends Model
{
    /**
     * @var string
     */
    protected $table = 'news_dislikes';

    /**
     * @var string[]
     */
    protected $fillable = ['news_id', 'member_id', 'active'];
}
