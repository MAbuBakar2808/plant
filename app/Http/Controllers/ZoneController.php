<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;
use Session;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::all();
        return view('pages.zones.index' ,['zones' => $zones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.zones.add');
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
            'zone_name' => 'required',
            'zone_short_name' => 'required|max:3'
        ));
        
        $zone = new Zone();
        $zone->zone_name = $request->zone_name;
        $zone->zone_short_name = $request->zone_short_name;
        $zone->save();
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('zones.create');
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
        $zone = Zone::find($id);
        return view('pages.zones.edit' ,['zone' => $zone]);
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
            'zone_name' => 'required',
            'zone_short_name' => 'required|max:3'
        )); 
        
        $zone = Zone::find($id);
        $zone->zone_name = $request->zone_name;
        $zone->zone_short_name = $request->zone_short_name;
        $zone->save();
        Session::flash('success', 'Zone has been updated successfully.');
        return redirect()->route('zones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        Session::flash('success', 'Zone deleted successfully.');
        return redirect()->route('zones');
    }
}
