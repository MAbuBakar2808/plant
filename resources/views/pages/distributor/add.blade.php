@extends('main')

@section('content')
<div id="page-wrapper">
    {{-- <div class="row"> 
        <div class="col-lg-10">
            <h3 class="page-header">Manage Distributors</h3>
        </div>
    </div> --}}
    <div class="row">
        
        <div class="col-lg-2" style="margin-top: 3%;">
            <a href="{{ route('distributors') }}">
                <button class="btn btn-success">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    All Records
                </button>
            </a>
        </div>
        <div class="col-lg-5" style="text-align: center;">
            <h3 class="page-header">Manage Distributors</h3>
        </div>
        <!-- /.col-lg-12 -->
        
    </div>
    <div class="panel-body">
        <form action="{{ route('distributor.store') }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="name">Party Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="address">Party Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="City">City Name</label>
                <select class="span2 form-control" name="city" id="country"></select>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection