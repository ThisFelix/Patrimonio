<?php

/**
 *
 * Controller de Relatórios
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
use Gate;

class ReportController extends Controller
{

    
    /** 
     *  Report index function
     *  @return array
     * */

    public function index(){
        $rooms = \App\Room::all();
        $sectors = \App\Models\Sector::all();

        return view('admin.reports.index', compact('rooms'), compact('sectors'));
    }


    public function sectorReport($id){
        $patrimonies = \App\Patrimony::where('sector', $id)->paginate(10);
        $sector = \App\Models\Sector::find($id);
        return view('admin.reports.sector', compact('patrimonies'), compact('sector'));
    }

    public function roomReport($id){
        $patrimonies = \App\Patrimony::where('location', $id)->paginate(10);
        $room = \App\Room::find($id);
        return view('admin.reports.room', compact('patrimonies'), compact('room'));
    }


    
}
