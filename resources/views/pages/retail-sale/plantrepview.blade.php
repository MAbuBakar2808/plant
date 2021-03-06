@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('retail-sale.report_plant') }}" style="position: absolute;margin-top: 16px;">
                <i class="glyphicon glyphicon-arrow-left"></i> Back  
            </a>
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;">(Plant-Wise) Retail Sale </h5>
            <div style="text-align: center;">
                <span> From {{ date("d-M-y", strtotime($from_date)) }}</span>
                <span> To {{ date("d-M-y", strtotime($to_date)) }}</span>
            </div> 
            <h5 style="position: absolute;">Plant Name: <b>{{ $reports[0]->plant_name }}</b></h5>
            <div class="clearfix">
                <div class="pull-right tableTools-container">
                    <a href="{{ url('retail-sale/plantpdf?from_date='.$from_date.'&to_date='.$to_date.'&plant_name='.$plant_name) }}">
                        <button class="btn btn-success">
                            <i class="ace-icon glyphicon glyphicon-plus"></i>
                            PDF
                        </button>
                    </a> 
                </div>
        </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example" style="border-bottom: none;">
                        <thead>
                            <tr>
                                <th>RS No</th>
                                <th>RS Date</th>
                                <th>Customer Name</th>
                                <th>Vehicle No</th>
                                <th>Cyl Qty</th>
                                <th>Cyl Capacity</th>
                            </tr>
                        </thead>
                        <?php $in_cylinder_qty = 0; ?>
                        @foreach($reports as $report)
                            <tbody id="myTable">
                                <tr class="odd gradeX">
                                    <td>{{ $report->id }}</td>
                                    <td>{{ date("d-m-Y",strtotime($report->rs_date)) }}</td>
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->vehicle_no }}</td>
                                    <td>{{ $report->in_cylinder_qty }}</td>
                                    <td>{{ $report->cylinder_capacity }}</td>
                                    <?php $in_cylinder_qty += $report->in_cylinder_qty; ?> 
                                </tr> 
                            </tbody>
                        @endforeach
                        <tbody style="border:none">
                            <tr>
                                <td colspan="2"  style="border: none; background-color: #fff">
                                    
                                </td>
                                <td colspan="2"  style="border: none; background-color: #fff;text-align: center;    padding-left: 70px;">
                                    Page Total:
                                </td>
                                <td style="border: none; background-color: #fff" >
                                    <b>{{ $in_cylinder_qty }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" style="border: none; background-color: #fff">           
                                </td>
                                <td colspan="3" style="border: none; background-color: #fff;text-align: center;
                                    padding-left: 180px;">
                                    <b>Grand Total: </b>           
                                </td>
                                <td style="border: none; background-color: #fff">
                                    @if(isset($ldwtplant))
                                       
                                            <b>{{ $ldwtplant }}</b>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center" style="margin-top: -27px;margin-bottom: -30px;">
                        {{ $reports->appends(['from_date' => $from_date, 'to_date' => $to_date, 'plant_name' => $plant_name])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection