@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-body"><h5>Sell Price Tiers</h5></div>
</div>
<form method="post" >
    @csrf
<div class="sell-tier-container">
    <div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-1">Tier 1 Name</label></div>
             <div class="col-md-8">
                <input id="tier-1" class="form-control" type="text" autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-2">Tier 2 Name</label></div>
             <div class="col-md-8">
                <input id="tier-2" class="form-control" type="text" autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-3">Tier 3 Name</label></div>
             <div class="col-md-8">
                <input id="tier-3" class="form-control" type="text" autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-4">Tier 4 Name</label></div>
             <div class="col-md-8">
                <input id="tier-4" class="form-control" type="text" autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-4">Tier 5 Name</label></div>
             <div class="col-md-8">
                <input id="tier-5" class="form-control" type="text" autofocus>
            </div>
        </div>
    </div>
    
    <div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-6">Tier 6 Name</label></div>
             <div class="col-md-8">
                <input id="tier-6" class="form-control" type="text" autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-7">Tier 7 Name</label></div>
             <div class="col-md-8">
                <input id="tier-7" class="form-control" type="text" autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-8">Tier 8 Name</label></div>
             <div class="col-md-8">
                <input id="tier-8" class="form-control" type="text" autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-9">Tier 9 Name</label></div>
             <div class="col-md-8">
                <input id="tier-9" class="form-control" type="text" autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="tier-10">Tier 10 Name</label></div>
             <div class="col-md-8">
                <input id="tier-10" class="form-control" type="text" autofocus>
            </div>
        </div>
    </div>
        <button type="submit" class="btn btn-success save-sell-tier">Save</button>
</div>
</form>
@endsection