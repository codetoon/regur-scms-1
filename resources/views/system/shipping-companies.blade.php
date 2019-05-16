@extends('layouts.app')

@section('content')
<div><h5>Shipping Companies</h5></div>
<div id="shipping_comp_app">
@verbatim
    <div class="alert alert-danger" v-if="errors.length">
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>
    
    <div class="alert alert-success" v-if="succ_messages.length">
        <ul>
            <li v-for="message in succ_messages">{{ message }}</li>
        </ul>
    </div>
@endverbatim
    <form method="post" action="" @submit.prevent= "onSubmit">
        @csrf
        <label for="company_name"><sup>*</sup>Company Name</label>
                <div class="form-group row">
                    <div class="col-md-9">
                        <input type="text" id="company_name" class="form-control" value="{{ old('company_name')}}" v-model="company_name" autofocus >
                    </div>
                    <button type="submit" class="btn btn-success" id="shipping_comp_add" >Add</button>
            </div>

    </form>
</div>
<table class="table" id="shipping_comp_table">
    <thead class="thead-light">
        <th>Company Name</th>
        <th>Active</th>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    $(document).ready(function(){
        shipping_comp_table= $('#shipping_comp_table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "/system/shipping-companies/list",
            columns: [
                {data: 'company_name'},
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
        })
    });
    
 var app= new Vue({
        el: "#shipping_comp_app",
        
        data: {
            company_name:"",
            errors: [],
            succ_messages: []
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                $('#shipping_comp_add').prop('disabled', true);
                axios.post('/system/shipping-companies', this.$data)
                  
                    .then(function(response){
                        that.errors=[];
                        that.company_name="";
                        that.succ_messages= response.data;
                        shipping_comp_table.ajax.reload();
                        $('#shipping_comp_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#shipping_comp_add').prop('disabled', false);
                    });
                this.resetMessages();
            },
            
            resetMessages: function(){
                this.succ_messages= [];
            }
        },
          
        });       
           
    

</script>

@endpush