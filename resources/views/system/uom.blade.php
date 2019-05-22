@extends('layouts.app')

@section('content')

<div><h5>Units of Measure</h5></div>

<div id="uom_app">
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
    <form method="post" id="uom_form" @submit.prevent= "onSubmit">
        @csrf
        <label for="unit_of_measure"><sup>*</sup>Unit of Measure Name</label>
                <div class="form-group row">
                    <div class="col-md-9">
                        <input type="text" id="unit_of_measure" class="form-control"  value="{{ old('unit_of_measure')}}" v-model="unit_of_measure" autofocus>
                    </div>
                    <button type="submit" class="btn btn-success" id="uom_add">Add</button>
            </div>

    </form>
</div>
<table class="table" id="uom_table">
    <thead class="thead-light">
        <th>Name</th>
        <th>Delete</th>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    $(document).ready(function(){
        uom_table= $('#uom_table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "/system/units-of-measure/list",
            columns: [
                {data: 'unit_of_measure'},
                {data: 'delete', searchable: false, orderable: false, render: function(){
	                      var deleteBtnHTML= '<a href="javascript:void(0)"><button id="uom_delete"><span data-feather="delete"></span>Delete</button></a>'
	                      
	                      return deleteBtnHTML;
	              			}
	                  }
            ]
        })
    })
    
    $(document).on('click', '#uom_delete', function(e){
        e.preventDefault();
        app.resetMessages();
        app.resetErrors();
        var confirmation= confirm("Confirm delete?");
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= uom_table.row(row).data();
            
             axios.delete('/system/units-of-measure/'+ data.id )
                .then(function(response){
                    app.succ_messages= response.data;
                    uom_table.ajax.reload();
                    hideLoader();
                })
                
                .catch(function(error){
                     app.errors= error.response.data;
                     uom_table.ajax.reload();
                     hideLoader();
                 
             })
        }
    })
    
 var app= new Vue({
        el: "#uom_app",
        
        data: {
            unit_of_measure:"",
            errors: [],
            succ_messages: []
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                $('#uom_add').prop('disabled', true);
                axios.post('/system/units-of-measure', this.$data)
                  
                    .then(function(response){
                        that.errors=[];
                        that.unit_of_measure="";
                        that.succ_messages= response.data;
                        uom_table.ajax.reload();
                        $('#uom_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#uom_add').prop('disabled', false);
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
