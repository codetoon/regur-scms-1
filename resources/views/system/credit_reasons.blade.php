@extends('layouts.app')

@section('content')
<div><h5>Credit Reasons</h5></div>

<div id="form">
    <ul>
       <li v-for="error in errors">
       
        </li>     
        
    </ul>
    <form method="post" action="" @submit.prevent="onSubmit" id="credit_reasons_form">
        @csrf
        <label for="credit_reason"><sup>*</sup>Credit Reason:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="credit_reason" class="form-control" v-model="credit_reason">
                     </div>
                <button type="submit"  class="btn btn-success" id="add-btn" >Add</button>
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
                            var deleteBtnHTML= '<a href="javascript:void(0)"><button data-id="+row.id+" id="delete_btn"><span data-feather="delete"></span>Delete</button></a>'
                            
                            return deleteBtnHTML;
                    }
                     
                     }
                
                ],
                dataSrc: ""
            });
        });
    
     $form= new Vue({
        el: "#form",
        data: {
            credit_reason:"",
            errors: [],
            
            
        },
      methods: {
            
          onSubmit: function(){
              this.requestLoad();
              axios.post('/system/credit-reasons', this.$data).then(function(){
                  $("#credit_reasons_form")[0].reset();
                  credit_reasons_table.ajax.reload();
                  this.onSucc();
                  
                  
              }).catch(function(error){
                this.errors= error.response.data.message;
                /*this.errors= error.responseJSON;*/
                alert(this.errors);
                credit_reasons_table.ajax.reload();
                 this.onSucc();
              });
              
          },
          requestLoad: function(){
            $("#loader").removeClass("hide-loader");
            $("#loader").addClass("show-loader");
            $("#page-activity").css('opacity', '0.6');
            $('#add-btn').prop('disabled', 'true');
        },
          
          onSucc: function(){
            $("#loader").removeClass("show-loader");
            $("#loader").addClass("hide-loader");
            $("#page-activity").css('opacity', '1');
            $("#add-btn").prop('disabled', 'false');
            alert('success');
          }
          
       
          
          
      }
    });       
        
   
    
</script>
@endpush