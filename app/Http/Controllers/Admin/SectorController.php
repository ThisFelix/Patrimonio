<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class SectorController extends Controller
{
   

    public function index(){
        $sectors = \App\Models\Sector::paginate(10);

        return view('admin.sectors.list', compact('sectors'));
    }


    /** 
     *  Create form function
     *  @return void
     * */
    public function create(){
        return view('admin.sectors.create');
    }



    public function add(Request $request){
        \App\Models\Sector::create($request->all());

        return redirect()->route('sectors.create')->with('flash_message', [
            "msg" => "Setor adicionada com sucesso!",
            "class" => "alert-success"
        ]);
    }




    public function edition($id){
        $sector = \App\Models\Sector::find($id);

        if(!$sector){        
            return redirect()->route('sectors.create')->with('flash_message', [
                "msg" => "Não existe esta Setor cadastrado! Deseja cadastrar um novo setor?",
                "class" => "alert-danger"
            ]);
        }

        return view('admin.sectors.edition', compact('sector'));
    }




    public function edit(Request $request, $id){
        \App\Models\Sector::find($id)->update($request->all());
         
        return redirect()->route('sectors.index')->with('flash_message', [
            "msg" => "Setor atualizado com sucesso!",
            "class" => "alert-success"
        ]);

    }




    public function delete($id){

        \App\Models\Sector::find($id)->delete();
      
        return redirect()->route('sectors.index')->with('flash_message', [
            "msg" => "O Setor foi deletado!",
            "class" => "alert-success"
        ]);


    }
}
