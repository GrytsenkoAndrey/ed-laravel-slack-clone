<?php

declare(strict_types=1);

namespace App\Enums\Identity;

enum Role: string
{
    case Admin = 'admin';
    case Member = 'member';
}
