<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trpcode;


class TransporterCodeController extends Controller
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
        return view('pages.transporters.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $trp_code = new Trpcode();
       $trp_code->trp_name = $request->trp_name;
       $trp_code->trp_address = $request->trp_address;
       $trp_code->trp_ntn = $request->trp_ntn;
       $trp_code->trp_tax_regno = $request->trp_tax_regno;
       $trp_code->trp_telephone = $request->trp_telephone;
       $trp_code->trp_fax = $request->trp_fax;
       $trp_code->trp_email = $request->trp_email;
       $trp_code->trp_mhno = 3;
       //print_r($trp_code);die;
       $trp_code->save();
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
        //
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
