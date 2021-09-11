<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $guarded = ['id'];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function table(){
        return $this->hasOne(Table::class, 'id', 'table_id');
    }
}
