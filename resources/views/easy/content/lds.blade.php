<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center'">
				<div id="tt" class="easyui-tabs" fit="true">
				<div title="Daftar Dokumen SPPD">
					<table id="contentCenter" fit="true" style="widht: 10000px;" >
					</table>
				</div>
				</div>
			</div>

		</div>

		<!-- Toolbar==================================================================== -->
		<div id="tb" style="padding:5px;height:auto">
			<div style="margin-bottom:5px">
				<a href="#" class="easyui-linkbutton" iconCls="icon-add" onclick="javascript:TambahDokSPPD('Home');"plain="true">Tambah </a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="javascript:AksiKoreksi();"> Koreksi</a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:Refresh();">Refresh</a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true"  onclick="javascript:LihatDokumen();">Lihat Dokumen</a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:AksiHapus();">Hapus</a>
				<!-- <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Tampilkan Filter Dokumen</a> -->
				<input type="checkbox" id='show'>Tampilkan Filter Dokumen
			</div>
			<div style="padding:5px;height:auto;display:none;" id="formPencarian">
				<form name="pencarian" id="pencarian">
					<div style="display:inline-block; width:10%;">
					<legend title="Pilih">
						<input name="skpd_ck" type="checkbox"> SKPD<br>
						<input name="jenis_sppd_id_ck" type="checkbox"> Jenis SPPD<br>
						<input name="penerima_id_ck" type="checkbox"> Penerima SPPD <br>
						<input name="thn_ck" type="checkbox"> Tahun<br>
						<input name="no_sppd_ck" type="checkbox"> Nomor SPPD<br>
						<input name="keperluam_ck" type="checkbox"> Keperluan<br>
						</legend>
					</div>
					<div style="display:inline-block; width:30%;">
						<!-- <input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px"> -->
						<input name="skpd" type="text" value="skpd"><br>
						<input name="jenis_sppd_id" type="text" value="jenis_sppd_id"><br>
						<input name="penerima_id"   class="easyui-textbox"   style="width:100%" value="penerima_id"><br>
						<input name="thn"   class="easyui-textbox"    style="width:100%" value="thn"><br>
						<input name="no_sppd"   class="easyui-textbox"   style="width:100%" value="no_sppd"><br>
						<input name="keperluam"   class="easyui-textbox"    style="width:100%" value="keperluam"><br>
					</div>
					<div style="display:inline-block; width:30%; position:absolute; top:0px; padding:20px;">
						<a id="cari" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'" tyle="padding:50px;">Close</a>
						<!-- <button type="button" id="cari" onclick="" style="padding:50px;"> Cari</button> -->
					</div>
				</form>
			</div>
		
		</div>

