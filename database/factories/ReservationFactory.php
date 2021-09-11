<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Traits\MyTraits;

class ReservationFactory extends Factory
{
    use MyTraits;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1, 50) ,
            'table_id' => $this->faker->numberBetween(1, 45),
            'date_reservation' => $this->faker->randomElement(['2021-09-09', '2021-09-13', '2021-11-09']) ,
            'time' => $this->faker->randomElement(['15:30', '18:34', '20:04']),
            'factura' => $this->faker->randomElement(['0', '1']) ,
            'folio' => $this->generateCode(8),
        ];
    }
}
