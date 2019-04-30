@extends('layouts.app')

@section('content')

<div><h2>Sales Groups</h2></div>

<div>
    <form method="post" action="" id="sales_groups_form">
    @csrf
        <div>
            <label for="sales_group_field_label">Sales Group Field Label</label>
            <div class="form-group row">
                <div class="col-md-5">
                    <input type="text" id="sales_group_field_label" class="form-control" name="sales_group_field_label" value="{{ old('sales_group_field_label')}}" required autofocus>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div> 
        </div>
        <div>
            <label for="sales_group_name"><sup>*</sup>Sales Group Name</label>
            <div class="form-group row">
                <div class="col-md-5">
                    <input type="text" id="sales_group_name" class="form-control" name="sales_group_name" value="{{ old('sales_group_name')}}" required autofocus>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </div> 
        </div>
    </form>
</div>
<table class="table" id="sales_groups_table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Obsolete</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
</table>
@endsection

@push('js-script')

<script type="text/javascript">
    $(document).ready(function(){
        sales_groups_table= $("#sales_groups_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: "/system/sales-groups/list",
            columns: [
                {data: 'sales_group_name'},
                {data: 'delete', searchable: false, orderable: false, render: function(){
	                      var deleteBtnHTML= '<a href="javascript:void(0)"><button id="delete_btn_sales_groups"><span data-feather="delete"></span>Delete</button></a>'
	                      
	                      return deleteBtnHTML;
	              			}
	                  },
                {data: 'obsolete', searchable: false, orderable: false
	                  }
                
            ]
        })
    })
</script>

@endpush