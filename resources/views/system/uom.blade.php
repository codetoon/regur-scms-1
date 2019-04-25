@extends('layouts.app')

@section('content')

<div><h5>Units of Measure</h5></div>

<form method="post" id="uom_form">
    @csrf
    <label for="unit_of_measure"><sup>*</sup>Unit of Measure Name</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="unit_of_measure" class="form-control" name="unit_of_measure" value="{{ old('unit_of_measure')}}" required autofocus>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
        </div>
    
</form>
<table class="table" id="uom_table">
    <thead class="thead-light">
        <th>Name</th>
        <th>Delete</th>
    </thead>
</table>
@endsection

@push('js-script')
<script type="text/javascript">
    $(document).ready(function(){
        uom_table= $('#uom_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/system/units-of-measure/list",
            columns: [
                {data: 'unit_of_measure'},
                {data: 'delete', searchable: false, orderable: false, render: function(){
	                      var deleteBtnHTML= '<a href="javascript:void(0)"><button id="delete_btn_sales_groups"><span data-feather="delete"></span>Delete</button></a>'
	                      
	                      return deleteBtnHTML;
	              			}
	                  }
            ]
        })
    })
</script>

@endpush
