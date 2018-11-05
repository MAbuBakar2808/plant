<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use App\Igpcylfill;
use App\Plant;
use App\Distributor;
use App\Igpcfcode;
use App\Igpcfdetail;
use Session;
use DB;
use View;

class IgpcylfillController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cylfill =  DB::table('igpcfcodes')
                    ->join('igpcfdetails', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                    ->join('distributors', 'igpcfcodes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'igpcfcodes.plant_id', '=', 'plants.id')
                    ->select('igpcfcodes.id','igpcfcodes.igp_date','igpcfcodes.vehicle_no','igpcfdetails.cyl_qty','igpcfdetails.cyl_capacity','distributors.name','plants.plant_name')
                    ->paginate(6);

        $cyl_qtytotal = DB::table('igpcfdetails')
                    ->join('igpcfcodes', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                    ->sum('igpcfdetails.cyl_qty');

        if($cylfill->lastPage() == $cylfill->currentPage()) {
            
                View::share('cyl_qtytotal', $cyl_qtytotal);
        }

        return view('pages.igpcylfill.index' ,['cylfill' => $cylfill,'cyl_qtytotal' => $cyl_qtytotal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plants = Plant::all();
        $distributors = Distributor::all();
        return view('pages.igpcylfill.add' ,['plants' => $plants,'distributors' => $distributors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->toArray());

        $igpcfcode = new Igpcfcode();
        $igpcfcode->igp_no = 23;
        $igpcfcode->token_no = $request->token_no;
        $igpcfcode->igp_time = $request->igp_time;
        $igpcfcode->igp_date = date('Y-m-d',strtotime($request->igp_date));
        $igpcfcode->distributor_id = $request->distributor_id;
        $igpcfcode->vehicle_no = $request->vehicle_no;
        $igpcfcode->driver_name = $request->driver_name;
        $igpcfcode->driver_cell = $request->driver_cell;
        $igpcfcode->plant_id = $request->plant_id;
        $igpcfcode->remark = $request->remark;
        $igpcfcode->user_name = 'abubakar';
        $igpcfcode->entry_date = '2018-09-12';
        $igpcfcode->entry_time = '12:25:00';
        $igpcfcode->rs_status = 'yes';
        $igpcfcode->igp_status = 'no';
        $igpcfcode->ogp_no = 5;
        $igpcfcode->igp_type = 'self';

        if($igpcfcode->save()) {
            $id = $igpcfcode->id;
            foreach ($request->cyl_qty as $key => $value) {
                $data = array(
                'igpcfcode_id' => $id,
                'igpd_no' =>25,
                'int_no' => 30,
                'int_desc' => 'yes',
                'cyl_qty' => $request->cyl_qty[$key],
                'cyl_capacity' => $request->cyl_capacity[$key],
                'remarks' => $request->remarks[$key]);
                Igpcfdetail::insert($data);
            }           
        }
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('igp-cylfill.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Igpcylfill  $igpcylfill
     * @return \Illuminate\Http\Response
     */
    public function show(Igpcylfill $igpcylfill)
    {
        //
    }

    public function edit($id)
    {
        $igpcfcode = Igpcfcode::find($id);
        $id = $igpcfcode->id; 
        $details =  DB::table('igpcfdetails') 
                    ->select('cyl_qty','cyl_capacity','remarks')
                    ->where('igpcfcode_id', '=', $id)
                    ->get();
        $distributors = Distributor::all();
        $plants = Plant::all();
        return view('pages.igpcylfill.edit' ,['igpcfcode' => $igpcfcode,'plants' => $plants,'distributors' => $distributors,'details' => $details]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Igpcylfill  $igpcylfill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $igpcfcode = Igpcfcode::find($id);
        $id = $igpcfcode->id;
        $igpcfdetails = Igpcfdetail::where('igpcfcode_id','=',$id)->get();
        $igpcfcode->igp_no = 23;
        $igpcfcode->token_no = 2;
        $igpcfcode->igp_time = $request->igp_time;
        $igpcfcode->igp_date = date('Y-m-d',strtotime($request->igp_date));
        $igpcfcode->distributor_id = $request->distributor_id;
        $igpcfcode->vehicle_no = $request->vehicle_no;
        $igpcfcode->driver_name = $request->driver_name;
        $igpcfcode->driver_cell = $request->driver_cell;
        $igpcfcode->plant_id = $request->plant_id;
        $igpcfcode->remark = $request->remark;
        $igpcfcode->user_name = 'abubakar';
        $igpcfcode->entry_date = '2018-09-12';
        $igpcfcode->entry_time = '12:25:00';
        $igpcfcode->rs_status = 'yes';
        $igpcfcode->igp_status = 'no';
        $igpcfcode->ogp_no = 5;
        $igpcfcode->igp_type = 'self';
        $igpcfcode->save();
        $id = $igpcfcode->id;
        $i=0;
        foreach ($igpcfdetails as $igpcfdetail) {

                $igpcfdetail->cyl_qty = Input::get('cyl_qty')[$i];
                $igpcfdetail->cyl_capacity = Input::get('cyl_capacity')[$i];
                $igpcfdetail->remarks = Input::get('remarks')[$i];
                $igpcfdetail->save();
                $i++;
        }           
        Session::flash('success', 'Record has been updated successfully.');
        return redirect()->route('igp-cylfill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Igpcylfill  $igpcylfill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $igpcfcode = Igpcfcode::find($id);
        $igpcfcode->igpcfdetail()->delete();
        Session::flash('success', 'Record has been deleted successfully.');
        return redirect()->route('igp-cylfill');
    }


    public function report_send()
    {
        $max_id  =  DB::table('igpcfcodes')->max('id');
        $reports =  DB::table('igpcfcodes')
                    ->join('igpcfdetails', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                    ->join('distributors', 'igpcfcodes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'igpcfcodes.plant_id', '=', 'plants.id')
                    ->select('igpcfcodes.igp_date','igpcfcodes.igp_time','igpcfcodes.token_no','igpcfcodes.vehicle_no','igpcfcodes.driver_name','igpcfcodes.driver_cell','igpcfcodes.remark','igpcfdetails.cyl_qty','igpcfdetails.cyl_capacity','igpcfdetails.remarks','distributors.name','plants.plant_name')
                    ->where('igpcfcodes.id', '=', $max_id)
                    ->get();
                    return view('pages.igpcylfill.reportindex' ,['reports' => $reports]);
    }

    public function report_distributor()
    {
        $distributors = Distributor::all();
        return view('pages.igpcylfill.distrepcreate' ,['distributors' => $distributors]);
    }


    public function send_report( $sendHtml = true ) 
    {
        $from_date = Input::get('from_date');
        $to_date = Input::get('to_date');
        $distributor_id = Input::get('distributor_id');
        //print_r($distributor_id);
        $reports = DB::table('igpcfcodes')
                    ->join('igpcfdetails', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                    ->join('distributors', 'igpcfcodes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'igpcfcodes.plant_id', '=', 'plants.id')
                    ->select('igpcfcodes.id','igpcfcodes.igp_date','igpcfcodes.vehicle_no','igpcfdetails.cyl_qty','igpcfdetails.cyl_capacity','distributors.name','plants.plant_name')
                    ->whereBetween('igp_date', [$from_date, $to_date])
                    ->where('igpcfcodes.distributor_id', '=', $distributor_id)
                    ->paginate(6);

            $ldwtdist = DB::table('igpcfdetails')
                ->join('igpcfcodes', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                ->join('distributors', 'distributors.id', '=', 'igpcfcodes.distributor_id')
                ->whereBetween('igp_date', [$from_date, $to_date])
                ->where('igpcfcodes.distributor_id', '=', $distributor_id)
                ->sum('igpcfdetails.cyl_qty');

            if($reports->lastPage() == $reports->currentPage()) {
            
                View::share('ldwtdist', $ldwtdist);
            }

            if( $sendHtml ) {
                return view('pages.igpcylfill.disreportview' ,['reports' => $reports,'from_date' => $from_date,'to_date' => $to_date,'distributor_id' => $distributor_id]);
            }
            return array('reports' => $reports,'from_date' => $from_date,'to_date' => $to_date);
    }

    public function pdfdist()
    {
        $pdf = \App::make('dompdf.wrapper');
        //print_r ($this->convert_data_html());
        $pdf->loadHTML($this->convert_data_dist());
        return $pdf->stream('IGP-cylfill-dist.pdf', array("Attachment" => false));
        
    }


    public function convert_data_dist() 
    {
        $dist_data = $this->send_report( false );
        $output = '
        <div class="col-lg-12">
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;margin-top:-15px;">(Customer-Wise)IGP-Cylinder Filling</h5>
            <div style="text-align: center;margin-top: -18px;margin-bottom: 10px;">
                <span>From '.date("d-M-y", strtotime($dist_data['from_date'])).'</span>
                <span>To '.date("d-M-y", strtotime($dist_data['to_date'])).'</span>
            </div>
            <div style="margin-top: -18px;margin-bottom: 10px;">
                Supplier Name: '.$dist_data['reports'][0]->name.'
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
        $cyl_qty = 0;
        foreach($dist_data['reports'] as $distributor)
        {
            $output .= '
            <div class="col-lg-12">
            </div>
            <tbody id="myTable">
                <tr class="odd gradeX">
                    <td style="text-align: center;border: 1px solid;">'.$distributor->id.'</td>
                    <td style="text-align: center;border: 1px solid;">'.date("d-m-Y",strtotime($distributor->igp_date)).'</td>
                    <td style="text-align: center;border: 1px solid;">'.$distributor->plant_name.'</td>
                    
                    <td style="text-align: center;border: 1px solid;">'.$distributor->vehicle_no.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$distributor->cyl_qty.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$distributor->cyl_capacity.'</td>'

                    .intval($cyl_qty = $cyl_qty + $distributor->cyl_qty).'
                         
                </tr>   
            </tbody>';

        }
        $output .= '</table>';
        $output .= '<span style="float: left;margin-top:2%;">Total :<b></b></span>';
        $output .= '<span style="float: right;margin-right: 27%;background-color: #E5E5E5;"><b>'.$cyl_qty.'</b></span>'; 
        return $output;
    }



    public function report_plant()
    {
        $plants = Plant::all();
        return view('pages.igpcylfill.plantrepcreate' ,['plants' => $plants]);
    }


    public function report_plant_send( $sendHtml = true ) 
    {
        $from_date = Input::get('from_date');
        $to_date = Input::get('to_date');
        $plant_name = Input::get('plant_name');

        $reports = DB::table('igpcfcodes')
                    ->join('igpcfdetails', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                    ->join('distributors', 'igpcfcodes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'igpcfcodes.plant_id', '=', 'plants.id')
                    ->select('igpcfcodes.id','igpcfcodes.igp_date','igpcfcodes.vehicle_no','igpcfdetails.cyl_qty','igpcfdetails.cyl_capacity','distributors.name','plants.plant_name')
                    ->whereBetween('igp_date', [$from_date, $to_date])
                    ->where('igpcfcodes.plant_id', '=', $plant_name)
                    ->paginate(8);
// print_r($reports);
            $ldwtplant = DB::table('igpcfdetails')
                ->join('igpcfcodes', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                ->join('plants', 'plants.id', '=', 'igpcfcodes.plant_id')
                ->whereBetween('igp_date', [$from_date, $to_date])
                ->where('igpcfcodes.plant_id', '=', $plant_name)
                ->sum('igpcfdetails.cyl_qty');

            if($reports->lastPage() == $reports->currentPage()) {
            
                View::share('ldwtplant', $ldwtplant);
            }

            if($sendHtml) {
                return view('pages.igpcylfill.plantrepview' ,['reports' => $reports,'from_date' => $from_date,'to_date' => $to_date,'plant_name' => $plant_name]);
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
        return $pdf->stream('IGP-cylfill-plant.pdf', array("Attachment" => false));
        
    }

    public function convert_data_plant() 
    {
        $plant_data = $this->report_plant_send( false );
        // dd();
        $output = '
        <div class="col-lg-12">
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;margin-top:-12px;">IGP-Cylinder Filling (Plant-Wise)</h5>
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
                        <th style="text-align: center;border: 2px solid;">IGP No</th>
                        <th style="text-align: center;border: 2px solid;">IGP Date</th>
                        <th style="text-align: center;border: 2px solid;">Customer Name</th>
                        <th style="text-align: center;border: 2px solid;">Vehicle No</th>
                        <th style="text-align: center;border: 2px solid;">Cyl Qty</th>
                        <th style="text-align: center;border: 2px solid;">Cyl Capacity</th>
                    </tr>
                </thead>
        ';
        $cyl_qty = 0;
        foreach($plant_data['reports'] as $plant)
        {
            $output .= '
            <div class="col-lg-12">
            </div>
            <tbody id="myTable">
                <tr class="odd gradeX">
                    <td style="text-align: center;border: 1px solid;">'.$plant->id.'</td>
                    <td style="text-align: center;border: 1px solid;">'.date("d-m-Y",strtotime($plant->igp_date)).'</td>
                    <td style="text-align: center;border: 1px solid;">'.$plant->name.'</td>
                    
                    <td style="text-align: center;border: 1px solid;">'.$plant->vehicle_no.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$plant->cyl_qty.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$plant->cyl_capacity.'</td>'

                    .intval($cyl_qty = $cyl_qty + $plant->cyl_qty).'
                         
                </tr>   
            </tbody>';

        }
        $output .= '</table>';
        $output .= '<span style="float: left;margin-top:2%;">Total :<b></b></span>';
        $output .= '<span style="float: right;margin-right: 25%;background-color: #E5E5E5;"><b>'.$cyl_qty.'</b></span>'; 
        return $output;
    }

    public function report_date()
    {
        return view('pages.igpcylfill.daterepcreate');
    }

    public function report_date_send( $sendHtml = true ) 
    {
        $from_date = Input::get('from_date');
        $to_date = Input::get('to_date');
        
        $reports = DB::table('igpcfcodes')
                    ->join('igpcfdetails', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                    ->join('distributors', 'igpcfcodes.distributor_id', '=', 'distributors.id')
                    ->join('plants', 'igpcfcodes.plant_id', '=', 'plants.id')
                    ->select('igpcfcodes.id','igpcfcodes.igp_date','igpcfcodes.vehicle_no','igpcfdetails.cyl_qty','igpcfdetails.cyl_capacity','distributors.name','plants.plant_name')
                    ->whereBetween('igp_date', [$from_date, $to_date])
                    ->paginate(7);
            //print_r($reports);

        $ldwtdate = DB::table('igpcfdetails')
                ->join('igpcfcodes', 'igpcfcodes.id', '=', 'igpcfdetails.igpcfcode_id')
                ->whereBetween('igpcfcodes.igp_date', [$from_date, $to_date])
                ->sum('igpcfdetails.cyl_qty');

        if($reports->lastPage() == $reports->currentPage()) {
            
            View::share('ldwtdate', $ldwtdate);
        }
        if($sendHtml) {
            return view('pages.igpcylfill.dateindex' ,['reports' => $reports,'from_date' => $from_date,'to_date' => $to_date]);
        }
        return array('reports' => $reports,'from_date' => $from_date,'to_date' => $to_date);
  
    }

    public function pdfdate()
    {
        $pdf = \App::make('dompdf.wrapper');
        //print_r ($this->convert_data_html());
        $pdf->loadHTML($this->convert_data_date());
        return $pdf->stream('IGP-cylfill-register.pdf', array("Attachment" => false));
        
    }

    public function convert_data_date() 
    {
        $send_data = $this->report_date_send( false );
        $output = '
        <div class="col-lg-12">
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;margin-top:-15px;">IGP-Cylinder Filling Register</h5>
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
        $cyl_qty = 0;
        foreach($send_data['reports'] as $send)
        {
            $output .= '
            <div class="col-lg-12">
            </div>
            <tbody id="myTable">
                <tr class="odd gradeX">
                    <td style="text-align: center;border: 1px solid;">'.$send->id.'</td>
                    <td style="text-align: center;border: 1px solid;">'.date("d-m-Y",strtotime($send->igp_date)).'</td>
                    <td style="text-align: center;border: 1px solid;">'.$send->name.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$send->plant_name.'</td>
                    
                    <td style="text-align: center;border: 1px solid;">'.$send->vehicle_no.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$send->cyl_qty.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$send->cyl_capacity.'</td>'

                    .intval($cyl_qty = $cyl_qty + $send->cyl_qty).'
                         
                </tr>   
            </tbody>';

        }
        $output .= '</table>';
        $output .= '<span style="float: left;margin-top:2%;">Total :<b></b></span>';
        $output .= '<span style="float: right;margin-right: 22%;background-color: #E5E5E5;"><b>'.$cyl_qty.'</b></span>'; 
        return $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Igpcylfill  $igpcylfill
     * @return \Illuminate\Http\Response
     */


    public function getMaxToken(Request $request)
    {
        $current_date = date('Y-m-d');
        $objs = Igpcfcode::where(['plant_id'=>$request->plant_id, 'igp_date'=>$current_date])->orderBy('token_no', 'desc')->get();

        if($objs->isNotEmpty()) {
             $f_obj = $objs->first()->token_no;
              $i_no = $f_obj + 1;
              return response($i_no);
        } else {
            return response(1);
        }
    }
}
