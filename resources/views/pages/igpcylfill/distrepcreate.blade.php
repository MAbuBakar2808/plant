@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        {{-- <div class="col-lg-2" style="margin-top: 3%;margin-left: 32px;">
            <a href="">
                <button class="btn btn-success">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    All Records
                </button>
            </a>
        </div> --}}
        <div class="col-lg-5 col-md-offset-3">
            <h4 class="page-header">Manage IGP Cylinder-Filling(Customer-Wise)</h4>
        </div>
    </div>

	<div class="panel-body">
        <form action="{{ route('igp-cylfill.sendreport') }}" method="post">
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
                <label for="dist_code">Customer Name:</label>
                <select class="form-control" name="distributor_id">
                    <option value="0">Select Customer Name</option>
                    @foreach($distributors as $distributor)
                        <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
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