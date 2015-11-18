<!-- <div style='height:100%; overflow:hidden'> -->
	<table id='dialogForm-IMPORT' ></table>
<!-- </div> -->


<script type="text/javascript">
	function EventonLoadSuccess (result) {
	    console.log(result);
	    if (result.error=='error') {
	    	$('#save').linkbutton('disable')
	    	// return false;
	    	$('#save').empty();
	    	$('#save').append('File tidak dapat di import karena ada error!! ');
	    	console.log('ada Erroe')
	    };
	    if (result.error=='file_error') {
	    	$('#save').linkbutton('disable').empty();
	    	$.messager.show({  
	    	title: 'Error',  
	    	msg: 'File tidak terdapat sheet yang harapkan !'  
	    	});
	    };
	    if (result.error=='error_step') {
	    	$('#save').linkbutton('disable')
	    	// $('#save').empty();
	    	$.messager.alert('Info', result.msg, 'info');
	    };
	}
	$('#dialogForm-IMPORT').datagrid({
		url:'{{ $re }}',
		resize:true,
		border:false,
		fit:true,
		toolbar: [
			// {
			// text:'Batalkan',
			// iconCls: 'icon-remove',
			// id:'',
			// handler: function(){
			// 	$('#dialogForm-IMPORT').datagrid('unselectAll'); 
			// 	}
			// }
			// ,{
			// text:'Pilih ',
			// iconCls: 'icon-remove',
			// handler: function(){
			// 	$('#dialogForm-IMPORT').datagrid('selectAll'); 
			// 	}
			// }
			// ,
			{
			text:'Simpan Ke Database ',
			iconCls: 'fa fa-file fa-lg',
			id:'save',
			handler: function(){
					simpan();
				}
			}
		],
		columns:[[
			@foreach($koloms as $key => $value)
				{field:'{{$value}}',title:'{{$value}}',width:100, styler:cellStyler},
			@endForeach
			{field:'-',title:'-',width:1}
		]],
		// pagination : true,S
		remoteSort:true,
		rownumbers : true,
		singleSelect:true,
		striped:true,
		onLoadSuccess:function  (result) {
			EventonLoadSuccess(result);
			$('.easyui-tooltip').tooltip();

		}
	});
	function cellStyler(value,row,index){
	    if (value.toString().search("Error") >=1 ){
	        return 'background-color:#ffee00;color:red;';
	    }
	}
	function simpan(){
			var ids = [];
			$('#dialogForm-IMPORT').datagrid('selectAll'); 
		var data = $('#dialogForm-IMPORT').datagrid('getSelections');
			$('#dialogForm-IMPORT').datagrid('unselectAll');
		for(var i=0; i<data.length; i++){
			console.log(data[i]);
			ids.push(data[i].itemid);
		}
		$.ajax({
			url: '{{ $itt }}',
			type: 'POST',
			data: {data: data},
		})
		.done(function(result) {
			$('#dx-datagrid-EXCEL').datagrid('reload');
			$('#dialog-x').dialog('close');
			var result= $.parseJSON(result);
				$.messager.show({	// show error message
								title: 'Hasil Import Anda ',
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
			$.messager.show({  
			title: 'Status',  
			msg: 'Import Selesai'
			});
			
		});

	}




</script>