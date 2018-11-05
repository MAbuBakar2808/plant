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
        <div class="col-lg-5 col-md-offset-4">
            <h4 class="page-header">Manage Retail Sale Register</h4>
        </div>
    </div>

	<div class="panel-body">
        <form action="{{ route('retail-sale.senddate') }}" method="post">
            {{ csrf_field() }}
    		<div class="form-group col-md-3 col-md-offset-2">
                <label for="from_date">From Date:</label>
                <input type="date" name="from_date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="to_date">To Date:</label>
                <input type="date" name="to_date" class="form-control">
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