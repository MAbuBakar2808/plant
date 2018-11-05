@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Suppliers Register</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <a href="supplier/create">
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
                    <b>All Records of "Suppliers"</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <input id="myInput" type="text" placeholder="Search.." style="float: right;margin-bottom: 10px;">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Supplier Address</th>
                                <th>Supplier City</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($suppliers as $supplier)
                            <tbody id="myTable">
                                <tr class="odd gradeX">
                                    <td>{{ $supplier->supplier_name }}</td>
                                    <td>{{ $supplier->supplier_address }}</td>
                                    <td>{{ $supplier->city_name }}</td>
                                    <td>
                                        <a class="green" href="{{ route('supplier.edit',['id'=>$supplier->id]) }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a id="trash" onclick="return confirm('Are you sure to delete this?')" href="{{ route('supplier.delete',['id'=>$supplier->id]) }}">
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
        <!-- /#page-wrapper -->
</div>

@endsection