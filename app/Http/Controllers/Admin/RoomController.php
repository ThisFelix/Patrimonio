<?php

/**
 *
 * Controller de Salas
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

class RoomController extends Controller
{
    /** 
     *  Room reading function
     *  @return array
     * */

    public function index(){
    $rooms = \App\Room::paginate(10);

    return view('admin.rooms.list', compact('rooms'));
    }


    /** 
     *  Create form function
     *  @return void
     * */
    public function create(){
        $buildings = \App\Building::all();
        return view('admin.rooms.create', compact('buildings'));
    }

    /** 
     *  Create function
     *  @param array $request
     *  @param int $id
     *  @return void
     * */
    public function add(Request $request){
        \App\Room::create($request->all());

        return redirect()->route('rooms.create')->with('flash_message', [
            "msg" => "Sala adicionada com sucesso!",
            "class" => "alert-success"
        ]);
    }

    /** 
     *  Update form function
     *  @param int $id
     *  @return void
     * */
    public function edition($id){
        $room = \App\Room::find($id);
        $buildings = \App\Building::all();

        if(!$room){        
            return redirect()->route('rooms.create')->with('flash_message', [
                "msg" => "Não existe esta sala cadastrado! Deseja cadastrar uma nova sala?",
                "class" => "alert-danger"
            ]);
        }

        return view('admin.rooms.edition', compact('room'), compact('buildings'));
    }

    /** 
     *  Update function
     *  @param array $request
     *  @param int $id
     *  @return void
     * */
    public function edit(Request $request, $id){
        \App\Room::find($id)->update($request->all());
         
        return redirect()->route('rooms.index')->with('flash_message', [
            "msg" => "Sala atualizada com sucesso!",
            "class" => "alert-success"
        ]);

    }

    /** 
     *  Delete function
     *  @param int $id
     *  @return void
     * */
    public function delete($id){

        \App\Room::find($id)->delete();
      
        return redirect()->route('rooms.index')->with('flash_message', [
            "msg" => "A Sala foi deletada!",
            "class" => "alert-success"
        ]);


    }

    
}
