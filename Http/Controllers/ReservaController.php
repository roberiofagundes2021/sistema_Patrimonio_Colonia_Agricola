<?php

namespace App\Http\Controllers;
use App\Models\Reserva;
use App\Models\Usuario;
use App\Models\Sala;
use App\Models\patrimonio;
use App\Models\Evento;


use Illuminate\Http\Request;

class ReservaController extends Controller
{
    //

    public function create(){
        $Usuario = Usuario::get();
        $Sala = Sala::get();
        $Patrimonio = patrimonio::get();
        $Evento = Evento::get();

        return view('reserva.create',compact('Usuario','Sala','Patrimonio','Evento'));
    }

    public function edit($id){
        $Reservas = Reserva::findorFail($id);
        return view('reserva.edit',['Reservas'=>$Reservas]);
    }

    public function update(Request $request){
        Reserva::find($request->id)->update($request->except('_token'));
        return redirect('index/reserva')->with('msg', 'alteração realdizado com sucesso');
        
    }

    public function index(){
        $Reservas=Reserva::all();

        return view('reserva.index',compact('Reservas'));
    }

    public function destroy($id){
        $Reservas=Reserva::findOrFail($id);
        $Reservas->delete();
        return view('reserva.index');
    }

    public function store(Request $request){


            $Reserva = new Reserva();
            $Reserva->data_reserva=$request->data_reserva;
            $Reserva->fim_reserva=$request->fim_reserva;
            $Reserva->usuario_id=$request->usuario_id;
            $Reserva->sala_id=$request->sala_id; 
            $Reserva->patrimonio_id=$request->patrimonio_id;
            $Reserva->eventos_id=$request->eventos_id;

            $Reserva->save();

        return "Reserva salva com sucesso";
    }
}
