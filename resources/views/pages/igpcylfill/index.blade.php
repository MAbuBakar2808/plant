@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12" style="text-align: center;">
            <h3 class="page-header">IGP-Cylinder Filling Register</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <a href="igp-cylfill/create">
                    <button class="btn btn-success">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add New
                    </button>
                </a>
                {{-- <a href="inward-gate/report">
                    <button class="btn btn-success">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Generate Report
                    </button>
                </a> --}}  
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>All Records of "Inward Gate Pass Cylinder-Filling"</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <input id="myInput" type="text" placeholder="Search.." style="float: right;margin-bottom: 10px;">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="border-bottom: none;">
                        <thead>
                            <tr>
                                <th>IGP No</th>
                                <th>IGP Date</th>
                                <th>Customer Name</th>
                                <th>Plant Name</th>
                                <th>Vehicle No</th>
                                <th>Cyl Qty</th>
                                <th>Cyl Capacity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php $cyl_qty = 0; ?>
                        @foreach($cylfill as $cyl)
                            <tbody id="myTable">
                                <tr class="odd gradeX">
                                    <td>{{ ($cyl->id) }}</td>
                                    <td>{{ date("d-m-Y",strtotime($cyl->igp_date)) }}</td>
                                    <td>{{ $cyl->name }}</td>
                                    <td>{{ $cyl->plant_name }}</td>
                                    <td>{{ $cyl->vehicle_no }}</td>
                                    <td>{{ $cyl->cyl_qty }}</td>
                                    <td>{{ $cyl->cyl_capacity }}</td>
                                    <?php $cyl_qty += $cyl->cyl_qty; ?>
                                    <td>
                                        <a class="green" href="{{ route('igp-cylfill.edit',['id'=>$cyl->id]) }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a id="trash" onclick="return confirm('Are you sure to delete this?')" href="{{ route('igp-cylfill.delete',['id'=>$cyl->id]) }}">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td> 
                                </tr>   
                            </tbody>
                        @endforeach
                        {{-- <tbody style="border:none">
                            <tr>
                                <td colspan="3"  style="border: none; background-color: #fff">
                                    
                                </td>
                                <td colspan="2"  style="border: none; background-color: #fff;padding-left: 91px;">
                                    Page Total:
                                </td>
                                <td style="border: none; background-color: #fff" >
                                    <b>{{ $cyl_qty }}</b>
                                </td>
                                <tr>
                                    <td colspan="3"  style="border: none; background-color: #fff"></td> --}}
                                {{-- <td colspan="2"  style="border: none; background-color: #fff;padding-left: 66px;">
                                    <b>Grand Total:</b>
                                </td>
                                <td style="border: none; background-color: #fff">
                                    
                                    @if(isset($cyl_qtytotal))
                                        <b>{{ $cyl_qtytotal }}</b>
                                    @endif
                                </td> --}}
                                {{-- </tr>
                                
                            </tr>   
                        </tbody> --}}  
                    </table>
                    <div class="text-center">
                        {{ $cylfill->links() }}
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