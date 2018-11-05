@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-2" style="margin-top: 3%;margin-left: 32px;">
            <a href="{{ route('inward-gate') }}">
                <button class="btn btn-success">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    All Records
                </button>
            </a>
        </div>
        <div class="col-lg-5" style="text-align: center;margin-left: 70px;">
            <h3 class="page-header">Manage Inward Gate Pass-Bowser</h3>
        </div>
    </div>

	<div class="panel-body">
		<form action="{{ route('inward-gate.store') }}" method="post">

			{{ csrf_field() }}
            <div class="form-group col-md-4">
                <label for="igp_date">IGP Date:</label>
                <input type="text" id="datepicker" name="igp_date" class="form-control" value="<?php echo date('d-m-Y') ; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="igp_date">IGP Time:</label>
                <input type="text" value="<?php echo date("h:i", strtotime("+5 hours")); ?>" name="igp_time" class="form-control" required>
            </div>
            <div class="form-group col-md-3" >
                <label for="invart_type">Inward Type:</label>
                <select class="form-control" name="igp_type">
                    <option value="0">Select Type</option>
                    <option value="SELF">SELF</option>
                    <option value="SELF">HSP</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="party_name">Party Name:</label>
                <select class="form-control" name="supplier_id">
                    <option value="0">Select Party Name</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="plant_name">Plant Name:</label>
                <select class="form-control" name="plant_name">
                    <option value="0">Select Plant Name</option>
                    @foreach($plants as $plant)
                        <option value="{{ $plant->plant_name }}">{{ $plant->plant_name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="bowser_no">Bowser No:</label>
                <input type="text" name="bowser_no" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="driver_name">Driver Name:</label>
                <input type="text" name="driver_name" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="driver_cell">Driver Cell:</label>
                <input type="text" name="driver_cell" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="load_weight">Load Weight(MT):</label>
                <input type="text" name="load_weight" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="offload_weight">Offload Weight(MT):</label>
                <input type="text" name="offload_weight" class="form-control">
            </div>
            <div class="form-group col-md-5">
                <label for="remarks">Remarks:</label>
                <input type="text" name="remarks" class="form-control">
            </div>

            <div class="form-group col-md-3 col-md-offset-4">
		        <div class="text-center">
		            <button class="btn btn-success type="submit">Save</button>
                    
		        </div>
    		</div>
		</form>
	</div>
@endsection