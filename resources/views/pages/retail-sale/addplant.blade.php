@extends('main')

@section('content')
{{-- {{ dd($details) }} --}}
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <a href="{{ route('retail-sale.create') }}" style="position: absolute;margin-top: 16px;">
                <i class="glyphicon glyphicon-arrow-left"></i> Back  
            </a>
            <h3 class="page-header" style="text-align: center;">Retail Sale</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ route('retail-sale.store') }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-2">
                <label for="rs_date">Retail Date:</label>
                <input type="text" name="rs_date" value="<?php echo date('d-m-Y') ; ?>" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="plant_id">Plant Name:</label>
                <select class="form-control" name="plant_id">
                    <option value="0">Select Plant Name</option>
                    @foreach($plants as $plant)
                        <option value="{{ $plant->id }}" @if($plant->id == $igpcfcode->plant_id) selected @endif>
                            {{ $plant->plant_name }}
                        </option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="igp_no">IGP NO:</label>
                <input type="text" name="igp_no" value="{{ $igpcfcode->id }}" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="igp_date">IGP Date:</label>
                <input type="text" name="igp_date" value="{{ date("d-m-Y", strtotime($igpcfcode->igp_date)) }}" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="distributor_id">Party Name:</label>
                <select class="form-control" name="distributor_id">
                    <option value="0">Select Customer Name</option>
                    @foreach($distributors as $distributor)
                        <option value="{{ $distributor->id }}" @if($distributor->id == $igpcfcode->distributor_id) selected @endif>
                            {{ $distributor->name }}
                        </option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="vehicle_no">Party Vehicle:</label>
                <input type="text" name="vehicle_no" value="{{ $igpcfcode->vehicle_no }}"  class="form-control">
            </div>

            <div class="form-group col-md-2" >
                <label for="stock">Stock:</label>
                <select class="form-control" name="stock">
                    <option value="0">Select Stock</option>
                    <option value="Tank_1">Tank 1</option>
                    <option value="Tank_2">Tank 2</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="Remarks">Remarks:</label>
                <input type="text" name="remarks" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="std_rate">Rate:</label>
                <input type="number" name="std_rate" class="form-control rate">
            </div>
        </div>   
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover retail-sale" 
                            id="dataTables-example">
                    <thead style="background-color: #438EB9;color: white;">
                        <tr>
                            <th id="hover-effect">Cyl Capacity</th>
                            <th id="hover-effect">Cyl Quantity</th>
                            <th id="hover-effect">Faulty</th>
                            <th id="hover-effect">filled</th>
                            <th id="hover-effect">Rate</th>
                            <th id="hover-effect">Amount</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($details as $detail)
                            <tr>
                                <td id="hover-effect">
                                    <input type="number" name="cylinder_capacity[]" value="{{ $detail->cyl_capacity }}" class="form-control capacity">
                                </td>
                                <td>
                                    <input type="text" name="in_cylinder_qty[]" value="{{ $detail->cyl_qty }}" class="form-control qty">
                                </td>
                                <td>
                                    <input type="text" name="faulty[]" class="form-control faulty">
                                </td>
                                <td>
                                    <input type="tel" name="filled_cylinders[]" class="form-control filled">
                                </td>
                                <td>
                                    <input type="text" name="approved_rate[]" class="form-control final-rate">
                                </td>
                                <td>
                                    <input type="text" name="amount[]" class="form-control amount">
                                </td>       
                            </tr>
                        @endforeach
                    </tbody>
                </table>        
            </div>

            <div class="form-group col-md-1">
                <div class="text-center">
                    <button class="btn btn-success" id="setval" type="submit">Save</button>
                </div>
            </div>
        </form>
</div>

@endsection
