<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('pages.cities.index' ,['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cities.add');
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
            'city_name' => 'required',
            'city_short_name' => 'required|max:3'
        ));

        $city = new City();
        $city->city_name = $request->city_name;
        $city->city_short_name = $request->city_short_name;
        $city->save();
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('cities.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('pages.cities.edit' ,['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'city_name' => 'required',
            'city_short_name' => 'required|max:3'
        )); 
        
        $city = City::find($id);
        $city->city_name = $request->city_name;
        $city->city_short_name = $request->city_short_name;
        $city->save();
        Session::flash('success', 'City has been updated successfully.');
        return redirect()->route('cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        Session::flash('success', 'City deleted successfully!');
        return redirect()->route('cities');
    }
}
