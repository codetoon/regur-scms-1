@extends('layouts.app')

@section('content')
<div><h5>Attribute Sets</h5></div>

<div id="attribute_sets_app">
@verbatim
    <div class="alert alert-danger" v-if="errors.length">
        <ul>
            <li v-for="error in errors"></li>
        </ul>
    </div>
@endverbatim
    <form method="post" action="" @submit.prevent="onSubmit">
    <div class="form-group row">
        <div class="col-md-3">
            <label for="attribute_set">Attribute Set Name</label>
            <input id="attribute_set" class="form-control" type="text" v-model="attribute_set">
        </div>
        <div class="col-md-3">
            <label for="type">Type</label>
            <select class="form-control" id="type" v-model="type">
            @foreach($types as $key=> $type)
                <option value= "{{ $key }}">{{ $type }}</option>
            @endforeach
            </select>
        </div>
        <div ><button type="submit" class="btn btn-success" id="attribute_set_add">Add</button></div>
    </div>
    </form>
</div>
<table class="table" id="attribute_sets_table" style="width: 100%">
    <thead class="thead-light">
        <th scope="col">Attribute Set Name</th>
        <th scope="col">Type</th>
        <th scope="col">Number of Records</th>
        <th scope="col">Action</th>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    $(document).ready(function(){
        attribute_sets_table= $('#attribute_sets_table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "/system/attribute-sets/list",
            columns: [
                {data: null, name: 'attribute_set', render: function(row){
                    return '<a target="_blank" href="/system/attributes/'+row.id+'">'+row.attribute_set+'</a>'
                }
                },
                {data: 'type'},
                {data: null},
                {data: 'delete', searchable: false, orderable: false, render: function(row){
                            var deleteBtnHTML= '<a href="javascript:void(0)"><button id="attribute_set_delete"><span data-feather="delete"></span>Delete</button></a>'
                            
                            return deleteBtnHTML;
                    }
                    
                 }
            ]
        })
    });
    
    $(document).on('click',"#attribute_set_delete", function(e){
        e.preventDefault();
        var confirmation= confirm("Confirm delete?");
        
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= attribute_sets_table.row(row).data();
            
            axios.delete('/system/attribute-sets/'+ data.id )
                .then(function(response){
                    attribute_sets_table.ajax.reload();
                    hideLoader();
                })
                
                .catch(function(error){
                 if(error.response.status== 422){
                     attribute_sets_table.ajax.reload();
                    /* errors= error.response.data;*/
                     hideLoader();
                 }
             })
                    
        }
   }); 
    
    
var app= new Vue({
        el: "#attribute_sets_app",
        
        data: {
            attribute_set:"",
            type:"",
            errors: [],
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                
          
                $('#attribute_set_add').prop('disabled', true);
                axios.post('/system/attribute-sets', this.$data)
                  
                    .then(function(){
                        that.errors=[];
                        that.attribute_set="";
                        that.type="";
                        attribute_sets_table.ajax.reload();
                        $('#attribute_set_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#attribute_set_add').prop('disabled', false);
                    });
              
                
            },
            
        },
          
        });   
</script>


@endpush
 <!--  var row= $(this).parents('tr')[0];
                var data= attribute_sets_table.row(row).data();
                alert(data)-->