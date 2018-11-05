@extends('main')

@section('content')

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header" style="text-align: center;">Manage Retail Sale</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-2">
                <label for="rs_date">Retail Date:</label>
                <input type="text" name="rs_date" value="<?php echo date('d-m-Y') ; ?>" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="plant_id">Plant Name:</label>
                <select class="form-control" name="plant_id" id="plant_id" onchange="getPlantRecords()">
                    <option value="0">Select Plant Name</option>
                    @foreach($plants as $plant)
                        <option value="{{ $plant->id }}">{{ $plant->plant_name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="igp_no">IGP NO:</label>
                <input type="text" name="igp_no" id="igp_no" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="igp_date">IGP Date:</label>
                <input type="text" name="igp_date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="customer_id">Party Name:</label>
                <input type="text" name="customer_id" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="vehicle_no">Party Vehicle:</label>
                <input type="text" name="vehicle_no" class="form-control">
            </div>

            <div class="form-group col-md-2" >
                <label for="stock_code">Stock:</label>
                <select class="form-control" name="stock_code">
                    <option value="0">Select Stock</option>
                    <option value="Tank_1">Tank 1</option>
                    <option value="Tank_2">Tank 2</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="Remarks">Remarks:</label>
                <input type="text" name="remarks" class="form-control">
            </div>
            <div class="form-group col-md-2"{{--  onkeypress="show();" --}}>
                <label for="std_rate">Rate:</label>
                <input type="number" name="std_rate" class="form-control rate">
            </div>
            <div class="form-group col-md-1">
                <div class="text-center">
                    <button class="btn btn-success" id="setval" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
  <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width: 135%">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center;">(Plant-Wise)IGP Cylinder-Filling</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>All Records of "(Plant-Wise)Inward Gate Pass Cylinder-Filling"</b>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body" id="modal-data-div" style="overflow-y: scroll;height: 300px;white-space:nowrap"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
