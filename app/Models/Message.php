<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'content',
        'meta',
        'channel_id',
        'user_id',
    ];

    /** @return BelongsTo<Channel> */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(
            related: Channel::class,
            foreignKey: 'channel_id',
        );
    }

    /** @return BelongsTo<User> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    /** @return array<string,string> */
    protected function casts(): array
    {
        return [
            'meta' => 'json',
        ];
    }
}
