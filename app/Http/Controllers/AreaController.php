<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Zone;
use Session;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('pages.areas.index' ,['areas' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        return view('pages.areas.add' ,['zones' => $zones]);
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
            'area_name' => 'required',
            'area_short_name' => 'required|max:3'
        ));
        
        $area = new Area();
        $area->area_name = $request->area_name;
        $area->area_short_name = $request->area_short_name;
        $area->zone_id = $request->zone_id;
        //print_r($area);die;
        $area->save();
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('areas.create');
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
        $area = Area::find($id);
        $zones = Zone::all();
        return view('pages.areas.edit' ,['area' => $area,'zones'=>$zones]);
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
            'area_name' => 'required',
            'area_short_name' => 'required|max:3'
        ));
        
        $area = Area::find($id);
        $area->area_name = $request->area_name;
        $area->area_short_name = $request->area_short_name;
        $area->zone_id = $request->zone_id;
        $area->save();
        Session::flash('success', 'Area has been updated successfully.');
        return redirect()->route('areas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();
        Session::flash('success', 'Area deleted successfully.');
        return redirect()->route('areas');
    }
}
