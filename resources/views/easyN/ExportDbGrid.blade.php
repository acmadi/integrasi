<div style='height:100%; overflow:hidden'>
	<table id='dialogForm-EXPORT' ></table>
</div>


<script type="text/javascript">
	$('#dialogForm-EXPORT').datagrid({
		url:'{{ $postDataDetailImported }}',
		resize:true,
		title:'Preview Export Data To Excel',
		fit:true,
		toolbar: [
			// {
			// text:'Batalkan',
			// iconCls: 'icon-remove',
			// handler: function(){
			// 	$('#dialogForm-EXPORT').datagrid('unselectAll'); 
			// 	}
			// },{
			// text:'Pilih ',
			// iconCls: 'icon-add',
			// handler: function(){
			// 	$('#dialogForm-EXPORT').datagrid('selectAll'); 
			// 	}
			// },
			{
			text:'Export to Excel ',
			iconCls: 'fa fa-plus fa-lg',id:'save',
			handler: function(){
					ExportToFile();
				}
			}
		],
		columns:[[
			@foreach($koloms as $key => $value)
				{field:'{{$value}}',title:'{{$value}}',width:100},

			@endForeach
			{field:'-',title:'-',width:100}
		]],
		onLoadSuccess:function  (result) {
			EventonLoadSuccess(result)
		},
		// pagination : true,
		remoteSort:true,
		rownumbers : true,
		singleSelect:true,
		striped:true
	});
	function EventonLoadSuccess (result) {
	    console.log(result);
	    // if (result.error=='error') {
	    // 	$('#save').linkbutton('disable')
	    // 	// return false;
	    // 	$('#save').empty();
	    // 	$('#save').append('File tidak dapat di import karena ada error!! ');
	    // 	console.log('ada Erroe')
	    // };
	    // if (result.error=='file_error') {
	    // 	$('#save').linkbutton('disable').empty();
	    // 	$.messager.show({  
	    // 	title: 'Error',  
	    // 	msg: 'File tidak terdapat sheet yang harapkan !'  
	    // 	});
	    // };
	    if (result.error=='error_step') {
	    	$('#save').linkbutton('disable')
	    	// $('#save').empty();
	    	$.messager.alert('Info', result.msg, 'info');
	    };
	}
function ExportToFile(){
		// console.log('ExportToFile');
			var ids = [];
		$('#dialogForm-EXPORT').datagrid('selectAll'); 
		var data = $('#dialogForm-EXPORT').datagrid('getSelections');
		console.log(data.length);
	if (data.length>=1) {

				$('#dialogForm-EXPORT').datagrid('unselectAll');
			for(var i=0; i<data.length; i++){

				console.log(data[i]);
				ids.push(data[i].itemid);
			}
			$.ajax({
				url: '{{ $postExportToFile }}',
				type: 'POST',
				data: {data: data},
			})
			.done(function(result) {
				$('#dx-datagrid-DB').datagrid('reload');	// reload the user data
				$('#dialog-x').dialog('close');
				var result= $.parseJSON(result);
				window.open(result.download);
					$.messager.show({	// show error message
									title: 'Eksport Selesai ',
									msg: result.msg,
									timeout:5000,
									showType:'slide',
									width: 500,
									height:500,
									style:{
											right:'0',
											top:document.body.scrollTop+document.documentElement.scrollTop,
											bottom:'0',
										}
								});
				// $.messager.alert('Info', result.msg, 'info');
				console.log(result);
			})
			.fail(function(result) {
				var result = $.parseJSON(result);
				console.log(result);
				$.messager.alert('Info', result.msg, 'info'); 
			})
			.always(function(result) {
				var result = $.parseJSON(result);
				console.log("complete");
				// $.messager.alert('Info', 'Import Selesai', 'info');
			});
			
			// if (endEditing()){
			// 	$('#dialogForm-EXPORT').datagrid('acceptChanges');
			// }
			// $('#dialogForm-EXPORT').datagrid('selectAll'); 
		}
	else{
			$.messager.alert('Info', 'Sebelumnya, Silahkan pilih dengan tolbar pilih disamping!, Ok! ', 'info');		
	}		
}




</script>