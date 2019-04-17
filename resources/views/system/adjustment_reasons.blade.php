@extends('layouts.app')

@section('content')

<div><h2>Adjustment Reasons</h2></div>


<div>
    <form method="post" action="">
        @csrf
        <label for="adjustment_reason"><sup>*</sup>Adjustment Reason:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="adjustment_reason" class="form-control" name="adjustment_reason" value="{{ old('adjustment_reason')}}" required autofocus >
                </div>
                <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
</div>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Adjustment Reason</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($adjustment as $adjustment_reason)
        <tr>
            <td>{{ $adjustment_reason->adjustment_reason}}</td>
            <td>
                <form action="/system/adjustmentReasons/{{$adjustment[0]->id}}" method="post">
                @csrf
                @method('DELETE')
                    <a href="/system/adjustmentReasons/{{$adjustment[0]->id}}"><button><span data-feather="delete"></span></button></a>
                </form>    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection