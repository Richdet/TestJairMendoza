<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Section;
use App\Models\Table;

class RestaurantController extends Controller
{
    public function getRestaurants(){
        $rest = Restaurant::all();

        return response()->json([
            'succes' => true,
            'data' => $rest
        ]);
    }

    public function getSections(){
        $section = Section::all();

        return response()->json([
            'succes' => true,
            'data' => $section
        ]);
    }

    public function getTables($rest, $section){
        $tables = Table::where([
            ['restaurant_id', '=', $rest],
            ['section_id', '=', $section],
        ])->get();

        return response()->json([
            'succes' => true,
            'data' => $tables
        ]);
    }
}
