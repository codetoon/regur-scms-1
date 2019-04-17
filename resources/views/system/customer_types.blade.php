@extends('layouts.app')

@section('content')

<div><h2>Customer Types</h2></div>


<div>
    <form method="post" action="">
        @csrf
        <label for="customer_type"><sup>*</sup>Customer Type:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="customer_type" class="form-control" name="customer_type" value="{{ old('customer_type')}}" required autofocus >
                </div>
                <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
</div>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Type Name</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customerType as $customer_type)
        <tr>
            <td>{{ $customer_type->customer_type}}</td>
            <td>
                <form action="/system/customerTypes/{{$customerType[0]->id}}" method="post">
                @csrf
                @method('DELETE')
                    <a href="/system/customerTypes/{{$customerType[0]->id}}"><button><span data-feather="delete"></span></button></a>
                </form>    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection