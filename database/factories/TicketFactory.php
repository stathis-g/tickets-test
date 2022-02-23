<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->text(200),
            'content' => $this->faker->paragraph(),
            'user_name' => $this->faker->name(),
            'user_email' => $this->faker->email(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => null,
            'status' => 0
        ];
    }
}
