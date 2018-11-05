@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('igp-cylfill') }}" style="position: absolute;margin-top: 30px;">
                <button class="btn btn-success">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    All Records
                </button>  
            </a>
            <h3 class="page-header" style="text-align: center;">Create IGP Cylinder Filling</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

	<div class="panel-body">
		<form action="{{ route('igp-cylfill.store') }}" method="post">

			{{ csrf_field() }}
            <div class="form-group col-md-3">
                <label for="plant_code">Plant Name:</label>
                <select class="form-control" name="plant_id" id="mySelect" onchange="myFunction()">
                    <option value="0">Select Plant Name</option>
                    @foreach($plants as $plant)
                        <option value="{{ $plant->id }}">{{ $plant->plant_name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="token_no">Today Token No:</label>
                <input type="text" name="token_no" id="token_no" class="form-control">
            </div>

            <div class="form-group col-md-2">
                <label for="igp_time">IGP Time:</label>
                <input type="text" value="<?php echo date("h:i", strtotime("+5 hours")); ?>" name="igp_time" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="igp_date">IGP Date:</label>
                <input type="text" value="<?php echo date('d-m-Y') ; ?>" name="igp_date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="dist_code">Customer Name:</label>
                <select class="form-control" name="distributor_id">
                    <option value="0">Select Customer Name</option>
                    @foreach($distributors as $distributor)
                        <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="vehicle_no">Vehicle No:</label>
                <input type="text" name="vehicle_no" class="form-control">
            </div>

            <div class="form-group col-md-3">
                <label for="driver_name">Driver Name:</label>
                <input type="text" name="driver_name" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="driver_cell">Driver Cell:</label>
                <input type="text" name="driver_cell" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="remarks">Remarks:</label>
                <input type="text" name="remark" class="form-control">
            </div>

            <div class="panel-body" id="hidepanel">
                <table class="table table-striped table-bordered table-hover" 
                            id="dataTables-example">
                    <thead style="background-color: #438EB9;color: white;">
                        <tr>
                            <th id="hover-effect">Cylinders Qty</th>
                            <th id="hover-effect">Cylinders Capacity</th>
                            <th id="hover-effect">Remarks</th>
                            <th style="text-align: center;background:#eee; ">
                                <a href="#" class="salead">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <tr>
                            <td id="hover-effect">
                                <input type="number" id="qty" name="cyl_qty[]" class="form-control">
                            </td>
                            <td>
                                <input type="text" id="capacity" name="cyl_capacity[]" class="form-control">
                            </td>
                            <td>
                                <input type="text" id="remarks" name="remarks[]" class="form-control">
                            </td>
                            <td>
                                <a href="#" class="remove"><span style="color: #E47280;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>       
                        </tr>
                    </tbody>
                </table>        
            </div>
            <div class="form-group col-md-1">
                <div class="text-center">
                    <button class="btn btn-success type="submit" style="margin-top: 5%;">Save</button>   
                </div>
            </div>  
		</form>
	</div>
@endsection