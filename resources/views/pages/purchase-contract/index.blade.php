@extends('main')

@section('content')
@include('layout._errors1')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage Purchase Sale</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <a href="purchase-contract/create">
                    <button class="btn btn-success">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add New
                    </button>
                </a>
                
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Results for "Purchase Contract"</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" style="overflow-x: scroll;
                    overflow-y: scroll;
                    height: 400px;
                    white-space:nowrap">
                    <input id="myInput" type="text" placeholder="Search.." style="float: right;margin-bottom: 10px;">
                    <table class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center; width:7%;">Contract Code</th>
                                <th style="text-align: center; width:7%;">Contract Date</th>
                                <th style="text-align: center; width:7%;">Cnt Ngt Person</th>
                                <th style="text-align: center; width:7%;">Party Name</th>
                                <th style="text-align: center;">Qty</th>
                                <th style="text-align: center; width:6%;">Del Terms</th>
                                <th style="text-align: center; width:5%;">Rate Type</th>
                                <th style="text-align: center;">Rate</th>
                                <th style="text-align: center;">Amount</th>
                                <th style="text-align: center; width:4%;">Adv %</th>
                                <th style="text-align: center;">Advance</th>
                                <th style="text-align: center; width:5%;">No Of Bs</th>
                                <th style="text-align: center; width:9%;">Del Period From</th>
                                <th style="text-align: center; width:8%;">Del Period To</th>
                                <th style="text-align: center; width:8%;">Expiry Date</th>
                                <th style="text-align: center; width:8%;">Contract Status</th>
                                <th style="text-align: center; width:8%;">Contact Person</th>
                                <th style="text-align: center;">Remarks</th>
                                <th style="text-align: center; width:7%;">S.Tax Invoice</th>
                                <th style="text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        @foreach($purchase_contract as $contract)
                            <tbody id="myTable">
                                <tr>
                                    <td style="text-align: center;">
                                        {{ $contract->contract_code }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ date('d-m-Y', strtotime($contract->contract_date)) }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $contract->cnt_cgt_person }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $contract->party_name }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ number_format($contract->qty) }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $contract->delivery_terms }}
                                    </td>
                                    <td style="width: 17px!important;">
                                        {{ $contract->rate_type }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $contract->rate }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ number_format($contract->amount) }}
                                    </td>
                                    <td style="text-align: center;">{{ $contract->adv }}</td>
                                    <td style="text-align: center;">
                                        {{ $contract->advance }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $contract->no_of_bos }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ date('d-m-Y', strtotime($contract->delivery_period_from)) }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ date('d-m-Y', strtotime($contract->delivery_period_to)) }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ date('d-m-Y', strtotime($contract->expiry_date)) }}
                                    </td>

                                    <td style="text-align: center;">{{ $contract->contract_status }}
                                    </td>
                                    <td style="text-align: center;">{{ $contract->contact_person }}
                                    </td>
                                    <td style="text-align: center;">{{ $contract->remarks }}
                                    </td>
                                    <td style="text-align: center;">{{ $contract->stax_invoice 
                                        }}
                                    </td>
                                    <td style="text-align: center;">
                                        <a class="green" href="{{ route('purchase-contract.edit',
                                        	['id'=>$contract->id]) }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a id="trash" onclick="return confirm('Are you sure to delete this?')" href="{{ route('purchase-contract.delete',
                                        	['id'=>$contract->id]) }}">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                            
                        @endforeach    
                    </table>
                    {{-- {{!! $area->links(); !!}} --}}
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>
@endsection