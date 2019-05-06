@extends('layouts.app')

@section('content')
<div><h5>Payment terms</h5></div>
<div id="payment_terms_app">
@verbatim
    <div class="alert alert-danger" v-if="errors.length">
        <ul>
            <li v-for="errors in error">{{ error }}</li>
        </ul>
    </div>
@endverbatim
    <form method="post" action="" @submit.prevent= "onSubmit">
        @csrf
        <div class="form-group row">
            <div class="col-md-3">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" v-model="name" autofocus>
            </div>

            <div class="col-md-3">
                <label for="days">Days</label>
                <input id="days" class="form-control" type="text" v-model="days"  autofocus>
            </div>

            <div class="col-md-3 form-group">
                <label for="payment_type">Type</label>
                <select class="form-control" v-model="payment_type">
                   <option disabled value="">Please select payment type</option>
                @foreach($paymentTypes as $key=> $paymentType)
                    <option value= "{{ $key }}">{{ $paymentType }}</option>
                @endforeach
                </select>
            </div>
            <div style="padding-top: 28px; padding-left:10px"><button type="submit" class="btn btn-success" id="payment_term_add">Add</button></div>
        </div>
    </form>
</div>
<table class="table" id="payment_terms_table" style="width: 100%">
    <thead class="thead-light">
        <th scope="col">Name</th>
        <th scope="col">Days</th>
        <th scope="col">Type</th>
        <th scope="col">Delete</th>
    </thead>
   
</table>


@endsection

@push('js-script')
<script type="text/javascript">
$(document).ready(function(){
    payment_terms_table= $("#payment_terms_table").DataTable({
        processing: false,
        serverSide: true,
        ajax: '/system/payment-terms/list', 
        columns:  [
                    {data: 'name'},
                    {data: 'days'},
                    {data: 'payment_type'},
                    {data: 'delete', searchable: false, orderable: false, render: function(row){
                            var deleteBtnHTML= '<a href="javascript:void(0)"><button id="payment_term_delete"><span data-feather="delete"></span>Delete</button></a>'
                            
                            return deleteBtnHTML;
                    }
                     
                     }
                
                ],
                dataSrc: ""
            });
    })
    
$(document).on('click',"#payment_term_delete", function(e){
        e.preventDefault();
        var confirmation= confirm("Confirm delete?");
        
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= payment_terms_table.row(row).data();
            
            axios.delete('/system/payment-terms/'+ data.id )
                .then(function(response){
                    payment_terms_table.ajax.reload();
                    hideLoader();
                })
                
                .catch(function(error){
                 if(error.response.status== 422){
                     payment_terms_table.ajax.reload();
                    /* errors= error.response.data;*/
                     hideLoader();
                 }
             })
                    
        }
   }); 
        
    var app= new Vue({
        el: "#payment_terms_app",
        
        data: {
            name:"",
            days: "",
            payment_type: "",
            errors: [],
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                $('#payment_term_add').prop('disabled', true);
                axios.post('/system/payment-terms', this.$data)
                  
                    .then(function(){
                        that.errors=[];
                        that.name= "";
                        that.days= "";
                        that.payment_type="";
                        payment_terms_table.ajax.reload();
                        $('#payment_term_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#payment_term_add').prop('disabled', false);
                    });
              
                
            },
            
        },
          
        });       
</script>
@endpush