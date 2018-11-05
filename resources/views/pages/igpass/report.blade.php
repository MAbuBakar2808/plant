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
        <form action="{{ route('inward-gate.sendreport') }}" method="post">
            {{ csrf_field() }}
    		<div class="form-group col-md-3">
                <label for="igp_date">From Date:</label>
                <input type="date" id="datepicker" name="from_date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="igp_date">To Date:</label>
                <input type="date" id="datepicker" name="to_date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="party_name">Party Name:</label>
                <select class="form-control" name="party_name">
                    <option value="0">Select Party Name</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-1">
                <label for="igp_date"></label>
                <div class="text-center">
                    <button class="btn btn-success type="submit">Submit</button> 
                </div>
            </div>
        </form>
	</div>
</div>
@endsection