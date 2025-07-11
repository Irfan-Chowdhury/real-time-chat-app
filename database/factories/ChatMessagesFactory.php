<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ChatMessages;
use Illuminate\Database\Eloquent\Factories\Factory;

// class ChatMessagesFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             //
//         ];
//     }
// }


class ChatMessagesFactory extends Factory
{
    protected $model = ChatMessages::class;

    public function definition(): array
    {
        return [
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'text' => $this->faker->sentence,
            'is_read' => $this->faker->boolean(70), 
        ];
    }

    public function unread(): static
    {
        return $this->state(fn () => [
            'is_read' => false,
        ]);
    }
}
