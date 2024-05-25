<?php

namespace App\Models;

use App\Observers\WorkspaceObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(classes: WorkspaceObserver::class)]
class Workspace extends Model
{
    use HasFactory;
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'name',
        'description',
        'logo',
        'user_id',
    ];

    /** @return BelongsTo<User> */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    /** @return HasMany<Membership> */
    public function members(): HasMany
    {
        return $this->hasMany(
            related: Membership::class,
            foreignKey: 'workspace_id',
        );
    }

    /** @return HasMany<Channel> */
    public function channels(): HasMany
    {
        return $this->hasMany(
            related: Channel::class,
            foreignKey: 'workspace_id',
        );
    }
}