<script type="text/javascript">
function Refresh (argument) {
	$('#contentCenter').datagrid('reload'); 
}
function LihatDokumen (argument) {
	var row = $('#contentCenter').datagrid('getSelected');
	var url='google.com'
	if (row){
	 	console.log(row.id);
	 	var url=''
	 	$('#windowA').window({href:url,
	 			iconCls:'icon-save',
	 			title:'Entry Dokumen SPPD',
	 			modal:true,
	 			cache:false,
	 			onBeforeClose:function  (argument) {
	 				// alert('on before')
	 				// return false

	 			},
	 			onBeforeLoad: function  (param) {
	 				// console.log('onbeforeLoad');
	 				// alert(param)
	 			}
	 		});
	    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
	}
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
		console.log(row);
			var url='google.com'
			if (row){
			 	console.log(row.id);
				 $('#F-INPUT').form('load', url+row.id);
				 $('#windowA').window({href:'entryDokSPPD.html',
				 		iconCls:'icon-save',
				 		title:'Entry Dokumen SPPD',
				 		modal:true,
				 		cache:false,
				 		onBeforeClose:function  (argument) {
				 			// alert('on before')
				 			// return false

				 		},
				 		onBeforeLoad: function  (param) {
				 			// console.log('onbeforeLoad');
				 			// alert(param)
				 		},
				 		onLoad:function  (argument) {
				 			// console.log(argument);
				 			$('#ff').form('load',{
				 				thn:'1999'
				 				// ,
				 				// email:'mymail@gmail.com',
				 				// subject:'subject2',
				 				// message:'message2',
				 				// language:5
				 			});
				 		}

				 	});
				 // $('#windowA').window('refresh');
				 // $('#windowA').window('refresh');
			    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
			}
}
	function TambahDokSPPD () {
	$('#windowA').window({href:'entryDokSPPD.html',
			iconCls:'icon-save',
			title:'Entry Dokumen SPPD',
			modal:true,
			cache:false,
			onBeforeClose:function  (argument) {
				// alert('on before')
				// return false

			},
			onMove:function  (param) {
				// console.log(param);
				// body...
			},
			onBeforeLoad: function  (param) {
				// console.log('onbeforeLoad');
				// alert(param)
			}
		});
	$('#windowA').window('refresh');$('#windowA').window('refresh');
	}


	$('#contentCenter').datagrid(
	{
		url:'{{route('dokumens.data')}}',
		// title:'Daftar Unit Kerja',
		toolbar: '#tb',
		columns:[[
		// {field:'productid',title:'No',width:200},
		{field:'tahun',title:'Tahun ',width:20},
		{field:'no_sppd',title:'No. SPPD ',width:20},
		{field:'tgl_sppd',title:'Tgl. SPPD '},
		{field:'jenis_sppd_id',title:'Jenis SPPD ',width:20},
		{field:'skpd_id',title:'SKPD ',width:20},
		{field:'penerima',title:'Penerima ',width:20},
		{field:'keperluan',title:'Keperluan ',width:20}
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
						$('#content-x').find('.easyui-layout').layout()
						$('#content-x').find('.easyui-linkbutton').linkbutton()
						$('#content-x').find('.easyui-tabs').tabs()


$('#show').change(function() {
    if ($(this).is(':checked')) {
    	 $( "#formPencarian" ).show( "slow" );
        // this.checked = confirm("Are you sure?");
        // $(this).trigger("change");
    }
    else{
    	$( "#formPencarian"  ).slideUp("slow");
    }
});
$.fn.serializeObject = function() {
var o = {};
var a = this.serializeArray();
$.each(a, function() {
    if (this.name.substr(-2) == "[]"){
        this.name = this.name.substr(0, this.name.length - 2);
        o[this.name] = [];
    }

    if (o[this.name]) {
        if (!o[this.name].push) {
            o[this.name] = [o[this.name]];
        }
        o[this.name].push(this.value || '');
    } else {
        o[this.name] = this.value || '';
    }
});
return o;
}
$(function  () {
	    $('#cari').bind('click', function(){
	    		alert('cariiiii');
	    		var data = $( "#pencarian" ).serializeArray();
	    		var xx = new Object()
	    		jQuery.each( data, function( i, result ) {
	    			// console.log(result);
	    			xx[result.name]=result.value
	    			 
	    			

	    		  // $( "#results" ).append( field.value + " " );
	    		});
    			$('#contentCenter').datagrid('load', xx);
	    		// console.log(xx); 
	    		// return false;
	    		// console.log(data);
	    		// console.log({name: 'easyui', address: 'ho'});
	    			
	    			// $('#contentCenter').datagrid('load', {
	    			//     name: 'easyui',
	    			//     address: 'ho'
	    			// });
					// $('#pencarian').form('submit',{  
					// 	success: function(result){
					// 		if (result == "this"){
					// 			$.messager.show({  
					// 				title: 'Status',  
					// 				msg: 'Data Berhasil Dimasukkan !'  
					// 			});
					// 			$('#this').dialog('close')
					// 			$('#this').datagrid('reload');
					// 		}
					// 		else {
					// 			$.messager.show({  
					// 				title: 'Status',  
					// 				msg: result  
					// 			});
					// 		} 
					// 	} 
					// });	        // alert('easyui');
	    });
})
</script>