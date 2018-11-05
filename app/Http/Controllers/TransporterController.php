<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trpcode;
use App\Trpdetail;
use Session;
use DB;
class TransporterController extends Controller
{

	public function index()
    {
        $transporters = DB::table('trpcodes')
	            ->join('trpdetails', 'trpcodes.id', '=', 'trpdetails.trpcode_id')
	            ->select('trpcodes.id','trpcodes.trp_name', 'trpcodes.trp_ntn', 'trpdetails.trp_vehicle_no','trpdetails.trp_bs_capacity')
	            ->get();
	            return view('pages.transporters.index' ,['transporters' => $transporters]);
        
    }

    public function create()
    {
        return view('pages.transporters.info');
    }

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
	   	if($trp_code->save()) {
	   		$id = $trp_code->id;
	   		foreach ($request->trp_vehicle_no as $key => $value) {
	   			$data = array(
	   			'trpcode_id' => $id,
	   			'trp_vehicle_no' => $request->trp_vehicle_no[$key],
				'trp_driver_name' => $request->trp_driver_name[$key],
				'trp_cnic' => $request->trp_cnic[$key],
				'trp_cell' => $request->trp_cell[$key],
				'trpvehicle_id' => 2,
				'trp_bs_capacity' => $request->trp_bs_capacity[$key]);
				Trpdetail::insert($data);
	   		}	   		
	   	}
	   	Session::flash('success', 'New Transporter has been created successfully.');
        return redirect()->route('transporters');
    }

    public function destroy($id)
    {
        $transporter = Trpcode::find($id);
        $transporter->trpdetail()->delete();
        Session::flash('success', 'Transporter deleted successfully.');
     	return redirect()->route('transporters');
    }
}
