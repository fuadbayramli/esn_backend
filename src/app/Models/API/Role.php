<?php

namespace App\Models\API;

use App\Models\RoleHistory;
use Carbon\Carbon;
use Fico7489\Laravel\Pivot\Traits\PivotEventTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory, PivotEventTrait;

    /**
     * @var string
     */
    protected $table = 'member_roles';

    /**
     * @var string[]
     */
    protected $hidden = ['pivot'];

    /**
     * Catch the pivot role_member table events
     *
     * @return void
     */
    public static function boot(): void
    {
        parent::boot();
        self::roleHistoryAdd();
        self::roleHistoryDelete();
    }

    /**
     * Role history add
     *
     * @return void
     */
    private static function roleHistoryAdd(): void
    {
        $roles = self::all()->pluck( 'name', 'id');
        static::pivotAttached(function ($model, $relationName, $pivotIds) use ($roles) {
            foreach ($pivotIds as $pivotId) {
                RoleHistory::create([
                    'member_id' => $pivotId,
                    'role_name' => $roles[$model->id],
                    'action' => 'added',
                    'user' => 'Local Admin',
                    'date' => Carbon::now(),
                ]);
            }
        });
    }

    /**
     * Role history delete
     *
     * @return void
     */
    private static function roleHistoryDelete(): void
    {
        $roles = self::all()->pluck( 'name', 'id');
        static::pivotDetached(function ($model, $relationName, $pivotIds) use ($roles) {
            foreach ($pivotIds as $pivotId) {
                RoleHistory::create([
                    'member_id' => $pivotId,
                    'role_name' => $roles[$model->id],
                    'action' => 'deleted',
                    'user' => 'Local Admin',
                    'date' => Carbon::now(),
                ]);
            }
        });
    }

    /**
     * Role's members
     *
     * @return BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'role_member', 'role_id', 'member_id');
    }


}
