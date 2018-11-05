<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleContract;
use Session;
class SaleContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale_contract = SaleContract::all();
        return view('pages.sale-contract.index' ,['sale_contract' => $sale_contract]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sale-contract.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale_contract = new SaleContract();

        $sale_contract->contract_code = $request->contract_code;
        $sale_contract->contract_date = date('Y-m-d',strtotime($request->contract_date));
        $sale_contract->cnt_cgt_person = $request->cnt_cgt_person;
        $sale_contract->party_name = $request->party_name;
        $sale_contract->qty = $request->qty;
        $sale_contract->delivery_terms = $request->delivery_terms;
        $sale_contract->rate_type = $request->rate_type;
        $sale_contract->rate = $request->rate;
        $sale_contract->amount = $request->amount;
        $sale_contract->adv = $request->adv;
        $sale_contract->advance = $request->advance;
        $sale_contract->no_of_bos = $request->no_of_bos;
        $sale_contract->delivery_period_from = date('Y-m-d',strtotime($request->delivery_period_from));
        $sale_contract->delivery_period_to = date('Y-m-d',strtotime($request->delivery_period_to));
        $sale_contract->expiry_date = date('Y-m-d',strtotime($request->expiry_date));
        $sale_contract->contract_status = $request->contract_status;
        $sale_contract->contact_person = $request->contact_person;
        $sale_contract->remarks = $request->remarks;
        $sale_contract->stax_invoice = $request->stax_invoice;
        $sale_contract->save();
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('sale-contract.create');

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
        $contract = SaleContract::find($id);
        return view('pages.sale-contract.edit' ,['contract' => $contract]);
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
        $sale_contract = SaleContract::find($id);

        $sale_contract->contract_code = $request->contract_code;
        $sale_contract->contract_date = $request->contract_date;
        $sale_contract->cnt_cgt_person = $request->cnt_cgt_person;
        $sale_contract->party_name = $request->party_name;
        $sale_contract->qty = $request->qty;
        $sale_contract->delivery_terms = $request->delivery_terms;
        $sale_contract->rate_type = $request->rate_type;
        $sale_contract->rate = $request->rate;
        $sale_contract->amount = $request->amount;
        $sale_contract->adv = $request->adv;
        $sale_contract->advance = $request->advance;
        $sale_contract->no_of_bos = $request->no_of_bos;
        $sale_contract->delivery_period_from = $request->delivery_period_from;
        $sale_contract->delivery_period_to = $request->delivery_period_to;
        $sale_contract->expiry_date = $request->expiry_date;
        $sale_contract->contract_status = $request->contract_status;
        $sale_contract->contact_person = $request->contact_person;
        $sale_contract->remarks = $request->remarks;
        $sale_contract->stax_invoice = $request->stax_invoice;
        $sale_contract->save();
        Session::flash('success', 'Your Record has been Updated successfully...');
        return redirect()->route('sale-contract');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = SaleContract::find($id);
        $contract->delete();
        Session::flash('success', 'Your Record has been deleted successfully!');
        return redirect()->route('sale-contract');
    }
}
