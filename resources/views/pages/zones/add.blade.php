@extends('main')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-2" style="margin-top: 3%;">
            <a href="{{ route('zones') }}">
                <button class="btn btn-success">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    All Records
                </button>
            </a>
        </div>
        <div class="col-lg-5" style="text-align: center;">
            <h3 class="page-header">Manage Areas</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ route('zones.store') }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="Zone name">Zone Name</label>
                <input type="text" name="zone_name" class="form-control" autofocus required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="zone short name">Zone Short Name</label>
                <input type="text" name="zone_short_name" class="form-control">
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