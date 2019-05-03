@extends('layouts.app')

@section('content')


<div id="attributes_app">
@verbatim
    <div class="alert alert-danger errors" v-if="errors.length">
        <ul>
           <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>
@endverbatim
    <form method="post" action="" @submit.prevent="onSubmit">
        @csrf
        <div class="form-group row">
            <div class="col-md-3">
                <label for="attribute_name">Attribute Name</label>
                <input id="attribute_name" class="form-control" type="text" v-model="attribute_name">
            </div>
            <div class="col-md-3">
                <label for="default_value">Default Value</label>
                <input id="default_value" class="form-control" type="text" v-model="default_value">
            </div>
            <div class="col-md-1">
                <div class="row">
                        <label for="purchase_tax">Purchase Tax</label>
                    </div>
                         <input type="checkbox" id="purchase_tax" class="tax_checkbox" >
            </div>
            <div><button type="submit" class="btn btn-success" id="tax_add">Add</button></div>
            
        </div>
    </form>
</div>
@endsection
