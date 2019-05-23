@extends('layouts.app')

@section('content')
<div><h5>Attribute Sets</h5></div>

<div id="attribute_sets_app">
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
    <form method="post" action="" @submit.prevent="onSubmit">
    <div class="form-group row">
        <div class="col-md-3">

            <label for="name">Attribute Set Name</label>
            <input id="name" class="form-control" type="text" v-model="name">

        </div>
        <div class="col-md-3">
            <label for="type">Type</label>
            <select class="form-control" id="type" v-model="type">
                <option disabled value="">Please select Attribute Type</option>
            @foreach($attributeSetTypes as $key=> $attributeSetType)
                <option value= "{{ $key }}">{{ $attributeSetType }}</option>
            @endforeach
            </select>
        </div>

        <div ><button type="submit" class="btn btn-success settings_add_btn" id="attribute_set_add">Add</button></div>

    </div>
    </form>
</div>
<table class="table" id="attribute_sets_table">
    <thead class="thead-light">
        <th scope="col">Attribute Set Name</th>
        <th scope="col">Type</th>
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

                {data: null, name: 'name', render: function(row){
                    return '<a target="_blank" href="/system/attributes/'+row.id+'">'+row.name+'</a>';
                }
                },
                {data: null, name: 'type', render: function(row){
					return row.type;
                    }},
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
        app.resetMessages();
        app.resetErrors();
        var confirmation= confirm("Confirm delete?");
        
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= attribute_sets_table.row(row).data();
            
            axios.delete('/system/attribute-sets/'+ data.id )
                .then(function(response){
                    app.succ_messages= response.data;
                    attribute_sets_table.ajax.reload();
                    hideLoader();
                })
                
                .catch(function(error){
                     app.errors= error.response.data;
                     attribute_sets_table.ajax.reload();
                     hideLoader();
                 
             })
                    
        }
   }); 
    
    
var app= new Vue({
        el: "#attribute_sets_app",
        
        data: {
            name:"",
            type:"",
            errors: [],
            succ_messages: []
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                
          
                $('#attribute_set_add').prop('disabled', true);
                axios.post('/system/attribute-sets', this.$data)
                  
                    .then(function(response){
                        that.errors=[];
                        that.name="";
                        that.type="";
                        that.succ_messages= response.data;
                        attribute_sets_table.ajax.reload();
                        $('#attribute_set_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#attribute_set_add').prop('disabled', false);
                    });
                
                this.resetMessages(); 
                this.resetErrors();
                
            },
            
            resetMessages: function(){
                this.succ_messages=[];
            },
            
            resetErrors: function(){
                this.errors= [];
            }
            
        },
          
        });   
</script>


@endpush
 <!--  var row= $(this).parents('tr')[0];
                var data= attribute_sets_table.row(row).data();
                alert(data)-->