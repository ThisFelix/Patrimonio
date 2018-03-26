<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatrimonyController2 extends Controller
{


    public function index(){
        $patrimonies = \App\Patrimony::paginate(10);
        return view('admin.patrimonies.list', compact('patrimonies'));
    }

    public function create(){
        return view('admin.patrimonies.create');
    }

    public function add(Request $patrimony){
        \App\Patrimony::create($patrimony->all());


        return redirect()->route('patrimonies.create')->with('flash_message', [
            "msg" => "Patrimônio adicionado com sucesso!",
            "class" => "alert-success"
        ]);
    }
}
