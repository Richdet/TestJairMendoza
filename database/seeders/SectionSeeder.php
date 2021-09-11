<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new Section();
        $section->id = 1;
        $section->name = 'Ventana';
        $section->save();

        $section = new Section();
        $section->id = 2;
        $section->name = 'Pasillo';
        $section->save();

        $section = new Section();
        $section->id = 3;
        $section->name = 'Jardín';
        $section->save();
    }
}
