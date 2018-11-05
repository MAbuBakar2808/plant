@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage Plants</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel-body">
        <form action="{{ route('plant.update',['id'=>$plant->id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="plant_name">Plant Name</label>
                <input type="text" name="plant_name" class="form-control" value="{{ $plant->name }}" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="address">Plant Address</label>
                <input type="text" name="address" class="form-control" value="{{ $plant->address }}" required>
            </div>

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="City">City Name</label>
                <select class="span2 form-control" name="city" id="country" value="{{ $plant->city }}" ></select>
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