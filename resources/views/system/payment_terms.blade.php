@extends('layouts.app')

@section('content')
<div><h5>Payment terms</h5></div>

<form method="post" action="">
    @csrf
    <div class="form-group row">
        <div class="col-md-3">
            <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name">
        </div>

        <div class="col-md-3">
            <label for="days">Days</label>
            <input id="days" class="form-control" type="text" name="days">
        </div>

        <div class="col-md-3">
            <label for="payment_type">Type</label>
            <select class="form-control" name="payment_type" id="payment_type">
                <option value="1">1</option>
            </select>
        </div>
        <div style="padding-top: 28px;"><button type="submit" class="btn btn-success">Add</button></div>
    </div>
</form>

<table class="table">
    <thead class="thead-light">
        <th scope="col">Name</th>
        <th scope="col">Days</th>
        <th scope="col">Type</th>
        <th scope="col">Delete</th>
    </thead>
    
    
</table>


@endsection