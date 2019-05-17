@extends('layouts.app')

@section('content')

<div><h5>Adjustment Reasons</h5></div>

<div id="adjustment_reasons_app">
@verbatim
    <div class="alert alert-danger" v-if="errors.length">
        <ul>
            <li v-for="error in errors" >{{ error }}</li>
        </ul>
    </div>
    
    <div class="alert alert-success" v-if="succ_messages.length">
    	<ul>
            <li v-for="message in succ_messages" >{{ message }}</li>
        </ul>
    </div>
@endverbatim
    <form method="post" action="" @submit.prevent="onSubmit" >
        @csrf
        <label for="adjustment_reason"><sup>*</sup>Adjustment Reason:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="adjustment_reason" class="form-control" value="{{ old('adjustment_reason')}}" v-model="adjustment_reason"  autofocus >
                </div>
                <button type="submit" class="btn btn-success" id="adjustment_reason_add">Add</button>
        </div>
    </form>
</div>

<table class="table" id="adjustment_reasons_table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Adjustment Reason</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    
</table>

@endsection

@push('js-script')
<script type="text/javascript">

/*view data in datatable*/
    $(document).ready(function(){
            adjustment_reasons_table = $('#adjustment_reasons_table').DataTable({
                processing: false,
                serverSide: true,
                ajax: "/system/adjustment-reasons/list",
                columns: [
                    {data: 'adjustment_reason'},
                    {data: 'delete', searchable: false, orderable: false, render: function(){
                                var deleteBtnHTML= '<a href="javascript:void(0)"><button id="adjustment_reason_delete"><span data-feather="delete"></span>Delete</button></a>'

                                return deleteBtnHTML;
                        }

                    }

                ],
                dataSrc: ""
        });
    });

$(document).on('click',"#adjustment_reason_delete", function(e){
        e.preventDefault();
        app.resetMessages();
        app.resetErrors();  
        var confirmation= confirm("Confirm delete?");
            
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= adjustment_reasons_table.row(row).data();

            axios.delete('/system/adjustment-reasons/'+ data.id)
                .then(function(response){
                    adjustment_reasons_table.ajax.reload();
                    hideLoader();
                   
                })
            
                .catch(function(error){
                   hideLoader();
                })
            
            }
    });
        
var app= new Vue({
    el: "#adjustment_reasons_app",
    
    data: {
        adjustment_reason: "",
        errors: [],
        succ_messages: []
        
    },
    
    methods: {
        onSubmit: function(){
                showLoader();              
                var that= this;
                $('#adjustment_reason_add').prop('disabled', true);
                
                axios.post('/system/adjustment-reasons', this.$data)
                  
                    .then(function(response){
                        that.errors=[];
                        that.adjustment_reason="";
                        that.succ_messages= response.data;
                        adjustment_reasons_table.ajax.reload();
                        $('#adjustment_reason_add').prop('disabled', false);
                        hideLoader();
                    })
            
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#adjustment_reason_add').prop('disabled', false);
                    });
              
                this.resetMessages();
        },
        
        resetMessages: function(){
                    this.succ_messages=[];
                },
        
        resetErrors: function(){
            this.errors= [];
        }
    }
});
    
        </script>

@endpush