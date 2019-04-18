@extends('layouts.app')

@section('content')
<div><h5>Shipping Companies</h5></div>

<form method="post">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label for="name"><sup>*</sup>Company_name</label>
            <input id="name" class="form-control" type="text" name="company_name">
        </div>
    </div>
    <button class="btn btn-success">Add</button>
</form>

@endsection