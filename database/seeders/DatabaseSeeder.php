<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()->count(50)->create();
        $this->call(UserSeeder::class);
        $this->call(RestaurantSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(TableSeeder::class);
        Reservation::factory()->count(50)->create();
    }
}
