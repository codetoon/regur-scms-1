@extends('layouts.app')

@section('content')

<div><h2>Customer Types</h2></div>


<div>
    <form method="post" action="" id="customer_types_form">
        @csrf
        <label for="customer_type"><sup>*</sup>Customer Type:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="customer_type" class="form-control" name="customer_type" value="{{ old('customer_type')}}" required autofocus >
                </div>
                <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
</div>

<table class="table" id="customer_types_table">
    <thead class="thead-light" >
        <tr>
            <th scope="col">Type Name</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
	$(document).ready(function(){
		customer_types_table= $("#customer_types_table").DataTable({
			processing: true,
	        serverSide: true,
	        ajax: "/system/customer-types/list",
	        columns: [
	                  {data: 'customer_type'},
	                  {data: 'delete', searchable: false, orderable: false, render: function(){
	                      var deleteBtnHTML= '<a href="javascript:void(0)"><button id="delete_btn_customer_types"><span data-feather="delete"></span>Delete</button></a>'
	                      
	                      return deleteBtnHTML;
	              			}
	                  }
		      	        ],
		     dataSrc: ""
		});

	$(document).on('click', '#delete_btn_customer_types', function(e){
			e.preventDefault();
			var row= $(this).parents('tr')[0];
			var data= customer_types_table.row(row).data();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			})
			$.ajax({
				url: "/system/customer-types",
				dataType:'text',
				data: data ,
				method:"delete",
				success:function(data){
					customer_types_table.ajax.reload();
				   }
				});
		})
	/*   save post data to DB*/
	$("#customer_types_form").submit(function(e){
      e.preventDefault();
      var data= $("#customer_types_form").serialize();
     
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
   });
      $.ajax({
     type: 'POST',
     url: "/system/customer-types",
     dataType:'text',
     data: data,
     success: function(data){
        console.log(data);
        customer_types_table.ajax.reload();
      $("#customer_types_form")[0].reset();
        
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