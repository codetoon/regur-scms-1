@extends('layouts.app')

@section('content')
<div><h5>Shipping Companies</h5></div>

<form method="post" id="shipping_comp_form">
    @csrf
    <label for="company_name"><sup>*</sup>Company Name</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="company_name" class="form-control" name="company_name" value="{{ old('company_name')}}" required autofocus >
                </div>
                <button type="submit" class="btn btn-success">Add</button>
        </div>
    
</form>
<table class="table" id="shipping_comp_table">
    <thead class="thead-light">
        <th>Company Name</th>
        <th>Obsolete</th>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    $(document).ready(function(){
        shipping_comp_table= $('#shipping_comp_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/system/shipping-companies/list",
            columnDefs: [
                {targets: 0,
                 data: 'company_name'},
                {targets: 1, checkboxes: {'selectRow': true}}
                
            ]
        })
    })
</script>

@endpush