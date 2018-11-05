@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-2" style="margin-top: 3%;">
            <a href="{{ route('cities') }}">
                <button class="btn btn-success">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    All Records
                </button>
            </a>
        </div>
        <div class="col-lg-5" style="text-align: center;">
            <h3 class="page-header">Manage Cities</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel-body">
        <form action="{{ route('cities.store') }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="City name">City Name</label>
                <select class="span2 form-control" name="city_name" id="country"></select>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="city short name">City Short Name</label>
                <input type="text" name="city_short_name" class="form-control" required>
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