@extends('layouts.app')

@section('content')
<div><h5>Payment terms</h5></div>

<form method="post" action="" id="payment_terms_form">
    @csrf
    <div class="form-group row">
        <div class="col-md-3">
            <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name" required autofocus>
        </div>

        <div class="col-md-3">
            <label for="days">Days</label>
            <input id="days" class="form-control" type="text" name="days" required autofocus>
        </div>

        <div class="col-md-3">
            <label for="payment_type">Type</label>
            <select class="form-control" name="payment_type" id="payment_type">
                <option value="1">1</option>
            </select>
        </div>
        <div style="padding-top: 28px; padding-left:10px"><button type="submit" class="btn btn-success">Add</button></div>
    </div>
</form>

<table class="table" id="payment_terms_table" style="width: 100%">
    <thead class="thead-light">
        <th scope="col">Name</th>
        <th scope="col">Days</th>
        <th scope="col">Type</th>
        <th scope="col">Delete</th>
    </thead>
   
</table>


@endsection

@push('js-script')
<script type="text/javascript">
$(document).ready(function(){
	payment_terms_table = $('#payment_terms_table').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: "/system/payment-terms/list",
	        columns: [
	            {data: 'name'},
	            {data: 'days'},
	            {data: 'payment_type'},
	            {data: 'delete', searchable: false, orderable: false, render: function(){
	                    var deleteBtnHTML= '<a href="javascript:void(0)"><button id="deleteBtn-payment-term"><span data-feather="delete"></span>Delete</button></a>'
	                    
	                    return deleteBtnHTML;
	            }
	             
	             }
	        
	        ],
	        dataSrc: ""
	    });

    $(document).on('click', "#deleteBtn-payment-term", function(event){
		event.preventDefault();
		var row= $(this).parents('tr')[0];
		   var data= payment_terms_table.row(row).data();
		   
		    $.ajaxSetup({
		     headers: {
		    	 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		     }
		    })
		   $.ajax({
		   url:"/system/payment-terms",
		   dataType:'text',
		   data: data ,
		   method:"delete",
		   success:function(data){
		   	payment_terms_table.ajax.reload();
		   }}
		   )
		   }); 
		      
	$("#payment_terms_form").submit(function(event){
		event.preventDefault();

		var data= $("#payment_terms_form").serialize();

		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		   });
		$.ajax({
		     type: 'POST',
		     url: "/system/payment-terms",
		     dataType:'text',
		     data: data,
		     success: function(data){
		        console.log(data);
		        payment_terms_table.ajax.reload();
		      $("#payment_terms_form")[0].reset();
		        
		     },
		      error: function(error){
		          alert('error'+error);
		          console.log(error);
		      }
		  })
		  })
		})
</script>
@endpush