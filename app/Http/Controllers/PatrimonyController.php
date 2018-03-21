<?php

namespace App\Http\Controllers;

use App\Patrimony;
use Illuminate\Http\Request;

class PatrimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patrimonies = Patrimony::orderBy('id', 'asc')->paginate(10);
        return view('patrimonies.index',['patrimonies' => $patrimonies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patrimonies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patrimony = new Patrimony;
        $patrimony->id = $request->id;
        $patrimony->name = $request->name;
        $patrimony->category = $request->category;
        $patrimony->model = $request->model;
        $patrimony->description = $request->description;
        $patrimony->image = $request->image;
        $patrimony->location = $request->location;
        $patrimony->save();
        return redirect()->route('patrimonies.index')->with('message', 'Patrimonio Inserido com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patrimony  $patrimony
     * @return \Illuminate\Http\Response
     */
    public function show(Patrimony $patrimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patrimony  $patrimony
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patrimonies = Patrimony::findOrFail($id);
        return view('patrimonies.edit',compact('patrimonies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patrimony  $patrimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patrimony = Patrimony::findOrFail($id);
        $patrimony->id = $request->id;
        $patrimony->name = $request->name;
        $patrimony->category = $request->category;
        $patrimony->model = $request->model;
        $patrimony->description = $request->description;
        $patrimony->image = $request->image;
        $patrimony->location = $request->location;
        $patrimony->save();
        return redirect()->route('patrimonies.index')->with('message', 'Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patrimony  $patrimony
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patrimony = Patrimony::findOrFail($id);
        $patrimony->delete();
        return redirect()->route('patrimony.index')->with('alert-success','Produto deletado!');

    }
}
