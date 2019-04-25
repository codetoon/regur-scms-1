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
<script>

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
                    $("#loader").removeClass("hide-loader");
                    $("#loader").addClass("show-loader");
                    var row= $(this).parents('tr')[0];
                    var data= credit_reasons_table.row(row).data();

                     $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                     });
                    $.ajax({
                    url:"{{ route('system.creditreason.delete')}}",
                    dataType:'text',
                    data: data ,
                    method:"delete",
                    success:function(data){
                        credit_reasons_table.ajax.reload();
                        $("#loader").removeClass("show-loader");
                        $("#loader").addClass("hide-loader");
                }}
                )
                }
            }); 
        
       
         /*   save post data to DB*/
         $("#credit_reasons_form").submit(function(e){
                e.preventDefault();
               $("#loader").removeClass("hide-loader");
               $("#loader").addClass("show-loader");
             
               var data= $("#credit_reasons_form").serialize();
               $('#add-btn').prop('disabled', true);
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
             });
                $.ajax({
               type: 'POST',
               url: "/system/credit-reasons",
               dataType:'text',
               data: data,
               success: function(data){
                  console.log(data);
                  credit_reasons_table.ajax.reload();
                $("#credit_reasons_form")[0].reset();
                $('#add-btn').prop('disabled', false);
                $("#loader").removeClass("show-loader");
                $("#loader").addClass("hide-loader");
               },
                error: function(error){
                    /*alert('error'+error);*/
                    console.log(error);
                }
            })
            })
            
        }); 
		</script>
@endpush