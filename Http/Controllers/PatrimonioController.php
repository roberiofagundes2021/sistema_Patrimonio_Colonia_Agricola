<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patrimonio;
use Illuminate\Support\Facades\DB;



class PatrimonioController extends Controller
{
    //

    public function create(){
        $Patrimonio = patrimonio::get();
        return view('patrimonio.create',compact('Patrimonio'));
    }

    public function edit($id){
        $Patrimonio = patrimonio::findorFail($id);
        return view('patrimonio.edit',['Patrimonio'=>$Patrimonio]);
    }

    public function update(Request $request){
        patrimonio::find($request->id)->update($request->except('_token'));
        return redirect('index/manutencao')->with('msg', 'alteração realdizado com sucesso');
        
    }

    public function index(){

        $Patrimonio = DB::table('patrimonios')
            ->join('manutencaos', 'manutencaos.patrimonio_id', '=', 'patrimonios.id')
            ->select('patrimonios.*', 'manutencaos.data_manutencao')
            ->get();

        return view('patrimonio.index',compact('Patrimonio'));
    }

    public function destroy($id){
        $Patrimonio=patrimonio::findOrFail($id);
        $Patrimonio->delete();
        return view('patrimonio.index');
    }

    public function store(Request $request){

            $Patrimonio = new patrimonio();
            $Patrimonio->nome=$request->nome;
            $Patrimonio->tipo_patrimonio =$request->tipo_patrimonio ;
            $Patrimonio->quantidade_patrimonio=$request->quantidade_patrimonio;
            $Produto->save();
    }
}
