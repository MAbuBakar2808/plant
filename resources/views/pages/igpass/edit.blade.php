@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Inward Gate Pass-Bowser</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

	<div class="panel-body">
		<form action="{{ route('inward-gate.update',['id'=>$igpass->id]) }}" method="post">

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
                    <option value="{{ $igpass->igp_type }}" selected>{{ $igpass->igp_type }}</option>
                    <option value="SELF">SELF</option>
                    <option value="SELF">HSP</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="party_name">Party Name:</label>
                <select class="form-control" name="supplier_id">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @if($supplier->id == $igpass->supplier->id) selected @endif>{{ $supplier->supplier_name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="plant_name">Plant Name:</label>
                <select class="form-control" name="plant_name">
                    <option value="{{ $igpass->plant_name }}">{{ $igpass->plant_name }}</option>
                    @foreach($plants as $plant)
                        <option value="{{ $plant->name }}">{{ $plant->name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="bowser_no">Bowser No:</label>
                <input type="text" value="{{ $igpass->bowser_no }}" name="bowser_no" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="driver_name">Driver Name:</label>
                <input type="text" value="{{ $igpass->driver_name }}" name="driver_name" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="driver_cell">Driver Cell:</label>
                <input type="text" value="{{ $igpass->driver_cell }}" name="driver_cell" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="load_weight">Load Weight(MT):</label>
                <input type="text" value="{{ $igpass->load_weight }}" name="load_weight" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="offload_weight">Offload Weight(MT):</label>
                <input type="text" value="{{ $igpass->offload_weight }}" name="offload_weight" class="form-control">
            </div>
            <div class="form-group col-md-5">
                <label for="remarks">Remarks:</label>
                <input type="text" value="{{ $igpass->remarks }}" name="remarks" class="form-control">
            </div>

            <div class="form-group col-md-2 col-md-offset-4">
		        <div class="text-center">
		            <button class="btn btn-success type="submit">Save</button>                   
		        </div>
    		</div>
		</form>
	</div>
@endsection