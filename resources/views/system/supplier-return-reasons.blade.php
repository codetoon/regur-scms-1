@extends('layouts.app')

@section('content')
<div><h5>Supplier Return Reasons</h5></div>

<div id="supplier_return_reasons_app">
@verbatim
    <div class="alert alert-danger" v-if="errors.length">
        <ul>
            <li v-for= "error in errors">{{ error }}</li>
        </ul>
    </div>
    
    <div class="alert alert-success" v-if="succ_messages.length">
        <ul>
            <li v-for= "message in succ_messages">{{ message }}</li>
        </ul>
    </div>
@endverbatim
<form method="post" action="" @submit.prevent="onSubmit">
    @csrf
    <label for="supplier_return_reason"><sup>*</sup>Supplier Return Reason</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="supplier_return_reason" class="form-control" value="{{ old('supplier_return_reason')}}" v-model="supplier_return_reason" autofocus>
                </div>
                <button type="submit" class="btn btn-success" id="supplier_return_reason_add">Add</button>
        </div>
    
</form>
</div>
<table class="table" id="supplier_return_reasons_table">
    <thead class="thead-light">
        <th scope="col">Supplier Return Reason</th>
        <th scope="col">Delete</th>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    /*view data in datatable*/
    $(document).ready(function(){
        supplier_return_reasons_table = $('#supplier_return_reasons_table').DataTable({
                processing: false,
                serverSide: true,
                ajax: "/system/supplier-return-reasons/list",
                columns: [
                    {data: 'supplier_return_reason'},
                    {data: 'delete', searchable: false, orderable: false, render: function(){
                            var deleteBtnHTML= '<a href="javascript:void(0)"><button id="supplier_return_reason_delete"><span data-feather="delete"></span>Delete</button></a>'
                            
                            return deleteBtnHTML;
                    }
                     
                     }
                
                ],
                dataSrc: ""
            });
        });
    
    $(document).on('click', '#supplier_return_reason_delete', function(e){
        e.preventDefault();
        var confirmation= confirm('Confirm delete?');
        
        if(confirmation){
            showLoader();
            app.resetMessages();
            app.resetErrors();
            var row= $(this).parents('tr')[0];
            var data= supplier_return_reasons_table.row(row).data();
            
            axios.delete('/system/supplier-return-reasons/'+ data.id)
                .then(function(response){
                    supplier_return_reasons_table.ajax.reload();
                    hideLoader();
            })
            .catch(function(error){
                     app.errors= error.response.data.message.split();
                     hideLoader();
                
            })
        }
    });
    
    var app= new Vue({
        el: "#supplier_return_reasons_app",
        data: {
            supplier_return_reason: "",
            errors: [],
            succ_messages: []
        },
        
        methods: {
            onSubmit: function(){
                showLoader();
                var that= this;
                $("#supplier_return_reason_add").prop('disabled', true);
                
                axios.post('/system/supplier-return-reasons', this.$data)
                    .then(function(response){
                        that.errors= [];
                        that.supplier_return_reason= "";
                        that.succ_messages= response.data;
                        supplier_return_reasons_table.ajax.reload();
                        $("#supplier_return_reason_add").prop('disabled', false);
                        hideLoader();
                })
                .catch(function(error){
                    that.errors= error.response.data;
                    hideLoader();
                    $("#supplier_return_reason_add").prop('disabled', false);
                });
                
                this.resetMessages();
                
            },
            
            resetMessages: function(){
                this.succ_messages= [];
            },
            
            resetErrors: function(){
                this.errors= [];
            }
        }
    });
</script>

@endpush
