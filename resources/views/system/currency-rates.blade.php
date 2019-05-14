@extends('layouts.app')

@section('content')

<form method="post" action="" @submit.prevent= "onSubmit">
        @csrf
        <div class="row form-group">
            <div class="col-md-2">
                <label class="curr_label" for="base_curr"><sup>*</sup>Base Currency</label></div>
             <div class="col-md-3">
                    <select class="form-control"  id="base_curr"  autofocus>
                             <option disabled value="">Select Base Currency</option>
                            <option value= ""></option>
                    </select>
                </div>
            </div>
    
    <div class="row form-group">
            <div class="col-md-2">
                <label class="curr_label" for="curr_sel">Currency Selection</label></div>
             <div class="col-md-3">
                    <select class="form-control"  id="curr_sel"  autofocus>
                             <option disabled value="">Currency Selection</option>
                            <option value= ""></option>
                    </select>
                </div>
            </div>
    
    <div class="row form-group">
            <div class="col-md-2">
                <label class="curr_label" for="buy_rate"><sup>*</sup>Buy Rate</label></div>
             <div class="col-md-3">
                    <input id="buy_rate" class="form-control" type="text" autofocus>
                </div>
            </div>
    
    <div class="row form-group">
            <div class="col-md-2">
                <label class="curr_label" for="sell_rate"><sup>*</sup>Sell Rate</label></div>
             <div class="col-md-3">
                    <input id="sell_rate" class="form-control" type="text" autofocus>
                </div>
            </div>
</form>

<table class="table">
    <thead class="thead-light">
        <th>Base Currency</th>
        <th>Foreign Currency</th>
        <th>Default Rate</th>
        <th>Sell Rate</th>
    </thead>

</table>

@endsection