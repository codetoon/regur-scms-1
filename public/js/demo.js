

    alert("ok");
            $("#add-btn").click(function(){
                $("form").submit(function(){
                    var data= $("#credit_reasons_form").serialize();
                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                 });
                    $.ajax({
                   type: 'POST',
                   url: "{{ Request::url() }}",
                   dataType:'text',
                   data: data,
                   success: function(data){
                       alert("saved"+data);
                   },
                    error: function(error){
                        alert("error"+error);
                    }
                })
                })
            })
          