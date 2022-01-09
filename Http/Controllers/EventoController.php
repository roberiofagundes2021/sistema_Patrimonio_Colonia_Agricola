<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    //

    public function create(){
        $Eventos = Evento::all();
        return view('Evento.create',compact('Eventos'));
    }

    public function edit($id){
        $Evento = Evento::findorFail($id);
        return view('Evento.edit',['Evento'=>$Evento]);
    }

    public function update(Request $request){
        Evento::find($request->id)->update($request->except('_token'));
        return redirect('index/evento')->with('msg', 'alteração realdizado com sucesso');
        
    }

    public function index(){
        $Evento=Evento::all();
        return view('Evento.index',compact('Evento'));
    }

    public function destroy($id){
        $Evento=Evento::findOrFail($id);
        $Evento->delete();
        return view('evento.index');
    }

    public function store(Request $request){
            $Evento = new Evento();
            $Evento->nome=$request->nome;
            $Evento->data_inicio=$request->data_inicio;
            $Evento->data_fim=$request->data_fim;
            $Evento->hora_inicio=$request->hora_inicio;
            $Evento->hora_terminio=$request->hora_terminio;
            $Evento->save();
    }
}
