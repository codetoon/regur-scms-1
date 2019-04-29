@extends('layouts.app')

@section('content')

<div><h2>Adjustment Reasons</h2></div>


<div>
    <form method="post" action="" id="adjustment_reasons_form">
        @csrf
        <label for="adjustment_reason"><sup>*</sup>Adjustment Reason:</label>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" id="adjustment_reason" class="form-control{{ $errors->has('adjustment_reason') ? ' is-invalid' : '' }}"  name="adjustment_reason" value="{{ old('adjustment_reason')}}"  autofocus >
                </div>
                <button type="submit" class="btn btn-success" id="add-btn">Add</button>
        </div>
    </form>
</div>

<table class="table" id="adjustment-reasons-table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Adjustment Reason</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    
</table>

@endsection

@push('js-script')
<script type="text/javascript">

/*view data in datatable*/
$(document).ready(function(){
            adjustment_reasons_table = $('#adjustment-reasons-table').DataTable({
                    processing: false,
                    serverSide: true,
                    ajax: "/system/adjustment-reasons/list",
                    columns: [
                        {data: 'adjustment_reason'},
                        {data: 'delete', searchable: false, orderable: false, render: function(){
                                var deleteBtnHTML= '<a href="javascript:void(0)"><button id="delete_btn_adjustment"><span data-feather="delete"></span>Delete</button></a>'

                                return deleteBtnHTML;
                        }

                         }

                    ],
                    dataSrc: ""
                });

        $(document).on('click',"#delete_btn_adjustment", function(e){
           e.preventDefault();
            var confirmation= confirm("Confirm delete?");
            if(confirmation){
                $("#loader").removeClass("hide-loader");
                $("#loader").addClass("show-loader");
                $("#page-activity").css('opacity', '0.6');
               var row= $(this).parents('tr')[0];
               var data= adjustment_reasons_table.row(row).data();

                $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
                });
               $.ajax({
               url:"/system/adjustment-reasons",
               dataType:'text',
               data: data ,
               method:"delete",
               success:function(data){
                adjustment_reasons_table.ajax.reload();
                $("#loader").removeClass("show-loader");
                $("#loader").addClass("hide-loader");
                $("#page-activity").css('opacity', '1');
            }}
            )
            }
        }); 

/*   save post data to DB*/
        $("#adjustment_reasons_form").submit(function(e){
                $("#loader").removeClass("hide-loader");
                $("#loader").addClass("show-loader");
                $('#add-btn').prop('disabled', true);
                $("#page-activity").css('opacity', '0.6');
              e.preventDefault();
              var data= $("#adjustment_reasons_form").serialize();
            
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
              $.ajax({
             type: 'POST',
             url: "/system/adjustment-reasons",
             dataType:'text',
             data: data,
             success: function(data){
                console.log(data);
                adjustment_reasons_table.ajax.reload();
                $("#adjustment_reasons_form")[0].reset();
                $('#add-btn').prop('disabled', false);
                $("#loader").removeClass("show-loader");
                $("#loader").addClass("hide-loader");
                $("#page-activity").css('opacity', '1');

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