<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class NationalChapter extends Model
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
     * Members of the chapter
     *
     * @return HasMany
     */
    public function member(): HasMany
    {
        return $this->hasMany('App\Models\API\Member');
    }

    /**
     * User of the chapter
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
