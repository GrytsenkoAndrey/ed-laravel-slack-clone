<?php

declare(strict_types=1);

namespace App\Enums\Identity;

enum Role: string
{
    public const Admin = 'admin';
    public const Member = 'member';
}
