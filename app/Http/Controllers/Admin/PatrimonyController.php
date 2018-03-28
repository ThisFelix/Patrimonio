<?php

/**
 *
 * Controller de Patrimônios
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

class PatrimonyController extends Controller
{

    
    /** 
     *  Patrimonies reading function
     *  @return array
     * */

    public function index(){
        $patrimonies = \App\Patrimony::paginate(10);
        return view('admin.patrimonies.list', compact('patrimonies'));
    }

    /** 
     *  Create form function
     *  @return void
     * */
    public function create(){
        return view('admin.patrimonies.create');
    }

    /** 
     *  Create function
     *  @param array $request
     *  @param int $id
     *  @return void
     * */
    public function add(Request $patrimony){
        \App\Patrimony::create($patrimony->all());

        return redirect()->route('patrimonies.create')->with('flash_message', [
            "msg" => "Patrimônio adicionado com sucesso!",
            "class" => "alert-success"
        ]);
    }

    /** 
     *  Update form function
     *  @param int $id
     *  @return void
     * */
    public function edition($id){
        $patrimony = \App\Patrimony::find($id);
        
        if(!$patrimony){        
            return redirect()->route('patrimonies.create')->with('flash_message', [
                "msg" => "Não existe este patrimônio cadastrado! Deseja cadastrar um novo patrimônio?",
                "class" => "alert-danger"
            ]);
        }

        return view('admin.patrimonies.edition', compact('patrimony'));
    }

    /** 
     *  Update function
     *  @param array $request
     *  @param int $id
     *  @return void
     * */
    public function edit(Request $request, $id){
        \App\Patrimony::find($id)->update($request->all());
     
        return redirect()->route('patrimonies.index')->with('flash_message', [
            "msg" => "Cliente atualizado com sucesso!",
            "class" => "alert-success"
        ]);

    }

    /** 
     *  Delete function
     *  @param int $id
     *  @return void
     * */
    public function delete($id){

        \App\Patrimony::find($id)->delete();
      
        return redirect()->route('patrimonies.index')->with('flash_message', [
            "msg" => "O Patrimônio foi deletado!",
            "class" => "alert-success"
        ]);


    }
}
