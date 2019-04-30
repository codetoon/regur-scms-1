@extends('layouts.app')

@section('content')
<div><h5>Supplier Return Reasons</h5></div>

<form method="post" id="supplier_return_reasons_form">
    @csrf
    <label for="supplier_return_reason"><sup>*</sup>Supplier Return Reason</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="supplier_return_reason" class="form-control" name="supplier_return_reason" value="{{ old('supplier_return_reason')}}" required autofocus>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
        </div>
    
</form>
<table class="table" id="supplier_return_reasons_table">
    <thead class="thead-light">
        <th scope="col">Supplier Return Reason</th>
        <th scope="col">Delete</th>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    $(document).ready(function(){
        supplier_return_reasons_table= $("#supplier_return_reasons_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: "/system/supplier-return-reasons/list",
            columns: [
                {data: 'supplier_return_reason' },
                 {data: 'delete', searchable: false, orderable: false, render: function(){
	                      var deleteBtnHTML= '<a href="javascript:void(0)"><button id="delete_btn_supplier_return_reason"><span data-feather="delete"></span>Delete</button></a>'
	                      
	                      return deleteBtnHTML;
	              			}
	                  }
            ],
            dataSrc: ""
        })
        
        $(document).on('click', '#delete_btn_supplier_return_reason', function(e){
            e.preventDefault();
            var confirmation= confirm("Confirm Delete?");
            if(confirmation){
                $("#loader").removeClass('hide-loader');
                $("#loader").addClass('show-loader');
                $("page-activity").css('opacity', '0.6');
                var row= $(this).paren('tr')[0];
                
            }
        })
    })
</script>

@endpush
