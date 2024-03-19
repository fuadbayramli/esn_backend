<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class About
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class About extends Model
{
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
