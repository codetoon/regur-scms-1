function datatables(table_id, url, data){
	 table=  $('table_id').Datatable({
		processing: true,
		language: {processing: '<i><span data-feather="loader">Loading...</span></i>'},
		serverSide: true,
		ajax: url,
		columns: [
		   {data: data},
		   {data: null, searchable: false, orderable: false, render: function(row){
			   var deleteBtnHTML= '<a href="javascript:void(0)"><button id="deleteBtn-adjustment"><span data-feather="delete"></span>Delete</button></a>'
                   
                   return deleteBtnHTML;
		   }}
		   
		          ],
		dataSrc: ""
		
	})
	
	return table;
}

$(document).ready(function(){
	var x= datatables('#adjustment_reasons_table', '/system/adjustment-reasons' , 'adjustment_reason')
	alert(x);
})

