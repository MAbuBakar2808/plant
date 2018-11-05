@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage Zones</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel-body">
        <form action="{{ route('zones.update',['id'=>$zone->id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="Zone name">Zone Name</label>
                <input type="text" value="{{ $zone->zone_name }}" name="zone_name" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="zone short name">Zone Short Name</label>
                <input type="text" value="{{ $zone->zone_short_name }}" name="zone_short_name" class="form-control" required>
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