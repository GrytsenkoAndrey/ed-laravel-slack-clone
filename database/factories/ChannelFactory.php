<?php

namespace Database\Factories;

use App\Enums\Workspace\Visibility;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'reference' => $this->faker->uuid(),
            'description' => $this->faker->sentence(),
            'visibility' => Visibility::Public,
            'user_id' => User::factory(),
            'workspace_id' => Workspace::factory(),
        ];
    }
}
