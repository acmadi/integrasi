<div class="easyui-layout" id="duk" data-options="fit:true">
			<div data-options="region:'center'">
				<div id="tt" class="easyui-tabs" fit="true">
				<div title="Daftar Unit Kerja">
				
				<table id="contentCenter" fit="true" style="widht: 10000px;" >
				</table>
				</div>
				</div>
			</div>
			<div data-options="region:'south',split:true" style="height:200px;"> 
				<div class="easyui-tabs"  data-options="fit:true">
					<!-- form ================================================= -->
					<div title="Form Data Unit Kerj" id="formBottom"  style="padding:3px 0px 0px 10px"  data-options="">
						<div id="formBottom" style=""  >
							<form id="F-INPUT" method="post">
								<input type="hidden" name="id">
								<div id="ForInput" style="width:70%; display:inline-block; float:left; ">
									<div style="padding: 2px 0px 10px 10px;">
										<label for="nama_skpd" style="display:inline-block; width: 20%">Nama SKPD  </label>:

										<input id="cc_skpd2" name="skpd_id" style="width:700px" class="easyui-combobox" >
									</div>
									<div style="padding: 2px 0px 10px 10px;"> 
										<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Unit Kerja : </label>
										
										<input class="easyui-validatebox" type="text" name="nama_unit_kerja" data-options="validType:'email',required:true" style="width:700px" />
									</div>
									<div style="padding: 2px 0px 10px 10px;"> 
										<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Singkat Unit Kerja : </label>
										
										<input class="easyui-validatebox" type="text" name="nama_singkat_unit_kerja" data-options="validType:'email',required:true" />
									</div>
								</div>

								<div id="ForButton" style="padding: 2px 0px 10px 10px; display:inline-block;  border:solid;padding:0px 20px 0px 0px;">

								<a id="simpan" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Simpan</a>
								<a id="close" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Close</a>
									<!-- <input type="button" value="Simpan"> -->
									<!-- <input type="button" value="Close"> -->
								</div>

							</form>

						</div>


					</div>

				</div>


			</div>
		</div>


		<!-- datagrid toolbarrrr ================================================== -->
		<div id="tb" style="padding:5px;height:auto">
			<div style="margin-bottom:5px">
				<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:FormTambah();">Tambah </a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="javascript:AksiKoreksi();"> Koreksi</a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:AksiHapus();" >Hapus</a>
			</div>
			<div>
				Nama SKPD :   
				<input id="cc_skpd" class="easyui-combobox" style="width:700px"
				
				>
			</div>
		</div>
		<script type="text/javascript">
			
	
			$('#content-x').find('.easyui-combobox').combobox({
					url:'combobox_data.json',
					valueField:'id',
					textField:'text',
					onSelect: function(rec){
						alert('selected')
					// var url = 'get_data2.php?id='+rec.id;
					// $('#cc2').combobox('reload', url);
				}
			}
			)
			function FormTambah() {
					$('#duk').layout('expand','south');
				
			}
			function AksiHapus() {
							var row = $('#contentCenter').datagrid('getSelected');
						var url='google.com'
						if (row){
						 	console.log(row.id);
						 	var url=''
						 	$.post(url, function(data, textStatus, xhr) {
						 		/*optional stuff to do after success */
						 		
						 	});
						    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
						}
				
			}
			function  AksiKoreksi(argument) {
					var row = $('#contentCenter').datagrid('getSelected');
						var url='google.com'
						if (row){
						 	console.log(row.id);
							 $('#F-INPUT').form('load', url+row.id);
						    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
						}
			}
			
		$('#contentCenter').datagrid(
		{
			url:'{{route('unit-kerja.data')}}',
			// title:'Daftar Unit Kerja',
			toolbar: '#tb',
			columns:[[
		// {field:'productid',title:'No',width:200},
		{field:'nama_skpd',title:'Nama SKPD ',width:20},
		{field:'nama_unit_kerja',title:'Nama SKPD ',width:20},
		{field:'nama_unit_kerja',title:'Nama SKPD ',width:20},
		{field:'nama_singkat_unit_kerja',title:'Nama SKPD ',width:20}
		// {field:'productname',title:'Singkatan'}
		]],
		// height: 200,
		pagination : true,
		// remoteSort:true,
		rownumbers : true,
		singleSelect:true,
		striped:true, 
		collapsible:true,
		autoRowHeight:true,
		fitColumns:true
		// scrollbarSize:10,
		// pageSize:10
	});

	// $('#cc_skpd, #cc_skpd2').combobox({
	// 	url:'combobox_data.json',
	// 	valueField:'id',
	// 	textField:'text',
	// 	onSelect: function(rec){
	// 		alert('selected')
	// 		// $.get(url,function(data) {
	// 		// 	optional stuff to do after success 
				
	// 		// });
	// // var url = 'get_data2.php?id='+rec.id;
	// // $('#cc2').combobox('reload', url);
	// 	}

	// });
			$('#content-x').find('.easyui-layout').layout()
			$('#content-x').find('.easyui-linkbutton').linkbutton()
			$('#content-x').find('.easyui-tabs').tabs()
			$('#duk').layout('collapse','south');

/* handle submit form======================================*/
$(function(){
    $('#close').bind('click', function(){
    	// alert('close')
				$('#duk').layout('collapse','south');
        // alert('easyui');
    });
    $('#simpan').bind('click', function(){
        alert('simpan');
        alert('simpan');
        	$('#F-INPUT').form('submit',{  
        							success: function(result){
        								if (result == "this"){
        									$.messager.show({  
        										title: 'Status',  
        										msg: 'Data Berhasil Dimasukkan !'  
        									});
        									// $('#this').dialog('close')
        									$('#contentCenter').datagrid('reload');
        								}
        								else {
        									$.messager.show({  
        										title: 'Status',  
        										msg: result  
        									});
        								} 
        							} 
        						});
    });
});
		</script>