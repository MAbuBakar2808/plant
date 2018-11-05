@extends('main')

@section('content')
<div id="page-wrapper" style="overflow-x: hidden;min-height: 450px;">
    <div class="row">
        <div class="col-lg-2" style="margin-top: 3%;">
            <a href="{{ route('transporters') }}">
                <button class="btn btn-success">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    All Records
                </button>
            </a>
        </div>
        <div class="col-lg-5" style="text-align: center;margin-left: 70px;">
            <h3 class="page-header">Manage Transporter</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

	<div class="panel-body" style="padding: 0 0 0 30px;" 
        {{-- style="background-color: #F5F5F5;height: 174px;
	    " --}}
        >
		<form action="{{ route('transporter.store') }}" method="post">

			{{ csrf_field() }}
            <div class="form-group col-md-4">
                <label for="contract_code">Trp Name:</label>
                <input type="text" name="trp_name" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="contract_code">Address:</label>
                <input type="text" name="trp_address" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="contract_code">NTN:</label>
                <input type="number" name="trp_ntn" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="contract_code">STax Reg#:</label>
                <input type="number" name="trp_tax_regno" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="contract_code">Telephone:</label>
                <input type="text" name="trp_telephone" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="contract_code">Fax:</label>
                <input type="text" name="trp_fax" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="contract_code">Email:</label>
                <input type="email" name="trp_email" class="form-control">
            </div>    
            
        	<div class="panel-body">
        		<table class="table table-striped table-bordered table-hover" 
                            id="dataTables-example" {{-- style="display: none;" --}}>
                    <thead style="background-color: #438EB9;color: white;">
                    	<tr>
                    		<th id="hover-effect">Vehicle No.</th>
                    		<th id="hover-effect">Driver Name</th>
                    		<th id="hover-effect">CNIC</th>
                    		<th id="hover-effect">Cell #</th>
                    		<th id="hover-effect">BS Capacity</th>
                    		<th style="text-align: center;background:#eee; ">
                                <a href="#" class="addRow">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </a>
                            </th>
                    	</tr>
                    </thead>
                    <tbody id="myTable">
                    	<tr>
                    		<td id="hover-effect">
                    			<input type="number" id="vehicle_no" name="trp_vehicle_no[]" class="form-control vno" required>
                    		</td>
                    		<td id="hover-effect">
                    			<input type="text" id="driver_name" name="trp_driver_name[]" class="form-control dr"
                    			required>
                    		</td>
                    		<td id="hover-effect">
                    			<input type="text" id="cnic" name="trp_cnic[]" class="form-control cnic"required>
                    		</td>
                    		<td id="hover-effect">
                    			<input type="tel" id="cell" name="trp_cell[]" class="form-control cell" required>
                    		</td>
                    		<td id="hover-effect">
                    			<input type="text" id="bs_capacity" name="trp_bs_capacity[]" class="form-control bs">
                    		</td>
                    		<td>
                    			<a href="#" class="remove"><span style="color: #E47280;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    		</td>		
                    	</tr>
                    </tbody>
                </table>		
        	</div>
            <div class="form-group col-md-1">
                <div class="text-center">
                    <button class="btn btn-success type="submit" style="margin-top: 5%;">Save</button>   
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
