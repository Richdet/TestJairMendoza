<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Carbon\Carbon;

trait MyTraits{
    public function formatDateEmployee($date){
        $year = Str::substr($date, 0, 4);
        $month = Str::substr($date, 5, 2);
        $day = Str::substr($date, 8, 2);
        $newDate = Carbon::createFromDate($year, $month, $day)->isoFormat('DD/MMM/G');

        return $newDate;
    }  

    public function generateCode($length){
        $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($pattern);
        $random_string = '';
        for($i = 0; $i < $length; $i++) {
            $random_character = $pattern[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
    
        return $random_string;
    }
}