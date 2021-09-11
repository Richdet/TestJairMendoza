<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Traits\MyTraits;
use Carbon\Carbon;
use Illuminate\Support\Str;


class ReservationController extends Controller
{
    use MyTraits;

    public function getAll(){
        $reservations = Reservation::with(['client', 'table', 'table.restaurant', 'table.section'])->get();

        return datatables()->of($reservations)
                ->editColumn('client', function(Reservation $reservation){
                    return $reservation->client->name.' '.$reservation->client->lastname;
                })
                ->editColumn('restaurant', function(Reservation $reservation){
                    return $reservation->table->restaurant->name;
                })
                ->editColumn('section', function(Reservation $reservation){
                    return $reservation->table->section->name;
                })
                ->editColumn('table', function(Reservation $reservation){
                    return $reservation->table->num_table;
                })
                ->editColumn('date_reservation', function(Reservation $reservation){
                    return $this->formatDateEmployee($reservation->date_reservation);
                })
                ->addColumn('factura', 'admin.includes.active')
                ->addColumn('actions', 'admin.includes.btn')
                ->rawColumns(['actions', 'factura'])
                ->toJson();
    }

    public function create(Request $request){
        
        if($this->validateTime($request->date_reservation, $request->time, $request->table_id, null)){
            $newReservation = (new Reservation())->fill($request->all());
            $newReservation->folio = $this->generateCode(8);
            $newReservation->save();

            return response()->json([
                'succes' => true,
                'msg' => 'Agregado',
                'data' => $request->all()
            ]);
        }else{
            return response()->json([
                'succes' => false,
                'msg' => 'Horario no disponible'
            ]);
        } 

        return response()->json([
            'succes' => false,
            'msg' => $request->all()
        ]);
        
    }

    public function show($id){
        $reservation = Reservation::with(['table'])->find($id);

        return response()->json([
            'succes' => true,
            'reservation' => $reservation
        ]);
    }

    public function update(Request $request){

        if($this->validateTime($request->date_reservation, $request->time, $request->table_id, $request->id)){
            $reservation = Reservation::find($request->id);
            $reservation->fill($request->all());
            $reservation->save();

            return response()->json([
                'succes' => true,
                'msg' => 'Actualizado'
            ]);
        }else{
            return response()->json([
                'succes' => false,
                'msg' => 'Horario no disponible'
            ]);
        }
    }

    public function validateTime($date, $hrToReserve, $tableId, $id){
        
        $reservations = Reservation::when($id, function ($query, $id) {
            return $query->where('id', '!=', $id);
        })
        ->where([
            ['table_id', $tableId],
            ['date_reservation', $date]
        ])->get(['id', 'date_reservation', 'time']);

        if($reservations->count() == 0){
            return true;
        }

        $TimeToReserve = Carbon::createFromFormat('Y-m-d H:i', $date." ".$hrToReserve);

        foreach($reservations as $reser){
            $hrReserved = Carbon::createFromFormat('Y-m-d H:i', $reser->date_reservation." ".$reser->time);
            $dif = $TimeToReserve->diffInHours($hrReserved);
            if($dif < 1){
                $free = false;
                break;
            }

            $free = true;
        }

        return $free;
    }
    
}
