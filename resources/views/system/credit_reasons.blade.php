@extends('layouts.app')

@section('content')
<div><h5>Credit Reasons</h5></div>

<div>
    <form method="post" action="">
        @csrf
        <label for="credit_reason"><sup>*</sup>Credit Reason:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="" class="form-control" name="credit_reason" value="{{ old('credit_reason')}}" required autofocus >
                </div>
                <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
</div>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Credit Reason</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($creditReason as $credit_reason)
        <tr>
            <td>{{ $credit_reason->credit_reason}}</td>
            <td>
                <form action="/system/creditReasons/{{$creditReason[0]->id}}" method="post">
                @csrf
                @method('DELETE')
                    <a href="/system/creditReasons/{{$creditReason[0]->id}}"><button><span data-feather="delete"></span></button></a>
                </form>    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection