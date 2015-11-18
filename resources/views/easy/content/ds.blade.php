<div class="easyui-layout" id="dds" data-options="fit:true">
	<div data-options="region:'center'">
	
		<div id="tt" class="easyui-tabs" fit="true">
			<div title="Daftar Data SKPD">

				<table id="contentCenter" fit="true" style="widht: 1000px;" >
				</table>
			</div>
		</div>
	

		</div>

		<div data-options="region:'south',split:true " style="height:200px;" > 
			<div class="easyui-tabs"  data-options="fit:true">
				<div title="Form Tambah SKPD" id="formBottom"  style="padding:3px 0px 0px 10px; "  data-options="">
					<div id="formBottom" style=""  >
						<form id="F-INPUT" method="post" action="{{route('skpd.store')}}">
							<input type="hidden" name="id" value="">	
							<div id="ForInput" style="width:70%; display:inline-block; float:left; ">
								<div style="padding: 2px 0px 10px 10px;">
									<label for="nama_skpd" style="display:inline-block; width: 20%">Nama SKPD  </label>

									: <input class="easyui-validatebox" type="text" name="nama_skpd" data-options="required:true" />

								</div>
								<div style="padding: 2px 0px 10px 10px;"> 
									<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Singkatan  </label>

									: <input class="easyui-validatebox" type="text" name="nama_singkat_skpd" data-options="validType:'email'" />

								</div>
							</div>

							<div id="ForButton" style="padding: 2px 0px 10px 10px; display:inline-block;  border:solid;padding:0px 20px 0px 0px;">
							<a id="simpan" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Simpan</a>
							<a id="close" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Close</a>
								<!-- <input type="submit" value="Simpan"> -->
								<!-- <input type="button" value="close"  id="close"> -->
							</div>

						</form>

					</div>


				</div>

			</div>


		</div>
	</div>
</div>

<script type="text/javascript">
	
/* setting loading page=================================================================*/
	var toolbarx=[
	{
		text:'Tambah',
		iconCls: 'add icon-add',
		handler: function(){
			// alert('tambah');
					$('#dds').layout('expand','south');
					 $('#F-INPUT').form('reset');

	

			}
		},{
			text:'Koreksi',
			iconCls: 'icon-remove',
			handler: function(){
				var row = $('#contentCenter').datagrid('getSelected');
				// var url='google.com'
				if (row){
				 	console.log(row.id);
					 $('#F-INPUT').form('load',row);
					 $('#dds').layout('expand','south');
				    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
				}
			}
		},{
			text:'Refresh',
			iconCls: 'icon-remove',
			handler: function(){
				$('#contentCenter').datagrid('reload'); 
			}
		},{
			text:'Hapus',
			iconCls: 'icon-remove',
			handler: function(){
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
		}
		];
	
	$('#contentCenter').datagrid(
	{
		url:'{{route('skpd.data')}}',
	// title:'Daftar Detail SKPD',
	toolbar: toolbarx,
		columns:[[
		// {field:'productid',title:'No',width:200},
		{field:'nama_skpd',title:'Nama SKPD ',width:20},
		{field:'nama_singkat_skpd',title:' Nama Singkat SKPD'}
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
	$('#content-x').find('.easyui-layout').layout()
	$('#content-x').find('.easyui-linkbutton').linkbutton()
	$('#content-x').find('.easyui-tabs').tabs()
	$('#dds').layout('collapse','south');

	/* form button handel============================================================================*/
	$(function(){
	    $('#close').bind('click', function(){
					$('#dds').layout('collapse','south');
	        // alert('easyui');
	    });
	    $('#simpan').bind('click', function(){
	        alert('simpan');
	        	$('#F-INPUT').form('submit',{  
	        							success: function(result){

	        								if (result.code ==  200 ){
	        									$.messager.show({  
	        										title: 'Status',  
	        										msg: 'Data SKPD Berhasil Dimasukkan !'  
	        									});
	        									// $('#this').dialog('close')
	        									$('#contentCenter').datagrid('reload');
	        								}
	        								else {
	        									$('#contentCenter').datagrid('reload');
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