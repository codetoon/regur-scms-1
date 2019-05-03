@extends('layouts.app')

@section('content')
<div><h5>Product Groups</h5></div>

<form method="post" action="">
    @csrf
    <div class="form-group row">
        <div class="col-md-3">
            <label for="product_group_name"><sup>*</sup>Product Group Name</label>
            <input id="product_group_name" class="form-control" type="text" name="product_group_name">
        </div>
        
        <div class="col-md-3">
            <label for="default_attribute">Default Attribute Set</label>
            <select class="form-control" name="default_attribute_set" id="default_attribute">
                <option value="1"></option>
            </select>
        </div>
        <div class="add-btn"><button type="submit" class="btn btn-success" id="product_group_add">Add</button></div>
    </div>
</form>

<table class="table">
    <thead class="thead-light">
        <th scope="col">Group Name</th>
        <th scope="col">Default Attribute Set</th>
        <th scopt="col">Delete</th>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    

</script>

@endpush