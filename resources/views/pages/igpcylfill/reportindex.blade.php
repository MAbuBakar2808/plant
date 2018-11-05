@extends('main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('igp-cylfill') }}" style="position: absolute;margin-top: 16px;">
                <button class="btn btn-success">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    All Records
                </button>  
            </a>
            <h3 style="text-align: center;">Alliance Energy (Pvt.) Ltd.</h3>
            <h5 style="text-align: center;">Cylinder Filling Form </h5>
        </div>
        <hr>
        <!-- /.col-lg-12 -->
    </div>
    <hr>
	<div class="panel-body">

        <div class="form-group col-md-3 col-md-offset-1">
            <label for="plant_code">Plant Name:</label>
            <input value="{{ $reports[0]->plant_name }}" class="form-control" disabled>
            {{-- <td>{{ $reports[0]->plant_name }}</td> --}}
        </div>
        <div class="form-group col-md-2">
            <label for="token_no">Token No:</label>
            <input type="" name="" value="{{ $reports[0]->token_no }}" class="form-control" disabled>
            {{-- <td>{{ $reports[0]->igp_date }}</td> --}}
        </div>

        <div class="form-group col-md-2">
            <label for="igp_time">IGP Time:</label>
            <input type="" name="" value="{{ date("h:i", strtotime($reports[0]->igp_time)) }}" class="form-control" disabled>
            {{-- <td>{{ date("h:i", strtotime($reports[0]->igp_time)) }}</td> --}}
        </div>
        <div class="form-group col-md-3">
            <label for="igp_date">IGP Date:</label>
            <input type="" name="" value="{{ date('d-m-Y',strtotime($reports[0]->igp_date)) }}" class="form-control" disabled>
            {{-- <td>{{ date('d-m-Y',strtotime($reports[0]->igp_date)) }}</td> --}}
        </div>
        <div class="form-group col-md-3 col-md-offset-1">
            <label for="dist_code">Customer Name:</label>
            <input type="" name="" value="{{ $reports[0]->name }}" class="form-control" disabled>
                {{-- <td>{{ $reports[0]->name }}</td> --}}  
        </div>
        <div class="form-group col-md-2">
            <label for="vehicle_no">Vehicle No:</label>
            <input type="" name="" value="{{ $reports[0]->vehicle_no }}" class="form-control" disabled>
            {{-- <td>{{ $reports[0]->vehicle_no }}</td> --}} 
        </div>

        <div class="form-group col-md-3">
            <label for="driver_name">Driver Name:</label>
            <input type="" name="" value="{{ $reports[0]->driver_name }}" class="form-control" disabled>
            {{-- <td>{{ $reports[0]->driver_name }}</td> --}}
        </div>
        <div class="form-group col-md-2">
            <label for="driver_cell">Driver Cell:</label>
            <input type="" name="" value="{{ $reports[0]->driver_cell }}" class="form-control" disabled>
            {{-- <td>{{ $reports[0]->driver_cell }}</td> --}}
        </div>
        <div class="form-group col-md-6 col-md-offset-1">
            <label for="remarks">Remarks:</label>
            <input type="" name="" value="{{ $reports[0]->remark }}" class="form-control" disabled>
            {{-- <td>{{ $reports[0]->remark }}</td> --}}
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover" 
                    id="dataTables-example" style="width: 83%;margin-left: 94px;border-bottom: none;">
            <thead style="background-color: #438EB9;color: white;">
                <tr>
                    <th id="hover-effect" style="text-align: center;">Cylinders Qty</th>
                    <th id="hover-effect" style="text-align: center;">Cylinders Capacity</th>
                    <th id="hover-effect" style="text-align: center;">Remarks</th>
                </tr>
            </thead>
            <?php $cyl_qty = 0; ?>
            @foreach($reports as $report)
            <tbody id="myTable">
                <tr>
                    <td id="hover-effect" style="text-align: center;">
                        {{ $report->cyl_qty }}
                    </td>
                    <td id="hover-effect" style="text-align: center;">
                       {{ $report->cyl_capacity }}
                    </td>
                    <td id="hover-effect" style="text-align: center;">
                        {{ $report->remarks }}
                    </td>
                    <?php $cyl_qty += $report->cyl_qty; ?>          
                </tr>
            </tbody>
            @endforeach
            <tbody style="border:none">
                <tr>
                    <td style="border: none; background-color: #fff;text-align: center;">
                        <b>{{ $cyl_qty }}</b>
                    </td>
                    <td style="border: none; background-color: #fff">
                        Total
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- <span><b>Total:{{ $cyl_qty }}</b></span>         --}}
    </div>
</div>	
@endsection