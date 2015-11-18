{{-- <h2>Basic CRUD Application</h2>
	<p>Click the buttons on datagrid toolbar to do crud actions.</p> --}}
	
	<table id="ListData" title="Daftar File Terupload" class="easyui-datagrid" style="width:1000px;"
			url="{{ route('bidang.d.u') }}"
			toolbar="#toolbar" pagination="true"
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
	<div id="toolbar">
	{{-- 	<a href="javascript:void(0)" class="easyui-linkbutton " iconCls="icon-add" plain="true" onclick="newUser()">Tambah iki File Lain</a> --}}
		<a href="javascript:void(0)" class="easyui-linkbutton " iconCls="icon-add" plain="true" onclick="newUser('http://192.168.1.132/bidang/form-upload','Form-Upload-Excel' )" data-link="http://192.168.1.132/bidang/form-upload" data-title="Form-Upload-Excel">Upload File Lain</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick=" EditExcel('{{route('bidang.f.i')}}','Excel Editor')">Lihat File</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Hapus File</a>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">User Information</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>First Name:</label>
				<input name="firstname" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>Last Name:</label>
				<input name="lastname" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>Phone:</label>
				<input name="phone" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>Email:</label>
				<input name="email" class="easyui-textbox" validType="email">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
	</div>
	<script type="text/javascript">
		// var url;
		function newUser(url, title){
			// $('#dlg').dialog('open').dialog('setTitle','New User');
			// $('#fm').form('clear');
			// url = 'save_user.php';
			openx(url,title);
		}
		function openx( url,title){
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
					});
			}
		}
		function EditExcel(url,title){

			var row = $('#ListData').datagrid('getSelected');
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
			var row = $('#ListData').datagrid('getSelected');
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
						$('#dlg').dialog('close');		// close the dialog
						$('#ListData').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function destroyUser(){
			var row = $('#ListData').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
					if (r){
						$.post('destroy_user.php',{id:row.id},function(result){
							if (result.success){
								$('#ListData').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
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