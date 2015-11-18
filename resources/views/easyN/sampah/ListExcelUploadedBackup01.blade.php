{{-- <h2>Basic CRUD Application</h2>
	<p>Click the buttons on datagrid toolbar to do crud actions.</p> --}}
	
	<table id="ListData-{{ $unikId}}" title="Daftar File Terupload" class="easyui-datagrid" style="width:100%;"
			url="{{ $url['DataUploaded'] }}"
			toolbar="#toolbar-upload-{{ $unikId}}" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="email" >Tahun Anggaran</th>
				<th field="filename" width="0px">Nama File</th>
				<th field="original_filename" >Nama File </th>
				{{-- <th field="firstname" width="50">filename</th> --}}
				<th field="created_at" >Tanggal Upload</th>
				<th field="updated_at" >Tanggal Update</th>
				<th field="updated_at" >Oleh </th>
				{{-- <th field="phone" width="50">Aksi </th> --}}
			</tr>
		</thead>
	</table>
	<div id="toolbar-upload-{{ $unikId}}">

		<a href="javascript:void(0)" class="easyui-linkbutton " iconCls="icon-add" plain="true" onclick="newUpload('{{$url['FormUpload']}}','Form-Upload-Excel' )" data-link="http://192.168.1.132/bidang/form-upload" data-title="Form-Upload-Excel">Upload File Lain</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick=" EditExcel('{{$url['FileImport']}}','Excel Editor')">Lihat File</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteFile()">Hapus File</a>
	</div>

	<script type="text/javascript">
		// var url;
		function newUpload(url, title){
		console.log('newUpload')
		console.trace();
			if ($('#tt').tabs('exists',title)){
				$('#tt').tabs('select', title);
			} else {
				$('#tt').tabs('add',{
					title:title,
					href:url,
					closable:true,
					extractor:function(data){
						return data;
						data = $.fn.panel.defaults.extractor(data);
							// console.log(data);
							var tmp = $('<div></div>').html(data);
							console.log(tmp);
							
							data = tmp.find('#content').html();
							console.log(data);
							tmp.remove();
							return data;
						}
					})
			}
		}
		// function openx( url,title){
		// }
		function EditExcel(url,title){

			var row = $('#ListData-{{ $unikId}}').datagrid('getSelected');
			if (row){
			// $.messager.alert('Info', row.filename+":"+row.original_filename+":"+row.attr1);
			// console.log(row.filename);
			// console.log(url);
			// return false;

			if ($('#tt').tabs('exists',title+'-'+row.filename)){
				$('#tt').tabs('select', title+'-'+row.filename);
			} else {
				$('#tt').tabs('add',{
					title:title+'-'+row.original_filename,
					// href:url+'/'+row.original_filename+'/'+row.filename,
					href:url+'/'+row.filename,

					closable:true,
					extractor:function(data){
						return data;
						data = $.fn.panel.defaults.extractor(data);
						var tmp = $('<div></div>').html(data);
						data = tmp.find('#content').html();
						tmp.remove();
						return data;
					}
				});
				}
			}
		}
		function editUser(){
			var row = $('#ListData-{{ $unikId}}').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = 'update_user.php?id='+row.id;
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						// $('#dlg').dialog('close');		// close the dialog
						$('#ListData-{{ $unikId}}').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function deleteFile(){
			var row = $('#ListData-{{ $unikId}}').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
					if (r){
						$.post('{{ $url['DeleteFile'] }}',{filename:row.filename,id:row.id},function(result){
							var data = $.parseJSON(result);
							console.log(data.msg);
							$('#ListData-{{ $unikId}}').datagrid('reload');	// reload the user data
								// $('#ListData').datagrid('reload');	// reload the user data
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
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>