@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12" style="text-align: center;">
            <h3 class="page-header">Update IGP Cylinder Filling</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

	<div class="panel-body">
		<form action="{{ route('igp-cylfill.update',['id'=>$igpcfcode->id]) }}" method="post">

			{{ csrf_field() }}
            <div class="form-group col-md-3">
                <label for="plant_code">Plant Name:</label>
                <select class="form-control" name="plant_id">
                    <option value="0">Select Plant Name</option>
                    @foreach($plants as $plant)
                        <option value="{{ $plant->id }}" @if($plant->id == $igpcfcode->plant_id) selected @endif>
                            {{ $plant->plant_name }}
                        </option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="token_no">Today Token No:</label>
                <input type="text" name="token_no" value="{{ $igpcfcode->token_no }}" class="form-control">
            </div>

            <div class="form-group col-md-2">
                <label for="igp_time">IGP Time:</label>
                <input type="text" value="{{ date("h:i", strtotime($igpcfcode->igp_time)) }}" name="igp_time" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="igp_date">IGP Date:</label>
                <input type="text" value="{{ date("d-m-Y", strtotime($igpcfcode->igp_date)) }}" name="igp_date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="dist_code">Customer Name:</label>
                <select class="form-control" name="distributor_id">
                    <option value="0">Select Customer Name</option>
                    @foreach($distributors as $distributor)
                        <option value="{{ $distributor->id }}" @if($distributor->id == $igpcfcode->distributor_id) selected @endif>
                            {{ $distributor->name }}
                        </option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="vehicle_no">Vehicle No:</label>
                <input type="text" name="vehicle_no" value="{{ $igpcfcode->vehicle_no }}" class="form-control">
            </div>

            <div class="form-group col-md-3">
                <label for="driver_name">Driver Name:</label>
                <input type="text" name="driver_name" value="{{ $igpcfcode->driver_name }}" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="driver_cell">Driver Cell:</label>
                <input type="text" name="driver_cell" value="{{ $igpcfcode->driver_cell }}" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="remarks">Remarks:</label>
                <input type="text" name="remark" value="{{ $igpcfcode->remark }}" class="form-control">
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
                        @foreach($details as $detail)
                        <tr>
                            <td id="hover-effect">
                                <input type="number" id="qty" value="{{ $detail->cyl_qty }}" name="cyl_qty[]" class="form-control">
                            </td>
                            <td>
                                <input type="text" id="capacity" value="{{ $detail->cyl_capacity }}" name="cyl_capacity[]" class="form-control">
                            </td>
                            <td>
                                <input type="text" id="remarks" value="{{ $detail->remarks }}" name="remarks[]" class="form-control">
                            </td>
                            <td>
                                <a href="#" class="remove"><span style="color: #E47280;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>       
                        </tr>
                        @endforeach
                    </tbody>
                </table>        
            </div>
            <div class="form-group col-md-1">
                <div class="text-center">
                    <button class="btn btn-success type="submit" style="margin-top: 5%;">Update</button>   
                </div>
            </div>  
		</form>
	</div>
@endsection