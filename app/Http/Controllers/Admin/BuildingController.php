<?php

/**
 *
 * Controller de Prédios
 * 
 * @author: Márcio Chen
 * 
 * @access public
 * 
 * 
 * */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class BuildingController extends Controller
{
    public function __construct(){
        if(!Gate::allows('isAdmin')){
            header('Location: client');
        }
    }

    /** 
     *  Buildings reading function
     *  @return array
     * */

    public function index(){
        $buildings = \App\Building::paginate(10);
        return view('admin.buildings.list', compact('buildings'));
    }


    /** 
     *  Create form function
     *  @return void
     * */
    public function create(){
        return view('admin.buildings.create');
    }


    /** 
     *  Create function
     *  @param array $request
     *  @param int $id
     *  @return void
     * */
    public function add(Request $request){
        \App\Building::create($request->all());

        return redirect()->route('buildings.create')->with('flash_message', [
            "msg" => "Prédio adicionado com sucesso!",
            "class" => "alert-success"
        ]);
    }


    /** 
     *  Update form function
     *  @param int $id
     *  @return void
     * */
    public function edition($id){
        $building = \App\Building::find($id);
        
        if(!$building){        
            return redirect()->route('buildings.create')->with('flash_message', [
                "msg" => "Não existe este prédio cadastrado! Deseja cadastrar um novo prédio?",
                "class" => "alert-danger"
            ]);
        }

        return view('admin.buildings.edition', compact('building'));
    }

    /** 
     *  Update function
     *  @param array $request
     *  @param int $id
     *  @return void
     * */
    public function edit(Request $request, $id){
        \App\Building::find($id)->update($request->all());
         
        return redirect()->route('buildings.index')->with('flash_message', [
            "msg" => "Prédio atualizado com sucesso!",
            "class" => "alert-success"
        ]);

    }

    /** 
     *  Delete function
     *  @param int $id
     *  @return void
     * */
    public function delete($id){

        \App\Building::find($id)->delete();
      
        return redirect()->route('buildings.index')->with('flash_message', [
            "msg" => "O Prédio foi deletado!",
            "class" => "alert-success"
        ]);


    }

}
