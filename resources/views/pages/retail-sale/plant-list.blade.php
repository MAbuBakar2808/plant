<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="border-bottom: none;">
    <thead>
        <tr>
            <th>IGP No</th>
            <th>IGP Date</th>
            <th>Customer Name</th>
            <th>Plant Name</th>
            <th>Vehicle No</th>
            <th>Cyl Qty</th>
            <th>Cyl Capacity</th>
            <th>Actions</th>
        </tr>
    </thead>
    @foreach($retailsale as $sale)
        <tbody id="myTable">
            <tr class="odd gradeX">
                <td>{{ ($sale->id) }}</td>
                <td>{{ date("d-m-Y",strtotime($sale->igp_date)) }}</td>
                <td>{{ $sale->name }}</td>
                <td>{{ $sale->plant_name }}</td>
                <td>{{ $sale->vehicle_no }}</td>
                <td>{{ $sale->cyl_qty }}</td>
                <td>{{ $sale->cyl_capacity }}</td>

                <td>
                    <a class="green" href="{{ route('retail-sale.getplantdata',['id'=>$sale->id]) }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </td> 
            </tr>   
        </tbody>
    @endforeach    
</table>

