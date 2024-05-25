<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Identity\Provider;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUlids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'handle',
        'email',
        'avatar',
        'password',
        'provider',
        'provider_id',
        'onboarded',
        'current_workspace_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'onboarded' => 'boolean',
        'provider' => Provider::class,
    ];

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(
            related: Workspace::class,
            foreignKey: 'current_workspace_id',
        );
    }

    public function workspaces(): HasMany
    {
        return $this->hasMany(
            related: Workspace::class,
            foreignKey: 'user_id',
        );
    }

    public function memberships(): HasMany
    {
        return $this->hasMany(
            related: Membership::class,
            foreignKey: 'user_id',
        );
    }

    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Channel::class,
            table: 'channel_user',
        );
    }

    public function messages(): HasMany
    {
        return $this->hasMany(
            related: Message::class,
            foreignKey: 'user_id',
        );
    }
}
