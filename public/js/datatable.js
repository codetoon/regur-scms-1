
          
          payment_terms= $("payment_terms_table").Datatable({
		processing: true,
		serverSide: true,
		ajax: "system?payment-terms",
		columns: [
		   {data: 'name'},
		   {data: 'days'},
		   {data: 'payment_type'},
		   {data: 'delete', orderable: false, searchable: false, render: function(){
			   var deleteBtn= '<a href="javascript:void(0)"><button id="deleteBtn-payment-terms"><span data-feather="delete"></span>Delete</button></a>' 
		   }}
		          ]
	})
	
	
	 credit_reasons_table = $('#datatable').DataTable({
                processing: true,
                language: {processing: '<i><span data-feather="loader">Loading...</span></i>'},
                serverSide: true,
                ajax: "/system/credit-reasons",
                columns: [
                    {data: 'credit_reason'},
                    {data: 'delete', searchable: false, orderable: false, render: function(row){
                            var deleteBtnHTML= '<a href="javascript:void(0)"><button data-id="+row.id+" id="deleteBtn"><span data-feather="delete"></span>Delete</button></a>'
                            
                            return deleteBtnHTML;
                    }
                     
                     }
                
                ],
                dataSrc: ""
            });
        
            $(document).on('click',"#deleteBtn", function(e){
                e.preventDefault();
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
            }}
            )
            }); 
        
       
         /*   save post data to DB*/
         $("#credit_reasons_form").submit(function(e){
                e.preventDefault();
                var data= $("#credit_reasons_form").serialize();
               
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
                  
               },
                error: function(error){
                    alert('error'+error);
                    console.log(error);
                }
            })
            })
          
      });
        