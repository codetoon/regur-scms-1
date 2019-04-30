@extends('layouts.app')

@section('content')

<div><h5>Credit Reasons</h5></div>

<div id="credit_reasons_app">
@verbatim
    <div class="alert alert-danger errors" v-if="errors.length">
        <ul>
           <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>
@endverbatim
    <form method="post" action="" @submit.prevent="onSubmit" id="credit_reasons_form">
        @csrf
        <label for="credit_reason"><sup>*</sup>Credit Reason:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="credit_reason" class="form-control" v-model="credit_reason">
                     </div>
                <button type="submit"  class="btn btn-success" id="credit_reasons_add" >Add</button>
        </div>
    </form>
</div>

<table class="table" id="credit_reasons_table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Credit Reason</th>
            <th scope="col">Delete</th>
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
        credit_reasons_table = $('#credit_reasons_table').DataTable({
                processing: false,
                serverSide: true,
                ajax: "/system/credit-reasons/list",
                columns: [
                    {data: 'credit_reason'},
                    {data: 'delete', searchable: false, orderable: false, render: function(row){
                            var deleteBtnHTML= '<a href="javascript:void(0)"><button id="credit_reasons_delete"><span data-feather="delete"></span>Delete</button></a>'
                            
                            return deleteBtnHTML;
                    }
                     
                     }
                
                ],
                dataSrc: ""
            });
        });
    $(document).on('click',"#credit_reasons_delete", function(e){
        e.preventDefault();
        var confirmation= confirm("Confirm delete?");
        
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= credit_reasons_table.row(row).data();
            
            axios.delete('/system/credit-reasons/'+ data.id )
                .then(function(response){
                    credit_reasons_table.ajax.reload();
                    hideLoader();
                })
                
                .catch(function(error){
                 if(error.response.status== 422){
                     credit_reasons_table.ajax.reload();
                    /* errors= error.response.data;*/
                     hideLoader();
                 }
             })
                    
        }
   }); 
        
    var app= new Vue({
        el: "#credit_reasons_app",
        
        data: {
            credit_reason:"",
            errors: [],
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                $('#credit_reasons_add').attr('disabled', true);
                axios.post('/system/credit-reasons', this.$data)
                  
                    .then(function(){
                        that.errors=[];
                        $("#credit_reasons_form")[0].reset();
                        credit_reasons_table.ajax.reload();
                        $('#credit_reasons_add').attr('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#credit_reasons_add').attr('disabled', false);
                    });
              
                
            },
            
        },
          
        });       
           
</script>
@endpush