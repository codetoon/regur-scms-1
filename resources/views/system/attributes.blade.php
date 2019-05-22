@extends('layouts.app')

@section('content')
<div class="form-group row">
            <div class="col-md-3">
                <div class="dropdown">
                  <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                     {{$attributeSet[0]->name}}
                    </button>
                <div class="dropdown-menu">
                    @foreach($allAttributeSets as $allAttributeSet)
                    <a class="dropdown-item" href="/system/attributes/{{ $allAttributeSet->id}}" >{{ $allAttributeSet->name}} </a>    
                    @endforeach
                </div>
                </div>
            </div>
   
        </div>
 


<div id="attributes_app">
    <!--<div class="col-md-3">
                <label for="attribute_set_id">Default Attribute Set</label>
                <select class="form-control"  id="attribute_set_id" v-model="attribute_set_id" autofocus>
                         <option disabled value="">Please select Attribute Set</option>
                    @foreach($attributeSet as $value)
                        <option value= "{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
    </div>-->
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
        
        <div class="form-group row">
            <div class="col-md-3">
                <label for="attribute_name"><sup>*</sup>Attribute Name</label>
                <input type="text" id="attribute_name" class="form-control" value="{{ old('attribute_name')}}" v-model="attribute_name" autofocus >
            </div>
            
            <div class="col-md-3">
                <label for="default_value">Default value</label>     
                <input type="text" id="default_value" class="form-control" value="{{ old('default_value')}}" v-model="default_value" autofocus>
            </div>
            
            <div class="col-md-1">
                <div class="row">
                    <label for="required">Required</label>
                </div>
                <div class="row">
                    <input class="settings_checkbox" type="checkbox" id="required" v-model="required">
                </div>
            </div>
            <div><button type="submit" class="btn btn-success settings_add_btn" id="attribute_add" >Add</button></div>
        </div>
    </form>
    
    <table class="table" id="attributes_table">
        <thead class="thead-light">
            <th scope="col">Attribute Name</th>
            <th scope="col">Default Value</th>
            <th scope="col">Required</th>
            <th scope="col">Action</th>
        </thead>
    </table>
@endsection
    
@push('js-script')
    
<script type="text/javascript">
$(document).ready(function(){
    attributes_table= $("#attributes_table").DataTable({
            processing: false,
            serverSide: true,
            ajax: {url: "/system/attributes/{{ $attributeSet[0]->id }}/list"
            }
                  ,
            
            columns: [
                {data: 'attribute_name'},
                {data: 'default_value'},
                {data: null, searchable: false, orderable: false, render:function(row){
                    if(row.required === "1"){
                         return '<div class="form-check"><input type="checkbox" class="form-check-input" checked></div> ';  
                     }
                    else{
                       return '<div class="form-check"><input type="checkbox" value="0" class="form-check-input"></div>'; 
                        }
                    }
                },
                 {data: 'delete', searchable: false, orderable: false, render: function(row){
                            var deleteBtnHTML= '<a href="javascript:void(0)"><button id="attribute_delete"><span data-feather="delete"></span>Delete</button></a>'
                                return deleteBtnHTML;
                    } 
                }
                
                
            ]
        });
    });
    
    $(document).on('click',"#attribute_delete", function(e){
        e.preventDefault();
        app.resetMessages();
        app.resetErrors();
        var confirmation= confirm("Confirm delete?");
        
        if(confirmation){
            showLoader();
            var row= $(this).parents('tr')[0];
            var data= attributes_table.row(row).data();
            
            axios.delete('/system/attributes/'+ data.id )
                .then(function(response){
                    app.succ_messages= response.data;
                    attributes_table.ajax.reload();
                    hideLoader();
                })
                
                .catch(function(error){
                    
                    attributes_table.ajax.reload();
                    app.errors= error.response.data;
                     hideLoader();
                 
             })
                    
        }
   }); 
    
var app= new Vue({
        el: "#attributes_app",
        
        data: {
            attribute_name: "",
            default_value: "",
            errors: [],
            required: false,
            succ_messages: [],
            attribute_set_id: "{{ $attributeSet[0]->id }}"
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                
                $('#attribute_add').prop('disabled', true);
                axios.post("/system/attributes/"+ this.$data.attribute_set_id, this.$data)
                  
                    .then(function(response){
                        that.errors=[];
                        that.attribute_name="";
                        that.default_value="";
                        that.required= "";
                        that.succ_messages= response.data;
                        attributes_table.ajax.reload();
                        $('#attribute_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#attribute_add').prop('disabled', false);
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
