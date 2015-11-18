<div id="content">

<table id="Editable-{{ $idgrid}}" class="easyui-datagrid" title="Row Editing in DataGrid" style="width:100%;height:auto"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,
				toolbar: '#EditableTollbar-{{ $idgrid}}',
				url: '{{ $re }}',
				method: 'get',
			">
		<thead>
		
			<tr>
				<th data-options="field:'id'">Item ID</th>
				<th data-options="field:'tahun',editor:{type:'numberbox',options:{precision:1}}">tahun</th>
				<th data-options="field:'kd_urusan',align:'right',editor:{type:'numberbox',options:{precision:1}}">kd_urusan</th>
				<th data-options="field:'kd_bidang',align:'right',editor:{type:'numberbox',options:{precision:1}}">kd_bidang</th>
				<th data-options="field:'nm_bidang',width:250,editor:{type:'numberbox',options:{precision:1}}">nm_bidang</th>
				<th data-options="field:'status',align:'center'">status</th>
			</tr>

		</thead>
	</table>

	<div id="EditableTollbar-{{ $idgrid}}" style="height:auto">
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">Batalkan {{ $idgrid}}</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="simpan()">Simpan Ke DB</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Pilih Semua</a>
		{{-- <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()">Jangan Pilih</a> --}}
		{{-- <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true" onclick="getChanges()">GetChanges</a> --}}
	</div>
	
	<script type="text/javascript">
		var editIndex = undefined;
		function endEditing(){
			console.log('endEditing');

			if (editIndex == undefined){return true}
			if ($('#Editable-{{ $idgrid}}').datagrid('validateRow', editIndex)){
				var ed = $('#Editable-{{ $idgrid}}').datagrid('getEditor', {index:editIndex,field:'tahun'});
				console.log(ed);


				
				// var productname = $(ed.target).combobox('getText');
				// $('#Editable-{{ $idgrid}}').datagrid('getRows')[editIndex]['productname'] = productname;
				$('#Editable-{{ $idgrid}}').datagrid('endEdit', editIndex);
				editIndex = undefined;
				return true;
			} else {
				return false;
			}
		}
		function onClickCell(index, field){
			console.log('onClickCell');

			if (editIndex != index){
				if (endEditing()){
					$('#Editable-{{ $idgrid}}').datagrid('selectRow', index)
							.datagrid('beginEdit', index);
					var ed = $('#Editable-{{ $idgrid}}').datagrid('getEditor', {index:index,field:field});
					($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus();
					editIndex = index;
				} else {
					$('#Editable-{{ $idgrid}}').datagrid('selectRow', editIndex);
				}
			}
		}
		function append(){
			console.log('append');
			$('#Editable-{{ $idgrid}}').datagrid('selectAll'); 
			// if (endEditing()){
			// 	$('#Editable-{{ $idgrid}}').datagrid('appendRow',{status:'P'});
			// 	editIndex = $('#Editable-{{ $idgrid}}').datagrid('getRows').length-1;
			// 	$('#Editable-{{ $idgrid}}').datagrid('selectRow', editIndex)
			// 			.datagrid('beginEdit', editIndex);
			// }
		}
		function removeit(){
			$('#Editable-{{ $idgrid}}').datagrid('unselectAll'); 
	
		}
		function simpan(){
			console.log('simpan');
				var ids = [];
			var data = $('#Editable-{{ $idgrid}}').datagrid('getSelections');
				$('#Editable-{{ $idgrid}}').datagrid('unselectAll');
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
			
			// if (endEditing()){
			// 	$('#Editable-{{ $idgrid}}').datagrid('acceptChanges');
			// }
			// $('#Editable-{{ $idgrid}}').datagrid('selectAll'); 

		}
		function reject(){
			console.log('reject');
			// $('#Editable-{{ $idgrid}}').datagrid('rejectChanges');
			$('#Editable-{{ $idgrid}}').datagrid('unselectAll');
			editIndex = undefined;
		}
		function getChanges(){
			console.log('getChanges');
			var rows = $('#Editable-{{ $idgrid}}').datagrid('getChanges');
			alert(rows.length+' rows are changed!');
		}
	</script>
</div>