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
use Gate;

class RequestController extends Controller
{

    
    /** 
     *  Requests reading function
     *  @return array
     * */

    public function index(){
        $requests = \App\Request::paginate(10);
        return view('admin.requests.list', compact('requests'));
    }

    /** 
     *  Deny Request function
     *  @return array
     * */

    public function deny($id){
        $request = \App\Request::find($id);

        // Make sure you've got the Request
        if($request) {
            $request->status = 'Negado';
            $request->save();
        }

        return redirect()->route('requests.list')->with('flash_message', [
            "msg" => "Solicitação foi negada!",
            "class" => "alert-danger"
        ]);

    }

    /** 
     *  Accept Request function
     *  @return array
     * */

    public function accept($id){
        $request = \App\Request::find($id);

        // Make sure you've got the Request
        if($request) {
            $request->status = 'Aceito';
            $request->save();
        }

        return redirect()->route('requests.list')->with('flash_message', [
            "msg" => "Solicitação foi aceita!",
            "class" => "alert-success"
        ]);
    }

 
}
