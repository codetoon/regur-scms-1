@extends('layouts.app')

@section('content')
<div><h5>Attribute Sets</h5></div>

<div class="form-group row">
    <div class="col-md-3">
        <label for="attribute_set">Attribute Set Name</label>
        <input id="attribute_set" class="form-control" type="text" name="attribute_set_name">
    </div>
    <div class="col-md-3">
        <label for="type">Type</label>
        <select class="form-control" name="type" id="type">
            <option value="product">Product</option>
        </select>
    </div>
    <div style="padding-top: 28px;"><button type="submit" class="btn btn-success">Add</button></div>
</div>
 

<table class="table">
    <thead class="thead-light">
        <th scope="col">Attribute Set Name</th>
        <th scope="col">Type</th>
        <th scope="col">Number of Records</th>
        <th scope="col">Action</th>
    </thead>
</table>
@endsection
