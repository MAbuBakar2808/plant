<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;
use Session;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = Plant::all();
        return view('pages.plant.index' ,['plants' => $plants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.plant.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'plant_name' => 'required',
            'address' => 'required',
            'city' => 'required'
        ));

        $plant = new Plant();
        $plant->plant_name = $request->plant_name;
        $plant->address = $request->address;
        $plant->city = $request->city;
        $plant->save();
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('plant.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plant = Plant::find($id);
        return view('pages.plant.edit' ,['plant' => $plant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'plant_name' => 'required',
            'address' => 'required',
            'city' => 'required'
        ));

        $plant = Plant::find($id);
        $plant->plant_name = $request->plant_name;
        $plant->address = $request->address;
        $plant->city = $request->city;
        $plant->save();
        Session::flash('success', 'Your Record is updated successfully...');
        return redirect()->route('plants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plant = Plant::find($id);
        $plant->delete();
        Session::flash('success', 'City deleted successfully!');
        return redirect()->route('plants');
    }
}
