<div id="windowX" fit="true">
<div class="easyui-layout" id="djs"data-options="fit:true">
	<div data-options="region:'center'">
		<div id="tt" class="easyui-tabs" fit="true">
			<div title="Daftar Jenis SPPD">
				
				<table id="contentCenter" fit="true" style="widht: 10000px;" >
				</table>
			</div>
		</div>
	</div>
	<div data-options="region:'south',split:true" style="height:200px;"> 
		<div class="easyui-tabs"  data-options="fit:true">
			<!-- form ================================================= -->
			<div title="Tambah Data Jenis SPPD" id="formBottom"  style="padding:3px 0px 0px 10px"  data-options="">
			<!-- <input type="hidden" name="id"> -->
				<div id="formBottom" style=""  >
					<form id="F-INPUT" method="post">
							<input type="hidden" name="id">
						<div id="ForInput" style="width:70%; display:inline-block; float:left; ">

							<div style="padding: 2px 0px 10px 10px;"> 
								<label style="display:inline-block; width: 20%"for="nama_jenis_sppd">Nama Jenis SPPD : </label>

								<input class="easyui-validatebox" type="text" name="nama_jenis_sppd" data-options="validType:'',required:true" style="width:700px" />
							</div>
							<div style="padding: 2px 0px 10px 10px;"> 
								<label style="display:inline-block; width: 20%"for="nama_singkat_sppd">Nama Singkat SPPD : </label>

								<input class="easyui-validatebox" type="text" name="nama_singkat_sppd" data-options="validType:'',required:true" />
							</div>
						</div>

						<div id="ForButton" style="padding: 2px 0px 10px 10px; display:inline-block;  border:solid;padding:0px 20px 0px 0px;">
							<!-- <input type="button" value="Simpan" style="display:block; padding:10px 10px 10px 10px; margin: 0px 0px 20px 0px; ">
							<input type="button" value="Close" style="display:block; padding:10px 10px 10px 10px; margin: 0px 0px 20px 0px; "> -->
							<a id="simpan" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Simpan</a><br>
							<a id="close" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Close</a>

						</div>

					</form>

				</div>


			</div>

		</div>


	</div>
</div>
</div>

<!-- datagrid toolbarrrr ================================================== -->
<div id="tb" style="padding:5px;height:auto">
	<div style="margin-bottom:5px">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add"  onclick="javascript:FormTambah();" plain="true">Tambah </a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" onclick="javascript:AksiKoreksi();" plain="true"> Koreksi</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" onclick="javascript:AksiHapus();" plain="true">Hapus</a>
	</div>
	<div>
		Nama SKPD :   
		<input id="cc_skpd" class="easyui-combobox" style="width:700px"

		>
	</div>
</div>
<script type="text/javascript">
	$('#content-x').find('.easyui-layout').layout()
	$('#content-x').find('.easyui-linkbutton').linkbutton()
	function FormTambah() {
			$('#djs').layout('expand','south');
		
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
					 // $('#F-INPUT').form('load', url+row.id);
					 $('#F-INPUT').form('load',row);
					 $('#djs').layout('expand','south');
				    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
				}
	}
	// var toolbarx=[
	// 	{
	// 		text:'Tambah',
	// 		iconCls: 'add icon-add',
	// 		handler: function(){
	// 					$('#duk').layout('expand','south');
	// 					// $('#dds').layout('collapse','south');
	// 			}
	// 		},{
	// 			text:'Koreksi',
	// 			iconCls: 'icon-remove',
	// 			handler: function(){
	// 				// function handler
	// 			}
	// 		},{
	// 			text:'Refresh',
	// 			iconCls: 'icon-remove',
	// 			handler: function(){
	// 				// function handler
	// 			}
	// 		},{
	// 			text:'Hapus',
	// 			iconCls: 'icon-remove',
	// 			handler: function(){
	// 				// function handler
	// 			}
	// 		}
	// 		];		
	$('#contentCenter').datagrid(
	{
		url:'{{ route('jenis-sppd.data')}}',
					// title:'Daftar Unit Kerja',
					toolbar: '#tb',
					columns:[[
			// {field:'productid',title:'No',width:200},
			{field:'nama_jenis_sppd',title:'Jenis SPPD ',width:20},
			{field:'nama_singkat_sppd',title:'Singkatan ',width:20}
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

	$('#cc_skpd, #cc_skpd2').combobox({
		url:'combobox_data.json',
		valueField:'id',
		textField:'text',
		onSelect: function(rec){
			alert('selected')
				// var url = 'get_data2.php?id='+rec.id;
				// $('#cc2').combobox('reload', url);
			}

		});
	$('#content-x').find('.easyui-layout').layout()
	$('#content-x').find('.easyui-linkbutton').linkbutton()
	$('#content-x').find('.easyui-tabs').tabs()
	$('#djs').layout('collapse','south');

	$('#windowX').window({
	title:'Form Input Data Jenis SPPD',
	height:400,
	modal:true,
	cache: false
	});
					$('#djs').layout('collapse','south');
	/* handle form action ==================================================================*/
	    $('#close').bind('click', function(){
	    	// alert('close')
					$('#djs').layout('collapse','south');
	        // alert('easyui');
	    });
	    $('#simpan').bind('click', function(){
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
</script>