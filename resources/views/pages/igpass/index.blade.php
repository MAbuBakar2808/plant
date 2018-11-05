@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header text-center">IGP-Bowser Register</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <a href="inward-gate/create">
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
                    <b>All Records of "Inward Gate Pass"</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <input id="myInput" type="text" placeholder="Search.." style="float: right;margin-bottom: 10px;">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="border-bottom: none;">
                        <thead>
                            <tr>
                                <th style="text-align: center; width:9%;">IGP Date</th>
                                <th style="text-align: center;">IGP Time</th>
                                <th style="text-align: center;">Invard Type</th>
                                <th style="text-align: center;">Party Name</th>
                                <th style="text-align: center;">Plant Name</th>
                                <th style="text-align: center;">Bowser No</th>
                                <th style="text-align: center;">Driver Name</th>
                                <th style="text-align: center;">Driver Cell</th>
                                <th style="text-align: center;">Load Weight</th>
                                <th style="text-align: center;">Offload Weight</th>
                                <th style="width: 15%">Remarks</th>
                                <th style="text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <?php $load_weight = 0; ?>
                        <?php $offload_weight = 0; ?>
                        @foreach($igpass as $igpas)
                            <tbody id="myTable">
                                <tr class="odd gradeX">
                                    <td>{{ date("d-m-Y",strtotime($igpas->igp_date)) }}</td>
                                    <td>{{ date("h:i",strtotime($igpas->igp_time)) }}</td>
                                    <td>{{ $igpas->igp_type }}</td>
                                    <td>{{ $igpas->supplier->supplier_name }}</td>
                                    <td>{{ $igpas->plant_name }}</td>
                                    <td>{{ $igpas->bowser_no }}</td>
                                    <td>{{ $igpas->driver_name }}</td>
                                    <td>{{ $igpas->driver_cell }}</td>
                                    <td>{{ $igpas->load_weight }}</td>
                                    <td>{{ $igpas->offload_weight }}</td>
                                    <td>{{ $igpas->remarks }}</td>
                                    <?php $load_weight += $igpas->load_weight; ?>
                                    <?php $offload_weight += $igpas->offload_weight; ?>
                                    
                                    <td>
                                        <a class="green" href="{{ route('inward-gate.edit',['id'=>$igpas->id]) }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a id="trash" onclick="return confirm('Are you sure to delete this?')" href="{{ route('inward-gate.delete',['id'=>$igpas->id]) }}">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td> 
                                </tr>   
                            </tbody>
                        @endforeach
                        {{-- <tbody style="border:none">
                            <tr>
                                <td colspan="6"  style="border: none; background-color: #fff;">
                                    
                                </td>
                                <td colspan="2"  style="border: none; background-color: #fff;padding-left: 43px;">
                                    Page Total:
                                </td>

                                <td style="border: none; background-color: #fff" >
                                    <b>{{ $load_weight }}</b>
                                </td>
                                <td style="border: none; background-color: #fff" >
                                    <b>{{ $offload_weight }}</b>
                                </td>
                            </tr>   
                        </tbody> --}}    
                    </table>
                    <div class="text-center" style="margin-top: -28px;margin-bottom: -30px;">
                        {{ $igpass->links() }}
                    </div>
                    
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
        <!-- /#page-wrapper -->
</div>

@endsection