@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Distributors Register</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <a href="distributor/create">
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
                    <b>All Records of "Distributors"</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <input id="myInput" type="text" placeholder="Search.." style="float: right;margin-bottom: 10px;">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Distributor Name</th>
                                <th>Distributor Address</th>
                                <th>Distributor City</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($distributors as $distributor)
                            <tbody id="myTable">
                                <tr class="odd gradeX">
                                    <td>{{ $distributor->name }}</td>
                                    <td>{{ $distributor->address }}</td>
                                    <td>{{ $distributor->city }}</td>
                                    <td>
                                        <a class="green" href="{{ route('distributor.edit',['id'=>$distributor->id]) }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a id="trash" onclick="return confirm('Are you sure to delete this?')" href="{{ route('distributor.delete',['id'=>$distributor->id]) 
                                            }}">
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