<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class BoardSecretariat
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class BoardSecretariat extends Model
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
     * Country of the board-secretariat
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
