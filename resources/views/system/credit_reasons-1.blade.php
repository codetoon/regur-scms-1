@extends('layouts.app')

@section('content')
<div><h5>Credit Reasons</h5></div>

 
<div>
    <form method="post" action="" id="credit_reasons_form">
        @csrf
        <label for="credit_reason"><sup>*</sup>Credit Reason:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="credit_reason" class="form-control{{ $errors->has('credit_reason') ? ' is-invalid' : '' }}" name="credit_reason" value="{{ old('credit_reason')}}"  autofocus>
                     @if ($errors->has('credit_reason'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('credit_reason') }}</strong>
                        </span>
                        @endif
                </div>
                <button type="submit"  class="btn btn-success" id="add-btn">Add</button>
        </div>
    </form>
</div>

<table class="table" id="datatable">
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
<!--<script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>-->
<script>
    new Vue({
        el: '#error-list',
        data: {
        errors
    }
    })
    
	/*view data in datatable*/
        $(document).ready(function(){
        credit_reasons_table = $('#datatable').DataTable({
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
        
            $(document).on('click',"#delete_btn", function(e){
                e.preventDefault();
               var confirmation= confirm("Confirm delete?");
                if(confirmation){
                    requestLoading();
                    var row= $(this).parents('tr')[0];
                    var data= credit_reasons_table.row(row).data();
                    axios.delete('/system/credit-reasons/'+ data.id )
                        .then(function(response){
                              success();
                              credit_reasons_table.ajax.reload();
                              }).catch(function(error){
                 if(error.response.status== 422){
                     success();
                     credit_reasons_table.ajax.reload();
                     errors= error.response.data;
                   
                 }
             })
                    
               
                }
            }); 
        
       
         /*   save post data to DB*/
         $("#credit_reasons_form").submit(function(e){
                e.preventDefault();
                requestLoading();
                var data= $("#credit_reasons_form").serialize();
              
             axios.post('/system/credit-reasons', data)
             .then(function(response){
                 alert('success');
                 success();
                 document.getElementById("credit_reasons_form").reset();
                 credit_reasons_table.ajax.reload();
                
             })
             .catch(function(error){
                 if(error.response.status== 422){
                     success();
                     document.getElementById("credit_reasons_form").reset();
                     credit_reasons_table.ajax.reload();
                    const errors= error.response.data.errors
                    alert(Object.keys(errors));
                     
                    
                 }
             })
            
        })
            
        }); 
		</script>
@endpush