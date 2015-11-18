

<!-- <div style='overflow:hidden'> -->
	<table id='dx-datagrid-EXCEL' /></table>
<!-- </div> -->
<!-- <div style='height:30%; overflow:hidden'>
	<table id='x-datagrid' ></table>
</div> -->


<script>
	$('#dx-datagrid-EXCEL').datagrid({
		url:'{{ $url['DataUploaded'] }}',
		// resize:true,
		title:'Daftar  File Excel {{ $db }} Terupload',
		fit:true,
		border:false,
		toolbar: [
		{
			text:'Upload File',
			iconCls: 'fa fa-plus fa-lg',
			handler: function(){newUpload('{{$url['FormUpload']}}'); 
			}
		}
		,{
			text:'Delete File Terupload',
			iconCls: 'fa fa-remove fa-lg',
			handler: function(){deleteFile(); 
			} 
		}
		,{
			text:'Preview File To Import',
			iconCls: 'fa fa-plus fa-lg',
			handler: function(){PreviewToImport('{{$url['FileImport']}}');
			}
		}
		// ,{
		// 	text:'Import File Tanpa Preview',
		// 	iconCls: 'icon-remove',
		// 	handler: function(){// Import('{{$url['FileImport']}}');
		// 	}
		// }
		,{
			text:'Hapus Hasil Import',
			iconCls: 'fa fa-remove fa-lg',
			handler: function(){
					delete_hasil_import();
			}
		}
		],
		columns:[[
		{field:'description',title:'Deskripsi File',width:100},
		// {field:'filename',title:'Nama File',width:100},
		{field:'original_filename',title:'Nama File',width:100,align:'right'},
		{field:'created_at',title:'Tanggal Upload',width:100,align:'right'},
		// {field:'updated_at',title:'Tanggal Update',width:100,align:'right'},
		{field:'user.email',title:'di upload oleh',width:100,align:'right'},
		{field:'import.status_import',title:'Status Import',width:100,align:'right', styler:cellStyler},
		{field:'import.user.email',title:'di Import Oleh ',width:100,align:'right', styler:cellStyler}
		]],

		pagination : true,
		remoteSort:true,
		rownumbers : true,
		singleSelect:true,
		striped:true
});
function cellStyler(value,row,index){
		// console.log(value);
		// console.log(value.toString());
    // if (value.toString().search("Belum") >=1 ){
    if (value.toString() == "Belum"){
        return 'background-color:#ffee00;color:red;';
    }
}
function  delete_hasil_import() {
		var row = $('#dx-datagrid-EXCEL').datagrid('getSelected');
		console.log(row);
		if (row){
			$.messager.confirm('Confirm','Apakah anda benar-benar ingin menghapus hasil import File =>  '+row.description+' ? ',function(r){
				if (r){
					$.post('{{ $url['DeleteHasilImport'] }}',{files_id:row.import.files_id},function(result){
						$(this).attr('disabled', '');
						var data = $.parseJSON(result);
						console.log(data.msg);
						$('#dx-datagrid-EXCEL').datagrid('reload');	
						$.messager.alert('Info', data.msg, 'info');
						if (data.code==200){
								$.messager.show({	// show error message
									title: 'Ok',
									msg: data.msg
								});
							} else {
							$.messager.show({	// show error message
								title: 'Error',
								msg: data.msg
							});
						}
					});
				}
			});
		}
}
	function newUpload(url){
		console.log(url);

		$(this).attr('disabled', 'disabled');
		// $.ajax({
		// 	url: url,
		// 	context: document.body
		// }).done(function(data) {
		// console.log(data);
		// return false;
	  		// if (data.code === 200 ) {
	  			$('#dialog-x').dialog({
	  				title: 'Upload File Tabel {{$db or ''}} ' ,
	  				width: 350,
	  				height: 180,
	  				modal:true,
	  				href: url,
	  				onLoadError:function  (result) {
	  					$('#dialog-x').dialog('close');
	  					$.messager.alert('Info', result.responseText, 'info');
	  				},
	  				buttons:[{
	  					text:'Upload !',
	  					handler:function (a){
	  						$(this).attr('disabled', 'disabled');

	  						console.log($('#UploadExcel').form());
	  						$('#UploadExcel').form('submit',{  
	  							success: function(data){
	  								var result=$.parseJSON(data);
	  								console.log(result);
	  								$('#UploadExcel').form('reset');
	  								if (result.code === 200 ) {
	  									$('#dialog-x').dialog('close');
	  									$('#dx-datagrid-EXCEL').datagrid('reload');
	  								}else if(result.code==400){
		  								$.messager.alert('Warnig ', result.msg, 'warning');
	  								}

	  							} 
	  						});
	  					}
	  				},{
	  					text:'Close !',
	  					handler:function(){
	  						$('#dialog-x').dialog('close');
	  					}
	  				}]
	  			}).dialog('center');
	  			
	  // 		}
			// if(data.code === 404){
			// 	$.messager.show({  
			// 	title: 'Error',  
			// 	msg: data.msg  
			// 	});
			// }
		// });

}
function deleteFile(){
	$(this).attr('disabled', 'disabled');
	var row = $('#dx-datagrid-EXCEL').datagrid('getSelected');
	if (row){
		$.messager.confirm('Confirm','Apakah anda benar-benar igin menghapus file '+row.description+' ? ',function(r){
			if (r){
				$.post('{{ $url['DeleteFile'] }}',{filename:row.filename,id:row.id},function(result){
					$(this).attr('disabled', '');
					var data = $.parseJSON(result);
					console.log(data.msg);
					$('#dx-datagrid-EXCEL').datagrid('reload');	
					$.messager.alert('Info', data.msg, 'info');
					if (data.code==200){
							$.messager.show({	// show error message
								title: 'Ok',
								msg: data.msg
							});
						} else {
						$.messager.show({	// show error message
							title: 'Error',
							msg: data.msg
						});
					}
				});
			}
		});
	}
	else{
		$.messager.alert('Info', ' <b>Anda harus memilih daftar file <br> dibawah terlebih dulu !!!</b>', 'info');
	}
}
function PreviewToImport(url){
		$(this).attr('disabled', 'disabled');
		// console.log(url);
		var row = $('#dx-datagrid-EXCEL').datagrid('getSelected');
		// console.log(url+'/'+row.filename);
		// console.log(row);
		if (row){
		// $.messager.alert('Info', row.filename+":"+row.original_filename+":"+row.attr1);
		// console.log(row.filename);
		// console.log(url);
		// console.log(url+'/'+row.filename);
		$('#dialog-x').dialog({
			title: 'Preview File To Import File "'+row.description+'"  ke  Table '+row.db_table,
			width: 1000,
			height: 500,
			modal:true,
			href: url+'/'+row.id,
			buttons:[
							{
								text:'Close !',
								handler:function(){
									$('#dialog-x').dialog('close');
								}
							}]
						}).dialog('center');	
		return false;
		// if ($('#tt').tabs('exists',title+'-'+row.original_filename+'-'+row.filename)){
		// 	$('#tt').tabs('select',title+'-'+row.original_filename+'-'+row.filename);
		// } else {
		// 	$('#tt').tabs('add',{
		// 		title:title+'-'+row.original_filename+'-'+row.filename,
		// 		// href:url+'/'+row.original_filename+'/'+row.filename,
		// 		href:url+'/'+row.filename,

		// 		closable:true,
		// 		extractor:function(data){
		// 			$(this).attr('disabled', '');
		// 			return data;
		// 			// data = $.fn.panel.defaults.extractor(data);
		// 			// var tmp = $('<div></div>').html(data);
		// 			// data = tmp.find('#content').html();
		// 			// tmp.remove();
		// 			// return data;
		// 		}
		// 	});
		// 	}
	}
	else{
		$.messager.alert('Info', 'Silahkan pilih baris dibawah terlebih dahulu !', 'info');
	}
}

// $('#x-datagrid').datagrid({
// 	url:'google.com',
// 	resize:true,
// 	title:'titleAA',
// 	fit:true,
// 	toolbar: [{
// 		text:'textAA',
// 		iconCls: 'add icon-add',
// 		handler: function(){
// 			// function handler
// 		}
// 	},{
// 		text:' 'icon-remove',
// 		handler: function(){
// 			// function handler
// 		}
// 	}],
// 	columns:[[
// 	    {field:'code',title:'Code',width:100},
// 	    {field:'name',title:'Name',width:100},
// 	    {field:'price',title:'Price',width:100,align:'right'}
// 	]],

// 	pagination : true,
// 	remoteSort:true,
// 	rownumbers : true,
// 	singleSelect:true,
// 	striped:true
// });






</script>

