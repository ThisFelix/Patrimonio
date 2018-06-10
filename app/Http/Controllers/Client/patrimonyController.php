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
     *  Request patrimonies reading function
     *  @return array
     * 
     * */

    public function request_form($model){
        $patrimony = \App\Patrimony::take(1)->select('name', 'model', 'sector', 'description', 'id', 'image', 'serialNumber')->where('model', urldecode($model))->where('status', 1)->get();
        return view('client.patrimonies.form_request', compact('patrimony'));
    }


}
