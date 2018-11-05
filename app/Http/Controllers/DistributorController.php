<?php

namespace App\Http\Controllers;

use App\Distributor;
use Illuminate\Http\Request;
use Session;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = Distributor::all();
        return view('pages.distributor.index' ,['distributors' => $distributors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pages.distributor.add');
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
            'name' => 'required',
            'address' => 'required',
            'city' => 'required'
        ));

        $distributor = new Distributor();
        $distributor->name = $request->name;
        $distributor->address = $request->address;
        $distributor->city = $request->city;
        $distributor->save();
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('distributor.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = Distributor::find($id);
        return view('pages.distributor.edit' ,['distributor' => $distributor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'address' => 'required',
            'city' => 'required'
        ));

        $distributor = Distributor::find($id);
        $distributor->name = $request->name;
        $distributor->address = $request->address;
        $distributor->city = $request->city;
        $distributor->save();
        Session::flash('success', 'Your Record is updated successfully...');
        return redirect()->route('distributors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distributor = Distributor::find($id);
        $distributor->delete();
        Session::flash('success', 'Distributor deleted successfully!');
        return redirect()->route('distributors');
    }
}
