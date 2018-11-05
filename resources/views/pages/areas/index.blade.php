@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage Areas</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <!-- /.row -->
    <div class="row">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <a href="areas/create">
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
                    <b>Results for "Areas"</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <input id="myInput" type="text" placeholder="Search.." style="float: right;margin-bottom: 10px;">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Area Name</th>
                                <th>Area Short Name</th>
                                <th>Zone Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($areas as $area)
                            <tbody id="myTable">
                                <tr>
                                    <td>{{ $area->area_name }}</td>
                                    <td>{{ $area->area_short_name }}</td>
                                    <td>{{ $area->zone->zone_name }}</td>
                                    <td>
                                <a class="green" href="{{ route('areas.edit',['id'=>$area->id]) }}">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a id="trash" onclick="return confirm('Are you sure to delete this?')" href="{{ route('areas.delete',['id'=>$area->id]) }}">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </td>
                                </tr>

                            </tbody>
                            
                        @endforeach    
                    </table>
                    {{-- {{!! $area->links(); !!}} --}}
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