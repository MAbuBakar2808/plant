@extends('main')

@section('content')

<div id="page-wrapper">
        <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Purchase Contract</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel-body">
        <form action="{{ route('purchase-contract.update',['id'=>$contract->id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-3">
                <label for="contract_code">Contract Code:</label>
                <input type="text" name="contract_code" value="{{ $contract->contract_code }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label for="contract_date">Contract Date:</label>
                <input type="date" name="contract_date" value="{{ $contract->contract_date }}" class="form-control" required>
            </div>
            <div class="form-group col-md-5">
                <label for="cnt_cgt_person">Cnt Ngt Person:</label>
                <input type="text" name="cnt_cgt_person" value="{{ $contract->cnt_cgt_person }}" class="form-control" required>
            </div>
            <div class="form-group col-md-3">
                <label for="party_name">Party Name:</label>
                <input type="text" name="party_name" value="{{ $contract->party_name }}" class="form-control" required>
            </div>
            <div class="form-group col-md-3">
                <label for="qty">Qty:</label>
                <input type="number" name="qty" value="{{ $contract->qty }}" class="form-control" required>
            </div>
            <div class="form-group col-md-3" >
                <label for="delivery_terms">Delivery Terms:</label>
                <select  class="form-control" name="delivery_terms">
                        <option value="{{ $contract->delivery_terms }}">
                            {{ $contract->delivery_terms }}
                        </option>
                        <option value="EX_SITE">EX_SITE</option>
                        <option value="CR_SITE">CR_SITE</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="rate_type">Rate Type:</label>
                <select  class="form-control" name="rate_type">
                        <option value="{{ $contract->rate_type }}">
                            {{ $contract->rate_type }}
                        </option>
                        <option value="MT">MT</option>
                        <option value="NT">NT</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="rate">Rate:</label>
                <input type="number" name="rate" value="{{ $contract->rate }}" class="form-control" required>
            </div>
            <div class="form-group col-md-3">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" value="{{ $contract->amount }}" class="form-control" required>
            </div>
            <div class="form-group col-md-2">
                <label for="adv">Adv %:</label>
                <input type="number" name="adv" value="{{ $contract->adv }}" class="form-control" required>
            </div>
            <div class="form-group col-md-3">
                <label for="advance">Advance:</label>
                <input type="number" name="advance" value="{{ $contract->advance }}" class="form-control" required>
            </div>
            <div class="form-group col-md-2">
                <label for="no_of_bos">No Of Bs:</label>
                <input type="number" name="no_of_bos" value="{{ $contract->no_of_bos }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label for="delivery_period_from">Delivery Period From:</label>
                <input type="date" name="delivery_period_from" value="{{ $contract->delivery_period_from }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label for="delivery_period_to">Delivery Period To:</label>
                <input type="date" name="delivery_period_to" value="{{ $contract->delivery_period_to }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label for="expiry1_date">Expiry Date:</label>
                <input type="date" name="expiry_date" value="{{ $contract->expiry_date }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label for="contract_status">Contract Status:</label>
                <select  class="form-control" name="contract_status">
                        <option value="{{ $contract->contract_status }}">
                            {{ $contract->contract_status }}
                        </option>
                        <option value="OPEN">OPEN</option>
                        <option value="CLOSE">CLOSE</option>
                </select>
            </div>
            <div class="form-group col-md-6 col-md-offset-2">
                <label for="contact_person">Contact Person:</label>
                <input type="text" name="contact_person" value="{{ $contract->contact_person }}" class="form-control" required>
            </div>
            <div class="form-group col-md-7">
                <label for="remarks">Remarks:</label>
                <input type="text" name="remarks" value="{{ $contract->remarks }}" class="form-control" required>
            </div>
            <div class="form-group col-md-3 col-md-offset-2">
                <label for="stax_invoice">S.Tax Invoice:</label>
                <select  class="form-control" name="stax_invoice">
                        <option value="{{ $contract->stax_invoice }}">
                            {{ $contract->stax_invoice }}
                        </option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                </select>
            </div>

            <div class="form-group col-md-7 col-md-offset-2">
                <div class="text-center">
                    <button class="btn btn-success btn-lg" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>


</div>
@endsection