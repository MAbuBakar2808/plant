<?php

namespace App\Http\Controllers;

use App\PurchaseContract;
use Session;
use Illuminate\Http\Request;

class PurchaseContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_contract = PurchaseContract::all();
        return view('pages.purchase-contract.index' ,['purchase_contract' => $purchase_contract]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.purchase-contract.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prc_contract = new PurchaseContract();

        $prc_contract->contract_code = $request->contract_code;
        $prc_contract->contract_date = date('Y-m-d',strtotime($request->contract_date));
        $prc_contract->cnt_cgt_person = $request->cnt_cgt_person;
        $prc_contract->party_name = $request->party_name;
        $prc_contract->qty = $request->qty;
        $prc_contract->delivery_terms = $request->delivery_terms;
        $prc_contract->rate_type = $request->rate_type;
        $prc_contract->rate = $request->rate;
        $prc_contract->amount = $request->amount;
        $prc_contract->adv = $request->adv;
        $prc_contract->advance = $request->advance;
        $prc_contract->no_of_bos = $request->no_of_bos;
        $prc_contract->delivery_period_from = date('Y-m-d',strtotime($request->delivery_period_from));
        $prc_contract->delivery_period_to = date('Y-m-d',strtotime($request->delivery_period_to));
        $prc_contract->expiry_date = date('Y-m-d',strtotime($request->expiry_date));
        $prc_contract->contract_status = $request->contract_status;
        $prc_contract->contact_person = $request->contact_person;
        $prc_contract->remarks = $request->remarks;
        $prc_contract->stax_invoice = $request->stax_invoice;
        $prc_contract->save();
        Session::flash('success', 'New Purchase Contract has been created successfully.');
        return redirect()->route('purchase-contract');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseContract  $purchaseContract
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseContract $purchaseContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseContract  $purchaseContract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = PurchaseContract::find($id);
        return view('pages.purchase-contract.edit' ,['contract' => $contract]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseContract  $purchaseContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prc_contract = PurchaseContract::find($id);
        $prc_contract->contract_code = $request->contract_code;
        $prc_contract->contract_date = $request->contract_date;
        $prc_contract->cnt_cgt_person = $request->cnt_cgt_person;
        $prc_contract->party_name = $request->party_name;
        $prc_contract->qty = $request->qty;
        $prc_contract->delivery_terms = $request->delivery_terms;
        $prc_contract->rate_type = $request->rate_type;
        $prc_contract->rate = $request->rate;
        $prc_contract->amount = $request->amount;
        $prc_contract->adv = $request->adv;
        $prc_contract->advance = $request->advance;
        $prc_contract->no_of_bos = $request->no_of_bos;
        $prc_contract->delivery_period_from = $request->delivery_period_from;
        $prc_contract->delivery_period_to = $request->delivery_period_to;
        $prc_contract->expiry_date = $request->expiry_date;
        $prc_contract->contract_status = $request->contract_status;
        $prc_contract->contact_person = $request->contact_person;
        $prc_contract->remarks = $request->remarks;
        $prc_contract->stax_invoice = $request->stax_invoice;
        $prc_contract->save();
        Session::flash('success', 'New Purchase Contract has been created successfully.');
        return redirect()->route('purchase-contract');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseContract  $purchaseContract
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = PurchaseContract::find($id);
        $contract->delete();
        Session::flash('success', 'Your Record has been deleted successfully!');
        return redirect()->route('sale-contract');
    }
}
