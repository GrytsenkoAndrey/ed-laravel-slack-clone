<?php

declare(strict_types=1);

namespace App\Factories;

use App\Enums\Workspace\Visibility;

final class DefaultChannelFactory
{
    public static function get(): array
    {
        return [
            [
                'name' => 'general',
                'reference' => 'general',
                'description' => 'General discussion',
                'visibility' => Visibility::Public,
            ],
            [
                'name' => 'Admin',
                'reference' => 'admin',
                'description' => 'This is your admin channel.',
                'visibility' => Visibility::Private,
            ],
            [
                'name' => 'Random',
                'reference' => 'random',
                'description' => 'This is your random channel.',
                'visibility' => Visibility::Public,
            ],
        ];
    }
}
