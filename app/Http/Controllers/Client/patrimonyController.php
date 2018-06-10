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
        return view('client.home.index');
    }
}
