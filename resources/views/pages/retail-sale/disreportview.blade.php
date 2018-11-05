@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('retail-sale.report_customer') }}" style="position: absolute;margin-top: 16px;">
                <i class="glyphicon glyphicon-arrow-left"></i> Back  
            </a>
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;">(Customer-Wise) Retail sale </h5>
            <div style="text-align: center;">
                <span> From {{ date("d-M-y", strtotime($from_date)) }}</span>
                <span> To {{ date("d-M-y", strtotime($to_date)) }}</span>
            </div>
            <h5 style="position: absolute;">Party Name: <b>{{ $reports[0]->name }}</b></h5>
            <div class="clearfix">
                <div class="pull-right tableTools-container">
                    <a href="{{ url('retail-sale/distpdf?from_date='.$from_date.'&to_date='.$to_date.'&distributor_id='.$distributor_id) }}">
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
                                <th>Plant Name</th>
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
                                    <td>{{ $report->plant_name }}</td>
                                    <td>{{ $report->vehicle_no }}</td>
                                    <td>{{ $report->in_cylinder_qty }}</td>
                                    <td>{{ $report->cylinder_capacity }}</td>
                                    <?php $in_cylinder_qty += $in_cylinder_qty; ?>  
                                </tr> 
                            </tbody>
                        @endforeach
                        <tbody style="border:none">
                            <tr>
                                <td colspan="2"  style="border: none; background-color: #fff">
                                    
                                </td>
                                <td colspan="2"  style="border: none; background-color: #fff;text-align: center;">
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
                                    padding-left: 136px;">
                                    <b>Grand Total: </b>           
                                </td>
                                <td style="border: none; background-color: #fff">
                                    @if(isset($ldwtdist))
                                       
                                            <b>{{ $ldwtdist }}</b>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center" style="margin-top: -27px;margin-bottom: -30px;">
                        {{ $reports->appends(['from_date' => $from_date, 'to_date' => $to_date, 'distributor_id' => $distributor_id])->links() }}
                    </div>
                </div>
            <!-- /.panel -->
            </div>
        <!-- /.col-lg-12 -->
        </div>
        <!-- /#page-wrapper -->
    </div>

@endsection