<?php

namespace Database\Factories;

use App\Enums\Identity\Role;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role' => Role::Member,
            'user_id' => User::factory(),
            'workspace_id' => Workspace::factory(),
        ];
    }
}
