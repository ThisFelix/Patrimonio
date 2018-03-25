<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatrimonyController2 extends Controller
{
    public function index(){
        return view('admin.patrimonies.list');
    }

    public function create(){
        return view('patrimonies.create');
    }


}
