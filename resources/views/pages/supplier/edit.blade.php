@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-5" style="text-align: center;">
            <h3 class="page-header">Manage Suppliers</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel-body">
        <form action="{{ route('supplier.update',['id'=>$supplier->id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="supplier_name">Supplier Name</label>
                <input type="text" name="supplier_name" value="{{ $supplier->supplier_name }}" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="supplier_address">Supplier Address</label>
                <input type="text" name="supplier_address" value="{{ $supplier->supplier_address }}" class="form-control" required>
            </div>

            <div class="form-group col-md-6 col-md-offset-2">
                <label for="City">City Name</label>
                <select class="span2 form-control" name="city_name" id="country" value="{{ $supplier->city }}"></select>
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