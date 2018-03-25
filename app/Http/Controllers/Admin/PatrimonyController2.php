<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatrimonyController2 extends Controller
{
    public function index(){
        return view('admin.home.equipamentos');
    }

    public function create(){
        return "Tela de criação";
    }


}
