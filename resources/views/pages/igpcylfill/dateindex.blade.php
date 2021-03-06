@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('igp-cylfill.report_date') }}" style="position: absolute;margin-top: 16px;">
                <i class="glyphicon glyphicon-arrow-left"></i> Back  
            </a>
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;">IGP Cylinder-Filling Register</h5>
            <div style="text-align: center;">
                <span> From {{ date("d-M-y", strtotime($from_date)) }}</span>
                <span> To {{ date("d-M-y", strtotime($to_date)) }}</span>
            </div> 
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <a href="{{ url('igp-cylfill/datepdf?from_date='.$from_date.'&to_date='.$to_date) }}">
                    <button class="btn btn-success">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        PDF
                    </button>
                </a> 
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example" style="border-bottom: none;">
                        <thead>
                            <tr>
                                <th>IGP No</th>
                                <th>IGP Date</th>
                                <th>Plant Name</th>
                                <th>Customer Name</th>
                                <th>Vehicle No</th>
                                <th>Cyl Qty</th>
                                <th>Cyl Capacity</th>
                            </tr>
                        </thead>
                        <?php $cyl_qty = 0; ?>
                        @foreach($reports as $report)
                            <tbody id="myTable">
                                <tr class="odd gradeX">
                                    <td>{{ $report->id }}</td>
                                    <td>{{ date("d-m-Y",strtotime($report->igp_date)) }}</td>
                                    <td>{{ $report->plant_name }}</td>
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->vehicle_no }}</td>
                                    <td>{{ $report->cyl_qty }}</td>
                                    <td>{{ $report->cyl_capacity }}</td>
                                    <?php $cyl_qty += $report->cyl_qty; ?> 
                                </tr> 
                            </tbody>
                        @endforeach

                        <tbody style="border:none">
                            <tr>
                                <td colspan="3"  style="border: none; background-color: #fff">
                                    
                                </td>
                                <td colspan="2"  style="border: none; background-color: #fff;text-align: center;padding-left: 65px;">
                                    Page Total:
                                </td>
                                <td style="border: none; background-color: #fff" >
                                    <b>{{ $cyl_qty }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border: none; background-color: #fff">           
                                </td>
                                <td colspan="2" style="border: none; background-color: #fff;text-align: center;
                                    padding-left: 27px;">
                                    <b>Grand Total: </b>           
                                </td>
                                <td style="border: none; background-color: #fff">
                                    @if(isset($ldwtdate))
                                       
                                            <b>{{ $ldwtdate }}</b>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center" style="margin-top: -28px;margin-bottom: -30px;">
                        {{ $reports->appends(['from_date' => $from_date, 'to_date' => $to_date])->links() }}
                    </div>   
                </div>
            </div>
        </div>
    </div>

@endsection