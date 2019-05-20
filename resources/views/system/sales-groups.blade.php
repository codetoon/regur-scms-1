@extends('layouts.app')

@section('content')

<div><h2>Sales Groups</h2></div>

<div id="sales_group_app">
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
        <div>
            <label for="sales_group_field_label">Sales Group Field Label</label>
            <div class="form-group row">
                <div class="col-md-5">
                    <input type="text" id="sales_group_field_label" class="form-control" value="{{ old('sales_group_field_label')}}" v-model="sales_group_field_label" autofocus>
                </div>
                <button type="submit" class="btn btn-success" id="sales_group_update">Update</button>
            </div> 
        </div>
        <div>
            <label for="sales_group_name"><sup>*</sup>Sales Group Name</label>
            <div class="form-group row">
                <div class="col-md-5">
                    <input type="text" id="sales_group_name" class="form-control" value="{{ old('sales_group_name')}}" v-model="sales_group_name" autofocus>
                </div>
                <button type="submit" class="btn btn-success" id="sales_group_add">Add</button>
            </div> 
        </div>
    </form>
</div>
<table class="table" id="sales_groups_table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Active</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
</table>
@endsection

@push('js-script')

<script type="text/javascript">
    $(document).ready(function(){
        sales_groups_table= $("#sales_groups_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: "/system/sales-groups/list",
            columns: [
                {data: 'sales_group_name'},
                {data: null, searchable: false, orderable: false, render:function(row){
                        if(row.active === "1"){
                         return '<div class="form-check"><input type="checkbox" class="form-check-input" checked></div> ';  
                     }
                    else{
                       return '<div class="form-check"><input type="checkbox" value="0" class="form-check-input"></div>'; 
                    }
                    }
                 },
                {data: 'delete', searchable: false, orderable: false, render: function(){
	                      var deleteBtnHTML= '<a href="javascript:void(0)"><button id="delete_btn_sales_groups"><span data-feather="delete"></span>Delete</button></a>';
	                      
	                      return deleteBtnHTML;
	              			}
	                  },
                
	                  
                
            ]
        })
    })
    $(document).on('click', '#delete_btn_sales_groups', function(e){
        e.preventDefault();
        app.resetMessages();
        app.resetErrors();
        var confirmation= confirm("Confirm delete?");
        
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= sales_groups_table.row(row).data();
            
            axios.delete('/system/sales-groups/'+ data.id )
                .then(function(response){
                    sales_groups_table.ajax.reload();
                    hideLoader();
                })
                
                .catch(function(error){
                     app.errors= error.response.data.message.split();
                     sales_groups_table.ajax.reload();
                    /* errors= error.response.data;*/
                     hideLoader();
                 
             })
                    
        }
   }); 
    
var app= new Vue({
        el: "#sales_group_app",
        
        data: {
            sales_group_field_label:"",
            sales_group_name: "",
            errors: [],
            succ_messages: []
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                $('#sales_group_add').prop('disabled', true);
                axios.post('/system/sales-groups', this.$data)
                  
                    .then(function(response){
                        that.errors=[];
                        that.sales_group_field_label="";
                        that.sales_group_name="";
                        that.succ_messages= response.data;
                        sales_groups_table.ajax.reload();
                        $('#sales_group_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#sales_group_add').prop('disabled', false);
                    });
                this.resetMessages();
                
            },
            
            resetMessages: function(){
                this.succ_messages= [];
               
            },
            
            resetErrors: function(){
                this.errors= [];
            }
            
        },
          
        });       
           
</script>

@endpush