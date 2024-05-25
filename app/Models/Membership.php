<?php

namespace App\Models;

use App\Enums\Identity\Role;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Membership extends Model
{
    use HasFactory;
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'role',
        'user_id',
        'workspace_id',
    ];

    /** @return BelongsTo<User> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    /** @return BelongsTo<Workspace> */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(
            related: Workspace::class,
            foreignKey: 'workspace_id',
        );
    }

    /** @return array<string,string|class-string> */
    protected function casts(): array
    {
        return [
            'role' => Role::class,
        ];
    }
}
