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
        var confirmation= confirm("Confirm delete?");
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= uom_table.row(row).data();
            
             axios.delete('/system/units-of-measure/'+ data.id )
                .then(function(response){
                    uom_table.ajax.reload();
                    hideLoader();
                })
                
                .catch(function(error){
                 if(error.response.status== 422){
                     uom_table.ajax.reload();
                    /* errors= error.response.data;*/
                     hideLoader();
                 }
             })
        }
    })
    
 var app= new Vue({
        el: "#uom_app",
        
        data: {
            unit_of_measure:"",
            errors: [],
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                $('#uom_add').prop('disabled', true);
                axios.post('/system/units-of-measure', this.$data)
                  
                    .then(function(){
                        that.errors=[];
                        that.unit_of_measure="";
                        uom_table.ajax.reload();
                        $('#uom_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#uom_add').prop('disabled', false);
                    });
              
                
            },
            
        },
          
        });       
           
</script>

@endpush
