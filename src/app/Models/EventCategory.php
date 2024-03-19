<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class EventCategory
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class EventCategory extends Model
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
}
