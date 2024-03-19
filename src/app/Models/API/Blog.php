<?php

namespace App\Models\API;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Blog
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class Blog extends Model
{
   use SoftDeletes;

    public static function boot()
    {
        parent::boot();

        if (!Auth::guest()) {
            self::creating(function ($model) {
                $user = Auth::user();
                $model->author = $user->name;
            });

            self::updating(function ($model) {
                $user = Auth::user();
                $model->author = $user->name;
            });
        }
    }

    /**
     * @var string[]
     */
   protected $fillable = [
       'user_id',
       'title',
       'cover_image',
       'description',
       'status_id'
   ];

    /**
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class,'user_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class,'status_id','id');
    }

}
