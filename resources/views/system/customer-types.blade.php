@extends('layouts.app')

@section('content')

<div><h2>Customer Types</h2></div>


<div id="customer_types_app">
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
        <label for="customer_type"><sup>*</sup>Customer Type:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="customer_type" class="form-control" name="customer_type" value="{{ old('customer_type')}}" v-model="customer_type" autofocus >
                </div> 
                <button type="submit" class="btn btn-success" id="customer_type_add">Add</button>
        </div>
    </form>
</div>

<table class="table" id="customer_types_table">
    <thead class="thead-light" >
        <tr>
            <th scope="col">Type Name</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
	$(document).ready(function(){
        customer_types_table= $("#customer_types_table").DataTable({
            procesing: false,
            serverSide: true,
            ajax: "/system/customer-types/list",
            columns: [
                {data: 'customer_type'},
                {data: 'delete', searchable: false, orderable: false, render: function(){
                    var deleteHTML= '<a href="javascript:void(0)"><button id="customer_type_delete"><span data-feather= "delete"></span>Delete</button>';
                    return deleteHTML;
                }}
            ],
            
            dataSrc: ""
        })
    });
                      
    $(document).on('click', '#customer_type_delete', function(){
        var confirmation= confirm("Confirm delete?");
        if(confirmation){
            showLoader();
            app.resetErrors();
            app.resetMessages();
            var row= $(this).parents('tr')[0];
            var data= customer_types_table.row(row).data();
            
            axios.delete('/system/customer-types/'+ data.id)
                .then(function(response){
                app.succ_messages= response.data;
                customer_types_table.ajax.reload();
                hideLoader();
            })
            .catch(function(error){
                app.errors= error.response.data;
                hideLoader();
            })
            
        }
    });
    
    
    var app = new Vue({
        el: "#customer_types_app",
        
        data: {
            customer_type: "",
            errors: [],
            succ_messages: []
        },
        
        methods: {
            onSubmit: function(){
                showLoader();
                var that= this;
                $('#customer_type_add').prop('disabled', true);
                axios.post('/system/customer-types', this.$data)
                  
                    .then(function(response){
                        that.errors=[];
                        that.customer_type="";
                        that.succ_messages= response.data;    
                        customer_types_table.ajax.reload();
                        $('#customer_type_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#customer_type_add').prop('disabled', false);
                    });
                this.resetMessages();
            },
            
            resetMessages: function(){
                this.succ_messages= []
            },
            
            resetErrors: function(){
                this.errors= [];
            }
        }
    });

    
</script>
@endpush