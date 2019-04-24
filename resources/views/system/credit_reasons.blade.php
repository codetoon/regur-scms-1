@extends('layouts.app')

@section('content')
<div><h5>Credit Reasons</h5></div>

<div>
    <form method="post" action="" id="credit_reasons_form">
        @csrf
        <label for="credit_reason"><sup>*</sup>Credit Reason:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="credit_reason" class="form-control" name="credit_reason" value="{{ old('credit_reason')}}" required autofocus >
                </div>
                <button type="submit" class="btn btn-success" id="add-btn">Add</button>
        </div>
    </form>
</div>

<table class="table" id="datatable">
    <thead class="thead-light">
        <tr>
            <th scope="col">Credit Reason</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@endsection