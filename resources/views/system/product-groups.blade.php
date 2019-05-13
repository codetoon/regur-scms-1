@extends('layouts.app')

@section('content')
<div><h5>Product Groups</h5></div>
<div id="product_groups_app">
@verbatim
    <div class="alert alert-danger" v-if="errors.length">
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>
@endverbatim
    <form method="post" action="" @submit.prevent= "onSubmit">
        @csrf
        <div class="form-group row">
            <div class="col-md-3">
                <label for="product_group_name"><sup>*</sup>Product Group Name</label>
                <input id="product_group_name" class="form-control" type="text" v-model= "product_group_name" autofocus>
            </div>

            <div class="col-md-3">
                <label for="attribute_set_id">Default Attribute Set</label>
                <select class="form-control"  id="attribute_set_id" v-model="attribute_set_id" autofocus>
                         <option disabled value="">Please select Attribute Set</option>
                    @foreach($attributeSets as $attributeSet)
                        <option value= "{{ $attributeSet->id }}">{{ $attributeSet->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="add-btn"><button type="submit" class="btn btn-success" id="product_group_add">Add</button></div>
        </div>
    </form>
</div>
<table class="table" id="product_groups_table">
    <thead class="thead-light">
        <th scope="col">Group Name</th>
        <th scope="col">Default Attribute Set</th>
        <th scopt="col">Delete</th>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    $(document).ready(function(){
        product_groups_table= $('#product_groups_table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "/system/product-groups/list",
            columns: [

                {data: 'product_group_name'},   
                {data: 'name'},   
                {data: 'null', searchable: false, orderable: false, render: function(row){
                            var deleteBtnHTML= '<a href="javascript:void(0)"><button id="attribute_set_delete"><span data-feather="delete"></span>Delete</button></a>'
                            
                            return deleteBtnHTML;
                    }
                    
                 }
            ]
        })
    });
    
    var app= new Vue({
        el: "#product_groups_app",
        
        data: {
            product_group_name: "",
            attribute_set_id: "",
            errors: [],
            },
        methods: {
            onSubmit: function(){
                showLoader();              
                var that= this;
                $('#product_group_add').prop('disabled', true);
                axios.post('/system/product-groups', this.$data)
                  
                    .then(function(){
                        that.errors=[];
                        that.product_group_name= "";
                        that.attribute_set_id= "";
                        product_groups_table.ajax.reload();
                        $('#product_group_add').prop('disabled', false);
                        hideLoader();
                    })
                    .catch(function(error){
                        that.errors= error.response.data;
                        hideLoader();
                        $('#product_group_add').prop('disabled', false);
                    });
              
                
            },
            
        },
    });

</script>

@endpush