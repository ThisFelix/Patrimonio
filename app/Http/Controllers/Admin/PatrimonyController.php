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
use App\Repositories\PatrimonyRepository;


class PatrimonyController extends Controller
{

    
    /** 
     *  Patrimonies reading function
     *  @return array
     * */

    public function index(){
        $patrimonies = \App\Patrimony::paginate(10);
        $rooms = \App\Room::all();
        return view('admin.patrimonies.list', compact('patrimonies'), compact('rooms'));
    }

    /** 
     *  Create form function
     *  @return void
     * */
    public function create(){
        $rooms = \App\Room::all();
        return view('admin.patrimonies.create', compact('rooms'));
    }

    /** 
     *  Create function
     *  @param array $request
     *  @param int $id
     *  @return void
     * */
    public function add(Request $request){

        $PatrimonyRepository = new PatrimonyRepository();
        
        $num = $request->numberOfPatrimony;


        $patrimony = \App\Patrimony::create($request->all());
        $PatrimonyRepository->saveImage($patrimony,$request);
        $patrimony->save();


        for($cont = 1; $cont < $num; $cont++){

            $patrimony = \App\Patrimony::create($request->all());
            $patrimony->serialNumber = '';
            $patrimony->patrimonyNumber += $cont;
            $PatrimonyRepository->saveImage($patrimony,$request);
            $patrimony->save();

        
        }
            
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
        $rooms = \App\Room::all();
        
        if(!$patrimony){        
            return redirect()->route('patrimonies.create')->with('flash_message', [
                "msg" => "Não existe este patrimônio cadastrado! Deseja cadastrar um novo patrimônio?",
                "class" => "alert-danger"
            ]);
        }

        return view('admin.patrimonies.edition', compact('patrimony'), compact('rooms'));
    }

    /** 
     *  Update function
     *  @param array $request
     *  @param int $id
     *  @return void
     * */
    public function edit(Request $request, $id){
        \App\Patrimony::find($id)->update($request->all());

        $imgName = null;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $patrimony = \App\Patrimony::find($id); 
                
            $imgName = 'patrimony'.$patrimony->id.$patrimony->name.'.png';

            $request->image->storeAs('patrimony', $imgName);

            $patrimony->image = $imgName;

            $patrimony->save();

        }
         
        return redirect()->route('patrimonies.index')->with('flash_message', [
            "msg" => "Patrimônio atualizado com sucesso!",
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

    /**
     * 
     * Allocate function
     * @param array
     * @return void
     */
    public function allocate(Request $request){
        $init = $request->init_number;
        $final = $request->final_number;
        $location = $request->location;

        while($init <= $final){
            $patrimonie_number = $init;

            \App\Patrimony::where('patrimonyNumber', $patrimonie_number)->update(['location' => $location]);

            
            $init++;
        }

        return redirect()->route('patrimonies.index')->with('flash_message', [
            "msg" => "Os Patrimônios $request->init_number ao $final foram alocados!",
            "class" => "alert-success"
        ]);
    }
}
