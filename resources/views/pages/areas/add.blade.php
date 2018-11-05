@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-2" style="margin-top: 3%;">
            <a href="{{ route('areas') }}">
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
        <form action="{{ route('areas.store') }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="Area name">Area Name</label>
                <input type="text" name="area_name" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="area short name">Area Short Name</label>
                <input type="text" name="area_short_name" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="zone id">Zone Name</label>
                <select class="form-control" name="zone_id">
                    @foreach($zones as $zone)
                    <option value="{{ $zone->id }}">{{ $zone->zone_name }}</option>
                    @endforeach 
                </select>
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