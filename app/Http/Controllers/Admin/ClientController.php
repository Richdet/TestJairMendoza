<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Traits\MyTraits;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    use MyTraits;
    
    public function getAll(){
        $clients = Client::all();

        return datatables()->of($clients)
                ->editColumn('name', function(Client $client){
                    return $client->name." ".$client->lastname;
                })
                ->editColumn('birthday', function(Client $client){
                    return $this->formatDateEmployee($client->birthday);
                })
                ->toJson();
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'nickname' => 'required|unique:clients',
            'email' => 'required|email',
            'rfc' => 'required|unique:clients',
        ]);

        if ($validator->passes()) {
            $newClient = (new Client())->fill($request->all());
            $save = $newClient->save();

            if($save){
                return response()->json([
                    'succes' => true,
                    'msg' => 'Agregado correctamente'
                ]);
            }else{
                return response()->json([
                    'msg' => 'Error al agregar'
                ]);
            }  
        }
     
        return response()->json([
            'succes' => false,
            'error'=>$validator->errors()->all()
        ]);
         
    }

    public function getClients(){
        $clients = Client::get(['id', 'name', 'lastname']);

        return response()->json([
            'succes' => true,
            'data' => $clients
        ]);
    }
}
