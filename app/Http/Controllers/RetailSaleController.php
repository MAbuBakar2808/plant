<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\RetailSale;
use App\RetailSaleCode;
use App\RetailSaleDetail;
use App\Distributor;
use App\Igpcfcode;
use App\Igpcfdetail;
use App\Plant;
use Session;
use DB;
use View;

class RetailSaleController extends Controller
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
        $distributors = Distributor::all();
        $plants = Plant::all();
        return view('pages.retail-sale.add' ,['distributors' => $distributors,'plants' => $plants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rscode = new RetailSaleCode();
        $rscode->rs_no = 2;
        $rscode->rs_date = date('Y-m-d',strtotime($request->rs_date));;
        $rscode->igp_no = $request->igp_no;
        $rscode->igp_date = date('Y-m-d',strtotime($request->igp_date));
        $rscode->distributor_id = $request->distributor_id;
        $rscode->plant_id = $request->plant_id;
        $rscode->vehicle_no = $request->vehicle_no;
        $rscode->std_rate = $request->std_rate;
        $rscode->remarks = $request->remarks;
        $rscode->ogp_status = 'yes';
        $rscode->stock = $request->stock;
        $rscode->stock_code = 10;
        $rscode->cons_rate = 1200;
        $rscode->inv_value = 12;
        $rscode->customer_bal = 1500;
        $rscode->user_name = 'Abubakar';
        $rscode->entry_date = '2018-09-12';
        $rscode->entry_time = '2018-09-12';

        if($rscode->save()) {
            $id = $rscode->id;
            foreach ($request->cylinder_capacity as $key => $value) {
                $data = array(
                'retailsalecode_id' => $id,
                'int_no' => 30,
                'int_desc' => 'yes',
                'cylinder_capacity' => $request->cylinder_capacity[$key],
                'in_cylinder_qty' => $request->in_cylinder_qty[$key],
                'filled_cylinders' => $request->filled_cylinders[$key],
                'faulty' => $request->faulty[$key],
                'qty_kgs' => 25,
                'qty_mt' => 30,
                'rate' => 300,
                'approved_rate' => $request->approved_rate[$key],
                'amount' => $request->amount[$key]);
                RetailSaleDetail::insert($data);
            }           
        }
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('retail-sale.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RetailSale  $retailSale
     * @return \Illuminate\Http\Response
     */
    public function show(RetailSale $retailSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RetailSale  $retailSale
     * @return \Illuminate\Http\Response
     */
    public function edit(RetailSale $retailSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RetailSale  $retailSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RetailSale $retailSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RetailSale  $retailSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(RetailSale $retailSale)
    {
        //
    }

    // public function report_send()
    // {
    //     $max_id  =  DB::table('retail_sale_codes')->max('id');
    //     $reports =  DB::table('retail_sale_codes')
    //                 ->join('retail_sale_details', 'retail_sale_codes.id', '=', 'retail_sale_details.retailsalecode_id')
    //                 ->join('distributors', 'retail_sale_codes.distributor_id', '=', 'distributors.id')
    //                 ->join('plants', 'retail_sale_codes.plant_id', '=', 'plants.id')
    //                 ->select('retail_sale_codes.rs_date','retail_sale_codes.vehicle_no','retail_sale_codes.driver_name','retail_sale_codes.driver_cell','igpcfcodes.remark','igpcfdetails.cyl_qty','igpcfdetails.cyl_capacity','igpcfdetails.remarks','distributors.name','plants.plant_name')
    //                 ->where('igpcfcodes.id', '=', $max_id)
    //                 ->get();
    //                 return view('pages.igpcylfill.reportindex' ,['reports' => $reports]);
    // }

    public function getPlant(Request $request)
    {
        // dd($request->plant_id);
        $retailsale = DB::table('igpcfcodes')
                    ->join('igpcfdetails', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                    ->join('distributors', 'igpcfcodes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'igpcfcodes.plant_id', '=', 'plants.id')
                    ->select('igpcfcodes.id','igpcfcodes.igp_date','igpcfcodes.vehicle_no','igpcfdetails.cyl_qty','igpcfdetails.cyl_capacity','distributors.name','plants.plant_name')
                    ->where('igpcfcodes.plant_id', '=', $request->plant_id)
                    ->get();
        //print_r($retailsale);
        $html = view('pages.retail-sale.plant-list')->with(compact('retailsale'))->render();
        $response = response()->json(['success' => true, 'html' => $html]);
        return $response;
    }

    public function getPlantData($id)
    {
        $distributors = Distributor::all();
        $plants = Plant::all();
        $igpcfcode = Igpcfcode::find($id);
        $id = $igpcfcode->id;
        $details =  DB::table('igpcfdetails') 
                    ->select('cyl_qty','cyl_capacity','remarks')
                    ->where('igpcfcode_id', '=', $id)
                    ->get();
        $igpcfdetails = Igpcfdetail::where('igpcfcode_id','=',$id)->get();

        return view('pages.retail-sale.addplant' ,['igpcfcode' => $igpcfcode,'details' => $details,'igpcfdetails' => $igpcfdetails,'plants' => $plants,'distributors' => $distributors]);
    }

    public function report_date()
    {
        return view('pages.retail-sale.daterepcreate');
    }

    public function report_date_send( $sendHtml = true ) 
    {
        $from_date = Input::get('from_date');
        $to_date = Input::get('to_date');
        
        $reports = DB::table('retail_sale_codes')
                    ->join('retail_sale_details', 'retail_sale_codes.id', '=', 'retail_sale_details.retailsalecode_id')
                    ->join('distributors', 'retail_sale_codes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'retail_sale_codes.plant_id', '=', 'plants.id')
                    ->select('retail_sale_codes.id','retail_sale_codes.rs_date','retail_sale_codes.vehicle_no','retail_sale_details.in_cylinder_qty','retail_sale_details.cylinder_capacity','distributors.name','plants.plant_name')
                    ->whereBetween('rs_date', [$from_date, $to_date])
                    ->paginate(7);

        $ldwtdate = DB::table('retail_sale_details')
                ->join('retail_sale_codes', 'retail_sale_codes.id', '=', 'retail_sale_details.retailsalecode_id')
                ->whereBetween('retail_sale_codes.rs_date', [$from_date, $to_date])
                ->sum('retail_sale_details.in_cylinder_qty');

        if($reports->lastPage() == $reports->currentPage()) {
            
            View::share('ldwtdate', $ldwtdate);
        }
        if($sendHtml) {
            return view('pages.retail-sale.dateindex' ,['reports' => $reports,'from_date' => $from_date,'to_date' => $to_date]);
        }
        return array('reports' => $reports,'from_date' => $from_date,'to_date' => $to_date);
  
    }

    public function pdfdate()
    {
        $pdf = \App::make('dompdf.wrapper');
        //print_r ($this->convert_data_html());
        $pdf->loadHTML($this->convert_data_date());
        return $pdf->stream('RetailSale-register.pdf', array("Attachment" => false));
        
    }

    public function convert_data_date() 
    {
        $send_data = $this->report_date_send( false );
        $output = '
        <div class="col-lg-12">
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;margin-top:-15px;">Retail Sale Filling Register</h5>
        </div>
        <div style="text-align: center;margin-top: -18px;margin-bottom: 10px;">
            <span>From '.date("d-M-y", strtotime($send_data['from_date'])).'</span>
            <span>To '.date("d-M-y", strtotime($send_data['to_date'])).'</span>
        </div>
        <table width="100%" style="border-collapse: collapse;border: 0px;margin-top:2%">
                <thead>
                    <tr>
                        <th style="text-align: center;border: 2px solid;">IGP No</th>
                        <th style="text-align: center;border: 2px solid;">IGP Date</th>
                        <th style="text-align: center;border: 2px solid;">Customer Name</th>
                        <th style="text-align: center;border: 2px solid;">Plant Name</th>
                        <th style="text-align: center;border: 2px solid;">Vehicle No</th>
                        <th style="text-align: center;border: 2px solid;">Cyl Qty</th>
                        <th style="text-align: center;border: 2px solid;">Cyl Capacity</th>
                    </tr>
                </thead>
        ';
        $in_cylinder_qty = 0;
        foreach($send_data['reports'] as $send)
        {
            $output .= '
            <div class="col-lg-12">
            </div>
            <tbody id="myTable">
                <tr class="odd gradeX">
                    <td style="text-align: center;border: 1px solid;">'.$send->id.'</td>
                    <td style="text-align: center;border: 1px solid;">'.date("d-m-Y",strtotime($send->rs_date)).'</td>
                    <td style="text-align: center;border: 1px solid;">'.$send->name.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$send->plant_name.'</td>
                    
                    <td style="text-align: center;border: 1px solid;">'.$send->vehicle_no.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$send->in_cylinder_qty.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$send->cylinder_capacity.'</td>'

                    .intval($in_cylinder_qty = $in_cylinder_qty + $send->in_cylinder_qty).'
                         
                </tr>   
            </tbody>';

        }
        $output .= '</table>';
        $output .= '<span style="float: left;margin-top:2%;">Total :<b></b></span>';
        $output .= '<span style="float: right;margin-right: 21%;background-color: #E5E5E5;"><b>'.$in_cylinder_qty.'</b></span>'; 
        return $output;
    }



    public function report_distributor()
    {
        $distributors = Distributor::all();
        return view('pages.retail-sale.distrepcreate' ,['distributors' => $distributors]);
    }

    public function send_report( $sendHtml = true ) 
    {
        $from_date = Input::get('from_date');
        $to_date = Input::get('to_date');
        $distributor_id = Input::get('distributor_id');
        //print_r($distributor_id);
        $reports = DB::table('retail_sale_codes')
                    ->join('retail_sale_details', 'retail_sale_codes.id', '=', 'retail_sale_details.retailsalecode_id')
                    ->join('distributors', 'retail_sale_codes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'retail_sale_codes.plant_id', '=', 'plants.id')
                    ->select('retail_sale_codes.id','retail_sale_codes.rs_date','retail_sale_codes.vehicle_no','retail_sale_details.in_cylinder_qty','retail_sale_details.cylinder_capacity','distributors.name','plants.plant_name')
                    ->whereBetween('rs_date', [$from_date, $to_date])
                    ->where('retail_sale_codes.distributor_id', '=', $distributor_id)
                    ->paginate(6);
            $ldwtdist = DB::table('retail_sale_details')
                ->join('retail_sale_codes', 'retail_sale_codes.id', '=', 'retail_sale_details.retailsalecode_id')
                ->join('distributors', 'distributors.id', '=', 'retail_sale_codes.distributor_id')
                ->whereBetween('rs_date', [$from_date, $to_date])
                ->where('retail_sale_codes.distributor_id', '=', $distributor_id)
                ->sum('retail_sale_details.in_cylinder_qty');

            if($reports->lastPage() == $reports->currentPage()) {
            
                View::share('ldwtdist', $ldwtdist);
            }

            if( $sendHtml ) {
                return view('pages.retail-sale.disreportview' ,['reports' => $reports,'from_date' => $from_date,'to_date' => $to_date,'distributor_id' => $distributor_id]);
            }
            return array('reports' => $reports,'from_date' => $from_date,'to_date' => $to_date);
            
    }

    public function pdfdist()
    {
        $pdf = \App::make('dompdf.wrapper');
        //print_r ($this->convert_data_html());
        $pdf->loadHTML($this->convert_data_dist());
        return $pdf->stream('RetailSale-dist.pdf', array("Attachment" => false));
        
    }

    public function convert_data_dist() 
    {
        $dist_data = $this->send_report( false );
        $output = '
        <div class="col-lg-12">
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;margin-top:-15px;">(Customer-Wise) Retail Sale</h5>
            <div style="text-align: center;margin-top: -18px;margin-bottom: 10px;">
                <span>From '.date("d-M-y", strtotime($dist_data['from_date'])).'</span>
                <span>To '.date("d-M-y", strtotime($dist_data['to_date'])).'</span>
            </div>
            <div style="margin-top: -18px;margin-bottom: 10px;">
                Distributor Name: '.$dist_data['reports'][0]->name.'
            </div>
            
        </div>
        <table width="100%" style="border-collapse: collapse;border: 0px;margin-top:2%">
                <thead>
                    <tr>
                        <th style="text-align: center;border: 2px solid;">IGP No</th>
                        <th style="text-align: center;border: 2px solid;">IGP Date</th>
                        <th style="text-align: center;border: 2px solid;">Plant Name</th>
                        <th style="text-align: center;border: 2px solid;">Vehicle No</th>
                        <th style="text-align: center;border: 2px solid;">Cyl Qty</th>
                        <th style="text-align: center;border: 2px solid;">Cyl Capacity</th>
                    </tr>
                </thead>
        ';
        $in_cylinder_qty = 0;
        foreach($dist_data['reports'] as $distributor)
        {
            $output .= '
            <div class="col-lg-12">
            </div>
            <tbody id="myTable">
                <tr class="odd gradeX">
                    <td style="text-align: center;border: 1px solid;">'.$distributor->id.'</td>
                    <td style="text-align: center;border: 1px solid;">'.date("d-m-Y",strtotime($distributor->rs_date)).'</td>
                    <td style="text-align: center;border: 1px solid;">'.$distributor->plant_name.'</td>
                    
                    <td style="text-align: center;border: 1px solid;">'.$distributor->vehicle_no.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$distributor->in_cylinder_qty.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$distributor->cylinder_capacity.'</td>'

                    .intval($in_cylinder_qty = $in_cylinder_qty + $distributor->in_cylinder_qty).'
                         
                </tr>   
            </tbody>';

        }
        $output .= '</table>';
        $output .= '<span style="float: left;margin-top:2%;">Total :<b></b></span>';
        $output .= '<span style="float: right;margin-right: 27%;background-color: #E5E5E5;"><b>'.$in_cylinder_qty.'</b></span>'; 
        return $output;
    }

    public function report_plant()
    {
        $plants = Plant::all();
        return view('pages.retail-sale.plantrepcreate' ,['plants' => $plants]);
    }

    public function report_plant_send( $sendHtml = true ) 
    {
        $from_date = Input::get('from_date');
        $to_date = Input::get('to_date');
        $plant_name = Input::get('plant_name');

        $reports = DB::table('retail_sale_codes')
                    ->join('retail_sale_details', 'retail_sale_codes.id', '=', 'retail_sale_details.retailsalecode_id')
                    ->join('distributors', 'retail_sale_codes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'retail_sale_codes.plant_id', '=', 'plants.id')
                    ->select('retail_sale_codes.id','retail_sale_codes.rs_date','retail_sale_codes.vehicle_no','retail_sale_details.in_cylinder_qty','retail_sale_details.cylinder_capacity','distributors.name','plants.plant_name')
                    ->whereBetween('rs_date', [$from_date, $to_date])
                    ->where('retail_sale_codes.plant_id', '=', $plant_name)
                    ->paginate(6);
            $ldwtplant = DB::table('retail_sale_details')
                ->join('retail_sale_codes', 'retail_sale_codes.id', '=', 'retail_sale_details.retailsalecode_id')
                ->join('plants', 'plants.id', '=', 'retail_sale_codes.plant_id')
                ->whereBetween('rs_date', [$from_date, $to_date])
                ->where('retail_sale_codes.plant_id', '=', $plant_name)
                ->sum('retail_sale_details.in_cylinder_qty');

            if($reports->lastPage() == $reports->currentPage()) {
            
                View::share('ldwtplant', $ldwtplant);
            }

            if($sendHtml) {
                return view('pages.retail-sale.plantrepview' ,['reports' => $reports,'from_date' => $from_date,'to_date' => $to_date,'plant_name' => $plant_name]);
            }
            return  array(
                            'reports' => $reports,
                            'from_date' => $from_date,
                            'to_date' => $to_date 
                        );
    }

    public function pdfplant()
    {
        $pdf = \App::make('dompdf.wrapper');
        //print_r ($this->convert_data_plant());
        $pdf->loadHTML($this->convert_data_plant());
        return $pdf->stream('RetailSale-plant.pdf', array("Attachment" => false));
        
    }

    public function convert_data_plant() 
    {
        $plant_data = $this->report_plant_send( false );
        // dd();
        $output = '
        <div class="col-lg-12">
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;margin-top:-15px;">(Plant-Wise) Retail Sale</h5>
            <div style="text-align: center;margin-top: -18px;margin-bottom: 10px;">
                <span>From '.date("d-M-y", strtotime($plant_data['from_date'])).'</span>
                <span>To '.date("d-M-y", strtotime($plant_data['to_date'])).'</span>
            </div>
            <div style="margin-top: -18px;margin-bottom: 10px;">
            Plant Name: '.$plant_data['reports'][0]->plant_name.'
            </div>
            
        </div>
        <table width="100%" style="border-collapse: collapse;border: 0px;margin-top:2%">
                <thead>
                    <tr>
                        <th style="text-align: center;border: 2px solid;">RS No</th>
                        <th style="text-align: center;border: 2px solid;">Rs Date</th>
                        <th style="text-align: center;border: 2px solid;">Customer Name</th>
                        <th style="text-align: center;border: 2px solid;">Vehicle No</th>
                        <th style="text-align: center;border: 2px solid;">Cyl Qty</th>
                        <th style="text-align: center;border: 2px solid;">Cyl Capacity</th>
                    </tr>
                </thead>
        ';
        $in_cylinder_qty = 0;
        foreach($plant_data['reports'] as $plant)
        {
            $output .= '
            <div class="col-lg-12">
            </div>
            <tbody id="myTable">
                <tr class="odd gradeX">
                    <td style="text-align: center;border: 1px solid;">'.$plant->id.'</td>
                    <td style="text-align: center;border: 1px solid;">'.date("d-m-Y",strtotime($plant->rs_date)).'</td>
                    <td style="text-align: center;border: 1px solid;">'.$plant->name.'</td>
                    
                    <td style="text-align: center;border: 1px solid;">'.$plant->vehicle_no.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$plant->in_cylinder_qty.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$plant->cylinder_capacity.'</td>'

                    .intval($in_cylinder_qty = $in_cylinder_qty + $plant->in_cylinder_qty).'
                         
                </tr>   
            </tbody>';

        }
        $output .= '</table>';
        $output .= '<span style="float: left;margin-top:2%;">Total :<b></b></span>';
        $output .= '<span style="float: right;margin-right: 25%;background-color: #E5E5E5;"><b>'.$in_cylinder_qty.'</b></span>'; 
        return $output;
    }
}