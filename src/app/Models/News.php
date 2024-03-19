<?php

namespace App\Models;

use App\Models\API\NewsDislike;
use App\Models\API\NewsLike;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * News Model
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class News extends Model
{
    public static function boot()
    {
        parent::boot();

        if (!Auth::guest()) {
            self::creating(function($model)
            {
                $user = Auth::user();
                $model->author = $user->name;
            });

            self::updating(function($model)
            {
                $user = Auth::user();
                $model->author = $user->name;
            });
        }
    }

    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * Date formatted
     *
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Likes of the news
     *
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(NewsLike::class, 'news_id', 'id');
    }

    /**
     * Dislikes of the news
     *
     * @return HasMany
     */
    public function dislikes(): HasMany
    {
        return $this->hasMany(NewsDislike::class, 'news_id', 'id');
    }
}
