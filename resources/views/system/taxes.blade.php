@extends('layouts.app')

@section('content')

<div><h5>Taxes</h5></div>

<div id="taxes_app">
@verbatim
    <div class="alert alert-danger" v-if="errors.length">
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>
@endverbatim
    <form method="post" @submit.prevent="onSubmit">
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
                <label for="tax_rate">Tax Rate</label>
                <input id="tax_rate" class="form-control" type="text" v-model="tax_rate">
            </div>
            <div class="col-md-1">
                @verbatim
                <div class="row">
                    <label for="sales_tax">Sales Tax</label>
                </div>
                     <input type="checkbox" id="sales_tax" class="tax_checkbox" v-model="sales_tax" >
            </div>
             @endverbatim
            <div class="col-md-1">
                <div class="row">
                    <label for="purchase_tax">Purchase Tax</label>
                </div>
                     <input type="checkbox" id="purchase_tax" class="tax_checkbox" >
            </div>
            
            <div><button type="submit" class="btn btn-success" id="tax_add" style="margin-top: 28px">Add</button></div>
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
            <th scope="col">Obsolete</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    
    /*view data in datatable*/
        $(document).ready(function(){
        taxes_table = $('#taxes_table').DataTable({
                processing: false,
                serverSide: true,
                ajax: "/system/taxes/list",
                columns: [
                    {data: 'tax_description'},
                    {data: 'tax_code'},
                    {data: 'tax_rate'},
                    {data: null, render: function(row){
                        if(row.sales_tax === "1"){
                            return '<div class="form-check"><input type="checkbox" class="form-check-input" checked></div>';
                            }
                        else{
                            return '<div class="form-check"><input type="checkbox" class="form-check-input"></div>';
                            }
                        }
                    },
                    {data: null, render: function(row){
                        if(row.purchase_tax
                      return  '<div class="form-check"><input type="checkbox" class="form-check-input" value=""></div> ';
                    }},
                    {data: 'obslete', searchable: false, orderable: false, render:function(){
                        var obseleteHTML= '<div class="form-check"><input type="checkbox" class="form-check-input" value=""></div> ';
                        return obseleteHTML;
                    }
                     
                     }
                
                ],
                dataSrc: ""
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
            purchase_tax: "",
            errors: [],
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                $('#tax_add').prop('disabled', true);
                alert(this.$data);
                axios.post('/system/taxes', this.$data)
                  
                    .then(function(){
                        that.errors=[];
                        that.tax_description="";
                        that.tax_code="";
                        that.tax_rate="";
                        that.purchase_tax="";
                        that.sales_tax= "";
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
            
        },
          
        });   
</script>

@endpush