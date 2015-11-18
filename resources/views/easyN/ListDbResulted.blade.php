
<!-- <div style='height:80%; overflow:hidden'> -->
	<table id='dx-datagrid-DB' ></table>
<!-- </div> -->


<script>
$('#dx-datagrid-DB').datagrid({
	url:'{{ $url['postDataImported'] }}',
	resize:true,
	title:'Daftar Tabel {{ $db }} yang di Import',
	fit:true,
	border:false,
	toolbar: [
		{
		text:'Preview data Import Hasil untuk di Eksport ',
		iconCls: 'fa fa-plus fa-lg',
		handler: function(){
			DetailDataDB('{{$url['anyDetailTable']}}','Preview Data | {{ $db}}');
			}
		}
		,{
		text:'Hapus Hasil Eksport ',
		iconCls: 'fa fa-remove fa-lg',
		handler: function(){
			DeleteFromDB();
			}
		}
	],
    columns:[[
        {field:'description',title:'Deskripsi File',width:100},
		{field:'original_filename',title:'Nama File',width:100,align:'right'},
		{field:'created_at',title:'Tanggal Upload',width:100,align:'right'},
		{field:'email',title:'di Upload oleh',width:100,align:'right'},
        {field:'import.status_import',title:'Status Import',width:100,align:'right', styler:cellStyler},
        {field:'import.user.email',title:'di Import Oleh ',width:100,align:'right', styler:cellStyler},
        {field:'eksport.status_eksport',title:'Status export',width:100,align:'right', styler:cellStyler},
        {field:'eksport.link_file',title:'Download File ',width:100,align:'right', styler:cellStyler},
        {field:'eksport.user.email',title:'di Eksport Oleh ',width:100,align:'right', styler:cellStyler},
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
function DetailDataDB(url,title){
		console.log(url);
			var row = $('#dx-datagrid-DB').datagrid('getSelected');
			if (row.import  && row.import.status_import){
			// if (row){
			// $.messager.alert('Info', row.filename+":"+row.original_filename+":"+row.attr1);
			// console.log(title);
			// console.log(row.original_filename);
			console.log(row.import.files_id);
			$('#dialog-x').dialog({
							title: 'Preview Database',
							width: 1000,
							height: 500,
							modal:true,showType:'slide',
							href: url+'/'+row.import.files_id,
							buttons:[
								// {
								// text:'Upload !',
								// handler:function (a){
								// $(this).attr('disabled', 'disabled');

								// 	// $('#UploadExcel').form('submit',{  
								// 	// 	success: function(data){
								// 	// 		var result=$.parseJSON(data);
								// 	// 		console.log(result);
								// 	// 		$('#UploadExcel').form('reset');
								// 	// 		$('#dialog-x').dialog('close');
								// 	// 		$('#dx-datagrid-DB').datagrid('reload');
								// 	// 		$.messager.alert('Info', result.msg, 'info');
								// 	// 	} 
								// 	// });
								// 	}
								// },
								{
								text:'Close !',
								handler:function(){
									$('#dialog-x').dialog('close');
								}
							}]
						}).dialog('center');	

		
			}
			else{
				$.messager.alert('Info', 'File ini belum di Import , Ok ! ', 'info');
			}
		}


function DeleteFromDB(){
	var row = $('#dx-datagrid-DB').datagrid('getSelected');
	console.log(row );
	if (row){
		$.messager.confirm('Confirm','Apakah anda benar-benar ingin menghapus hasil export ini ?',function(r){
			if (r){
				// $.post('{{ $url['anyDeleteTable'] }}',{filename:row.filename,id:row.id},function(result){
				$.post('{{ $url['anyDeleteTable'] }}',{filename:row.eksport.nama_file,file_id:row.id},function(result){
					var data = $.parseJSON(result);
					console.log(data.msg);
					$('#dx-datagrid-DB').datagrid('reload');	// reload the user data
						// $('#ListDbResulted').datagrid('reload');	// reload the user data
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

</script>