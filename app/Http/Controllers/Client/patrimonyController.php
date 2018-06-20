<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class patrimonyController extends Controller
{
    /** 
     *  Patrimonies reading function
     *  @return array
     * */

    public function index(){

        $patrimonies = \App\PatrimonyForLoan::select('name','category','model','description', 'sector', 'status')->distinct()->get();
        
        return view('client.patrimonies.list', compact('patrimonies'));
    }

    /** 
     *  Request patrimonies form
     *  @return array
     * 
     * */

    public function request_form(Request $request){
        $patrimony = \App\Patrimony::take(1)->select('name', 'model', 'sector', 'description', 'id', 'image', 'serialNumber')->where('model', urldecode($request->model_equip))->where('status', 1)->get();
        return view('client.patrimonies.form_request', compact('patrimony'));
    }

    /** 
     *  Request patrimonies send request
     *  @return array
     * 
     * */

    public function request(Request $request){
        \App\Request::create($request->all());

        return redirect()->route('patrimoniesForLoan')->with('flash_message', [
            "msg" => "Solicitação realizada com sucesso!",
            "class" => "alert-success"
        ]);
    }


}
