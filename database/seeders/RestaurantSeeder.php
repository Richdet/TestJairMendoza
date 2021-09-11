<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rest = new Restaurant();
        $rest->id = 1;
        $rest->name = 'Norte';
        $rest->save();

        $rest2 = new Restaurant();
        $rest2->id = 2;
        $rest2->name = 'Centro';
        $rest2->save();

        $rest3 = new Restaurant();
        $rest3->id = 3;
        $rest3->name = 'Pensiones';
        $rest3->save();
    }
}
