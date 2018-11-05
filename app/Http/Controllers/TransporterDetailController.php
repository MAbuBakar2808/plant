<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trpcode;
use App\Trpdetail;
use phpDocumentor\Reflection\Types\Integer;

class TransporterDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trp_detail = new Trpdetail();
        //$trp_detail->trpcode_id = $request->trpcode_id;
        $trp_detail->trpcode_id = 2;
        $trp_detail->trp_vehicle_no = $request->trp_vehicle_no;
        $trp_detail->trp_driver_name = $request->trp_driver_name;
        $trp_detail->trp_cnic = $request->trp_cnic;
        $trp_detail->trp_cell = $request->trp_cell;
        $trp_detail->trpvehicle_id = $request->trpcode_id + 1;
        $trp_detail->trp_bs_capacity = $request->trp_bs_capacity;
        //print_r($trp_detail);die;
        $trp_detail->save();
        return redirect()->route('transporter.create');
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
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
