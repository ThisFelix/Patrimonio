<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class AdminController extends Controller
{
    
    public function __construct(){
        if(!Gate::allows('isAdmin')){
            header('Location: client');
        }
    }
    
    
    public function index(){        
        return view('admin.home.index');
    }
}
