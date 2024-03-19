<?php

namespace App\Models\API;

use App\Models\RoleHistory;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Carbon\Carbon;
use Fico7489\Laravel\Pivot\Traits\PivotEventTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class Member extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, PivotEventTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'nam_youth_email',
        'date_of_birth',
        'nationality',
        'phone_number',
        'gender_id',
        'status_id',
        'country',
        'postal_code',
        'city',
        'national_chapter',
        'fb',
        'linkedin',
        'tw',
        'ins',
        'email',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'deleted_at',
        'pivot'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

        if (!Auth::guest()) {
            self::updating(function ($model) {
                $user = Auth::user();
                $model->author = $user->name;
            });
        }
    }

    /**
     * Role history add
     *
     * @return void
     */
    private static function roleHistoryAdd(): void
    {
        $roles = Role::all()->pluck( 'name', 'id');
        static::pivotAttached(function ($model, $relationName, $pivotIds) use ($roles) {
            foreach ($pivotIds as $pivotId) {
                RoleHistory::create([
                    'member_id' => $model->id,
                    'role_name' => $roles[$pivotId],
                    'action' => 'added',
                    'user' => 'Local Admin',
                    'date' => Carbon::now(),
                ]);

                $user = Auth::user();
                $model->author = $user->name;
                $model->save();
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
        $roles = Role::all()->pluck( 'name', 'id');
        static::pivotDetached(function ($model, $relationName, $pivotIds) use ($roles) {
            foreach ($pivotIds as $pivotId) {
                RoleHistory::create([
                    'member_id' => $model->id,
                    'role_name' => $roles[$pivotId],
                    'action' => 'deleted',
                    'user' => 'Local Admin',
                    'date' => Carbon::now(),
                ]);

                $user = Auth::user();
                $model->author = $user->name;
                $model->save();
            }
        });
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmailNotification);
    }

    /**
     * Member's roles
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_member', 'member_id', 'role_id');
    }

    /**
     * Member's national chapter
     *
     * @return BelongsTo
     */
    public function chapter(): BelongsTo
    {
        return $this->belongsTo('App\Models\NationalChapter', 'national_chapter', 'id');
    }

    /**
     * Member's status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * User (local admin) can see only own chapter members
     *
     * @param $query
     * @return mixed
     */
    public function scopeUserMembers($query): mixed
    {
        if (in_array(auth()->user()->role->name, ['admin', 'super admin'])) {
            return $query;
        }

        return $query->where("national_chapter", auth()->user()->chapter->id ?? 0);
    }

    /**
     * Member's country
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Country', 'country', 'id');
    }

    /**
     * Member's role histories
     *
     * @return HasMany
     */
    public function roleHistories(): HasMany
    {
        return $this->hasMany(RoleHistory::class)->orderBy('date', 'desc');
    }

    /**
     * Member's blogs
     *
     * @return HasMany
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class,'user_id','id');
    }

    /**
     * Member's articles
     *
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class,'user_id','id');
    }
}
