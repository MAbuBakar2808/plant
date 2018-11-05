@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage Areas</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel-body">
        <form action="{{ route('areas.update',['id'=>$area->id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="Area name">Area Name</label>
                <input type="text" name="area_name" value="{{ $area->area_name }}" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="area short name">Area Short Name</label>
                <input type="text" name="area_short_name" value="{{ $area->area_short_name }}" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="zone id">Zone Name</label>
                <select  class="form-control" name="zone_id">
                    @foreach($zones as $zone)
                    <option value="{{ $zone->id }}" @if($zone->id == $area->zone_id) selected @endif>{{ $zone->zone_name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection