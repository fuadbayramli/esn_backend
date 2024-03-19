<?php

namespace App\Models;

use App\Models\API\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Country Model
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class Country extends Model
{
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Country's members
     *
     * @return HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class, 'country');
    }
}
