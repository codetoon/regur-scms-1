@extends('layouts.app')

@section('content')

<div><h5>Taxes</h5></div>

<div id="taxes_app">
@verbatim
    <div class="alert alert-danger errors" v-if="errors.length">
        <ul>
           <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>
@endverbatim
    <form method="post" action="" @submit.prevent="onSubmit" id="taxes_form">
        @csrf
        <div class="form-group row">
            <div class="col-md-3">
                <label for="default_sales_tax">Default Sales Tax</label>
                <select class="form-control" id="default_sales_tax">
                        <option value="">No Tax(0%)</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="default_purchase_tax">Default Purchase Tax</label>
                <select class="form-control" id="default_purchase_tax">
                        <option value="">No Tax(0%)</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="tax_description">Tax Description/Name</label>
                <input id="tax_description" class="form-control" type="text" v-model="tax_description">
            </div>
            <div class="col-md-2">
                <label for="tax_code">Tax Code</label>
                <input id="tax_code" class="form-control" type="text" v-model="tax_code">
            </div>
            <div class="col-md-2">
                <label for="tax_rate">Tax Code</label>
                <input id="tax_rate" class="form-control" type="text" v-model="tax_rate">
            </div>
            
            <div class="col-md-1">
                <div class="row">
                    <label for="sales_tax">Sales Tax</label>
                </div>
                <div class="row">
                    <input class="settings_checkbox" type="checkbox" id="sales_tax" v-model="sales_tax">
                </div>
            </div>
            <div class="col-md-1">
                <div class="row">
                    <label for="purchase_tax">Purchase Tax </label>
                </div>
                <div class="row">
                <input class="settings_checkbox" type="checkbox" id="purchase_tax" v-model="purchase_tax">
                </div>
            </div>
             <button type="submit" class="btn btn-success settings_add_btn" id="tax_add" >Add</button>
        </div>
    </form>
</div>

<table class="table" id="taxes_table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Tax Description/Name</th>
            <th scope="col">Tax Code</th>
            <th scope="col">Tax Rate</th>
            <th scope="col">Sales Tax</th>
            <th scope="col">Purchase Tax</th>
            <th scope="col">Status</th>
        </thead>
    </table>
@endsection
        
@push('js-script')
<script type="text/javascript">
    $(document).ready(function(){
    taxes_table= $("#taxes_table").DataTable({
            processing: false,
            serverSide: true,
            ajax: "/system/taxes/list",
            columns: [
                {data: 'tax_description'},
                {data: 'tax_code'},
                {data: 'tax_rate'},
                {data: null, searchable: false, orderable: false, render:function(row){
                    if(row.sales_tax === "1"){
                         return '<div class="form-check"><input type="checkbox" class="form-check-input" checked></div> ';  
                     }
                    else{
                       return '<div class="form-check"><input type="checkbox" value="0" class="form-check-input"></div>'; 
                    }
                    }
                },
                {data: null, searchable: false, orderable: false, render:function(row){
                        if(row.purchase_tax === "1"){
                         return '<div class="form-check"><input type="checkbox" class="form-check-input" checked></div> ';  
                     }
                    else{
                       return '<div class="form-check"><input type="checkbox" value="0" class="form-check-input"></div>'; 
                    }
                    }
                 },
                {data: null, searchable: false, orderable: false, render:function(row){
                        if(row.active === "1"){
                         return '<div class="form-check"><input type="checkbox" class="form-check-input" checked></div> ';  
                     }
                    else{
                       return '<div class="form-check"><input type="checkbox" value="0" class="form-check-input"></div>'; 
                    }
                    }
                 }
            ]
        });
    });
    
    

var app= new Vue({

        el: "#taxes_app",
        
        data: {
            tax_description: "",
            tax_code:"",
            tax_rate: "",
            toggle: "",
            sales_tax: false,
            purchase_tax: false,
            errors: [],
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
             
                $('#tax_add').prop('disabled', true);
                
                axios.post('/system/taxes', this.$data)
                  
                    .then(function(){
                        that.errors=[];
                        that.tax_description="";
                        that.tax_code="";
                        that.tax_rate="";
                        that.purchase_tax=false;
                        that.sales_tax= false;
                        taxes_table.ajax.reload();
                        $('#tax_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#tax_add').prop('disabled', false);
                    });
              
                
            
            
        },
          
        }
});  
</script>
@endpush