@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('inward-gate.report') }}" style="position: absolute;margin-top: 16px;">
                <i class="glyphicon glyphicon-arrow-left"></i> Back  
            </a>
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;">Inward Gate Pass-Bowser</h5>
            <div style="text-align: center;">
                <span> From {{ date("d-M-y", strtotime($from_date)) }}</span>
                <span> To {{ date("d-M-y", strtotime($to_date)) }}</span>
            </div>
            
            <h5 style="position: absolute;">Party Name: <b>{{ $reports[0]->supplier_name }}</b></h5>
            <div class="clearfix">
                <div class="pull-right tableTools-container">
                    <a href="{{ url('inward-gate/pdf?from_date='.$from_date.'&to_date='.$to_date.'&party_name='.$party_name) }}">
                        <button class="btn btn-success">
                            <i class="ace-icon glyphicon glyphicon-plus"></i>
                            PDF
                        </button>
                    </a> 
                </div>
            </div>   
        </div>
        <!-- /.col-lg-12 -->
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
                                <th>IGP Date</th>
                                <th>IGP Type</th>
                                <th>Supplier Name</th>
                                <th>Bowser No</th>
                                <th>Load Weight</th>
                                <th>Offload Weight</th>
                            </tr>
                        </thead>
                        <?php $load_weight = 0; ?>
                        <?php $offload_weight = 0; ?>
                        @foreach($reports as $report)
                            <tbody id="myTable">
                                <tr class="odd gradeX">
                                    <td>{{ date("d-m-Y",strtotime($report->igp_date)) }}</td>
                                    <td>{{ $report->igp_type }}</td>
                                    <td>{{ $report->supplier_name }}</td>
                                    <td>{{ $report->bowser_no }}</td>
                                    <td>{{ $report->load_weight }}</td>
                                    <td>{{ $report->offload_weight }}</td> 
                                <?php $load_weight += $report->load_weight; ?>
                                <?php $offload_weight += $report->offload_weight; ?>
                                </tr> 
                            </tbody>
                        @endforeach
                        <tbody style="border:none">
                            <tr>
                                <td colspan="1"  style="border: none; background-color: #fff">
                                    
                                </td>
                                <td colspan="3"  style="border: none; background-color: #fff;text-align: center;padding-left: 180px;">
                                    Page Total:
                                </td>
                                <td style="border: none; background-color: #fff" >
                                    <b>{{ $load_weight }}</b>
                                </td>
                                <td style="border: none; background-color: #fff" >
                                    <b>{{ $offload_weight }}</b>
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
                                    @if(isset($ldwt))
                                       
                                            <b>{{ $ldwt }}</b>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center" style="margin-top: -27px;margin-bottom: -30px;">
                        
                        {{ $reports->appends(['from_date' => $from_date, 'to_date' => $to_date,'party_name' => $party_name])->links() }}
                    
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>

@endsection