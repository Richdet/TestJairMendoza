<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $name = $this->faker->firstName();
        $lastname = $this->faker->lastName();
        //$nickname = Str::substr($name, 0, 1).Str::lower($lastname);
        $birthday = $this->faker->dateTimeBetween('-70 years', 'now')->format('Y-m-d');
        $rfc = Str::substr($lastname, 0, 3).Str::substr($name, 0, 1).Str::substr($birthday, 2, 2).Str::substr($birthday, 5, 2).Str::substr($birthday, 8, 2).$this->faker->randomElement(['L51', 'L50', 'L34', 'L27', 'L09']); 

        return [
            'name' => $name,
            'lastname' => $lastname,
            'birthday' => $birthday,
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->numerify('###-###-####'),
            'rfc' => Str::upper($rfc),
            'nickname' => $this->faker->unique()->userName()
            
        ];
    }
}
