<!-- <div style='height:50%; overflow:hidden'> -->
	<table id='ListGrid' ></table>
<!-- </div> -->


<script type="text/javascript">
	$('#ListGrid').datagrid({
		url:'{{ $url['log.l.g.d'] }}',
		resize:true,
		title:'History akses Tabel {{ ucfirst($title) }}',
		border:false,
		fit:true,
		toolbar: [
			{
			text:'Batalkan',
			iconCls: 'fa fa-hand-stop-o fa-lg',
			handler: function(){
				$('#ListGrid').datagrid('unselectAll'); 
				}
			},{
			text:'Pilih Semua',
			iconCls: 'fa fa-hand-pointer-o fa-lg',
			handler: function(){
				$('#ListGrid').datagrid('selectAll'); 
				}
			},{
			text:'Hapus ',
			iconCls: 'fa fa-remove fa-lg',
			handler: function(){
					// simpan();
				}
			}
		],
		columns:[[
			@foreach($koloms as $key => $value)
				{field:'{{$key}}',title:'{{$value}}'},

			@endForeach
			{field:'-',title:'-'}
		]],
		pagination : true,
		remoteSort:true,
		rownumbers : true,

		striped:true, 
		collapsible:true,
		autoRowHeight:true,
		fitColumns:false
		// singleSelect:true,
	});
	function simpan(){
			var ids = [];
		var data = $('#ListGrid').datagrid('getSelections');
			$('#ListGrid').datagrid('unselectAll');
		for(var i=0; i<data.length; i++){
			console.log(data[i]);
			ids.push(data[i].itemid);
		}
		$.ajax({
			url: '{{-- $itt --}}',
			type: 'POST',
			data: {data: data},
		})
		.done(function(result) {
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
			$.messager.alert('Info', 'Import Selesai', 'info');
		});

	}




</script>