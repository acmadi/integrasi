<div id="content">

<table id="Editable-{{ $idgrid}}" class="easyui-datagrid" title="Row Editing in DataGrid" style="width:100%;height:auto"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,
				toolbar: '#EditableTollbar-{{ $idgrid}}',
				url: '{{ $route }}',
				method: 'get',

				onClickCell: onClickCell
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
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Append</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">Remove</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()">Accept</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()">Reject</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true" onclick="getChanges()">GetChanges</a>
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

			if (endEditing()){
				$('#Editable-{{ $idgrid}}').datagrid('appendRow',{status:'P'});
				editIndex = $('#Editable-{{ $idgrid}}').datagrid('getRows').length-1;
				$('#Editable-{{ $idgrid}}').datagrid('selectRow', editIndex)
						.datagrid('beginEdit', editIndex);
			}
		}
		function removeit(){
			console.log('removeit');
			if (editIndex == undefined){return}
			$('#Editable-{{ $idgrid}}').datagrid('cancelEdit', editIndex)
					.datagrid('deleteRow', editIndex);
			editIndex = undefined;
		}
		function accept(){
			console.log('accept');
			if (endEditing()){
				$('#Editable-{{ $idgrid}}').datagrid('acceptChanges');
			}
		}
		function reject(){
			console.log('reject');
			$('#Editable-{{ $idgrid}}').datagrid('rejectChanges');
			editIndex = undefined;
		}
		function getChanges(){
			console.log('getChanges');
			var rows = $('#Editable-{{ $idgrid}}').datagrid('getChanges');
			alert(rows.length+' rows are changed!');
		}
	</script>
</div>