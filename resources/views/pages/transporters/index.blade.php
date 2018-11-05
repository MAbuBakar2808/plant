@extends('main')

@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Create Transporters</h3>
        </div>
    </div>
    <div class="row">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <a href="transporter/create">
                    <button class="btn btn-success">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add New
                    </button>
                </a>
                
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Results for "Transporters"</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <input id="myInput" type="text" placeholder="Search.." style="float: right;margin-bottom: 10px;">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Transporter Name</th>
                                <th>NTN</th>
                                <th>Vehicle No</th>
                                <th>Bowser Capacity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($transporters as $transporter)
                            <tbody id="myTable">
                                <tr class="odd gradeX">
                                    <td>{{ $transporter->trp_name }}</td>
                                    <td>{{ $transporter->trp_ntn }}</td>
                                    <td>{{ $transporter->trp_vehicle_no }}</td>
                                    <td>{{ $transporter->trp_bs_capacity }}</td>
                                    <td>
                                        <a class="green" href="#">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a id="trash" onclick="return confirm('Are you sure to delete this?')" href="{{ route('transporter.delete',['id'=>$transporter->id]) }}">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td> 
                                </tr>   
                            </tbody>
                        @endforeach    
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

@endsection