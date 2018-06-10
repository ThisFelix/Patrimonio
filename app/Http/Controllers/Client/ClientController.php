<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /** 
     *  Patrimonies reading function
     *  @return array
     * */

    public function index(){        
        return view('client.home.index');
    }
}
