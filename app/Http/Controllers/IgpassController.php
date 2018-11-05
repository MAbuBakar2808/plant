<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Igpass;
use App\Plant;
use App\Supplier;
use Session;
use DB;
use PDF;
use View;

class IgpassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $igpass = Igpass::paginate(5);
        return view('pages.igpass.index' ,['igpass' => $igpass]);
    }

    // public function get_report_data()
    // {
    //     $igpass = Igpass::all();
    //     return $igpass;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plants = Plant::all();
        $suppliers = Supplier::all();
        return view('pages.igpass.add' ,['plants' => $plants , 'suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $igpass = new Igpass();
        $igpass->igp_date = date('Y-m-d',strtotime($request->igp_date));
        $igpass->igp_time = $request->igp_time;
        $igpass->igp_type = $request->igp_type;
        $igpass->supplier_id = $request->supplier_id;
        $igpass->plant_name = $request->plant_name;
        $igpass->bowser_no = $request->bowser_no;
        $igpass->driver_name = $request->driver_name;
        $igpass->driver_cell = $request->driver_cell;
        $igpass->load_weight = $request->load_weight;
        $igpass->offload_weight = $request->offload_weight;
        $igpass->remarks = $request->remarks;
        //print_r($igpass);die;
        $igpass->save();
        Session::flash('success', 'Your Record is saved successfully...');
        return redirect()->route('inward-gate.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Igpass  $igpass
     * @return \Illuminate\Http\Response
     */
    public function show(Igpass $igpass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Igpass  $igpass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $igpass = Igpass::find($id);
        $plants = Plant::all();
        $suppliers = Supplier::all();
        return view('pages.igpass.edit' ,['igpass' => $igpass , 'plants' => $plants,'suppliers' => $suppliers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Igpass  $igpass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $igpass = Igpass::find($id);
        $igpass->igp_date = date('Y-m-d',strtotime($request->igp_date));
        $igpass->igp_time = $request->igp_time;
        $igpass->igp_type = $request->igp_type;
        $igpass->supplier_id = $request->supplier_id;
        $igpass->plant_name = $request->plant_name;
        $igpass->bowser_no = $request->bowser_no;
        $igpass->driver_name = $request->driver_name;
        $igpass->driver_cell = $request->driver_cell;
        $igpass->load_weight = $request->load_weight;
        $igpass->offload_weight = $request->offload_weight;
        $igpass->remarks = $request->remarks;
        //var_dump($igpass);die;
        $igpass->save();
        Session::flash('success', 'Record has been updated successfully.');
        return redirect()->route('inward-gate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Igpass  $igpass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $igpass = Igpass::find($id);
        $igpass->delete();
        Session::flash('success', 'Record has been deleted successfully!');
        return redirect()->route('inward-gate');
    }

    
    public function report_create()
    {
        $suppliers = Supplier::all();
        return view('pages.igpass.report' ,['suppliers' => $suppliers]);
    }

    public function report_send( $sendHtml = true ) 
    {
        $from_date = Input::get('from_date'); 
        $to_date = Input::get('to_date');
        $party_name = Input::get('party_name');
        $reports = DB::table('igpasses')
                ->join('suppliers', 'suppliers.id', '=', 'igpasses.supplier_id')
                ->select('igpasses.igp_date','igpasses.igp_type', 'igpasses.bowser_no',
                         'igpasses.load_weight','igpasses.offload_weight','suppliers.supplier_name')
                ->whereBetween('igp_date', [$from_date, $to_date])
                ->where('igpasses.supplier_id', '=', $party_name)
                ->paginate(5);
        //print_r($reports);

        $ldwt = DB::table('igpasses')
                ->whereBetween('igp_date', [$from_date, $to_date])
                ->where('igpasses.supplier_id', '=', $party_name)
                ->sum('igpasses.load_weight');

        if($reports->lastPage() == $reports->currentPage()) {
            
            View::share('ldwt', $ldwt);
        } 
        

        if( $sendHtml ){
            return view('pages.igpass.reportview' ,['reports' => $reports,'from_date' => $from_date,'to_date' => $to_date,'party_name' => $party_name]);
        } 
        return array('reports' => $reports,'from_date' => $from_date,'to_date' => $to_date);
        

    }

    public function pdfpage()
    {
        $pdf = \App::make('dompdf.wrapper');
        //print_r ($this->convert_data_html());
        $pdf->loadHTML($this->convert_data_html());
        return $pdf->stream('IGP-Bowser.pdf', array("Attachment" => false));
        
    }


    public function convert_data_html() 
    {
        $report_data = $this->report_send( false );
        $output = '
        <div class="col-lg-12">
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;margin-top:-15px;">Inward Gate Pass-Bowser</h5>
            <div style="text-align: center;margin-top: -18px;margin-bottom: 10px;">
                <span>From '.date("d-M-y", strtotime($report_data['from_date'])).'</span>
                <span>To '.date("d-M-y", strtotime($report_data['to_date'])).'</span>
            </div>
            <div style="margin-top: -18px;margin-bottom: 10px;">
            Supplier Name: '.$report_data['reports'][0]->supplier_name.'
            </div>
        </div>
        <table width="100%" style="border-collapse: collapse;border: 0px;margin-top:2%">
                <thead>
                    <tr>
                        <th style="text-align: center;border: 2px solid;">IGP Date</th>
                        <th style="text-align: center;border: 2px solid;">IGP Type</th>
                        <th style="text-align: center;border: 2px solid;">Bowser No</th>
                        <th style="text-align: center;border: 2px solid;">Load Weight</th>
                        <th style="text-align: center;border: 2px solid;">Offload Weight</th>
                    </tr>
                </thead>
        ';
        $load_weight = 0;
        $offload_weight = 0;
        foreach($report_data['reports'] as $report)
        {
            $output .= '
            <div class="col-lg-12">
            </div>
            <tbody id="myTable">
                <tr class="odd gradeX">
                    <td style="text-align: center;border: 1px solid;">'.date("d-m-Y",strtotime($report->igp_date)).'</td>
                    <td style="text-align: center;border: 1px solid;">'.$report->igp_type.'</td>
                    
                    <td style="text-align: center;border: 1px solid;">'.$report->bowser_no.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$report->load_weight.'</td>
                    <td style="text-align: center;border: 1px solid;">'.$report->offload_weight.'</td>'

                    .intval($load_weight = $load_weight + $report->load_weight).'
                    '.intval($offload_weight = $offload_weight + $report->offload_weight).'     
                </tr>   
            </tbody>';

        }
        $output .= '</table>';
        $output .= '<span style="float: left;margin-top:2%;">Total :<b></b></span>';
        $output .= '<span style="float: right;margin-right: 11%;background-color: #E5E5E5;"><b>'.$offload_weight.'</b></span>';
        $output .= '<span style="float: right;margin-right: 21%;background-color: #E5E5E5;"><b>'.$load_weight.'</b></span>'; 
        return $output;
    }   
}
