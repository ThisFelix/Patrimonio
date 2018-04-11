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
     *  Rooms reading function
     *  @return array
     * */

    public function index(){
        return view('admin.home.index');
    }
}
