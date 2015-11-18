<div id="content">

<table id="Editable" class="easyui-datagrid" title="Row Editing in DataGrid" style="width:700px;height:auto"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,
				toolbar: '#EditableTollbar',
				url: '{{ route('bidang.d.u') }}',
				method: 'post',
				onClickCell: onClickCell
			">
		<thead>
			<tr>
				<th data-options="field:'itemid',width:80">Item ID</th>
				<th data-options="field:'productid',width:100,
						formatter:function(value,row){
							return row.productname;
						},
						editor:{
							type:'combobox',
							options:{
								valueField:'productid',
								textField:'productname',
								method:'post',
								url:'{{ route('bidang.d.u') }}',
								required:true
							}
						}">Product</th>
				<th data-options="field:'listprice',width:80,align:'right',editor:{type:'numberbox',options:{precision:1}}">List Price</th>
				<th data-options="field:'unitcost',width:80,align:'right',editor:'numberbox'">Unit Cost</th>
				<th data-options="field:'attr1',width:250,editor:'textbox'">Attribute</th>
				<th data-options="field:'status',width:60,align:'center',editor:{type:'checkbox',options:{on:'P',off:''}}">Status</th>
			</tr>
		</thead>
	</table>

	<div id="EditableTollbar" style="height:auto">
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Append</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">Remove</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()">Accept</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()">Reject</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true" onclick="getChanges()">GetChanges</a>
	</div>
	
	<script type="text/javascript">
		var editIndex = undefined;
		function endEditing(){
			if (editIndex == undefined){return true}
			if ($('#Editable').datagrid('validateRow', editIndex)){
				var ed = $('#Editable').datagrid('getEditor', {index:editIndex,field:'productid'});
				var productname = $(ed.target).combobox('getText');
				$('#Editable').datagrid('getRows')[editIndex]['productname'] = productname;
				$('#Editable').datagrid('endEdit', editIndex);
				editIndex = undefined;
				return true;
			} else {
				return false;
			}
		}
		function onClickCell(index, field){
			if (editIndex != index){
				if (endEditing()){
					$('#Editable').datagrid('selectRow', index)
							.datagrid('beginEdit', index);
					var ed = $('#Editable').datagrid('getEditor', {index:index,field:field});
					($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus();
					editIndex = index;
				} else {
					$('#Editable').datagrid('selectRow', editIndex);
				}
			}
		}
		function append(){
			if (endEditing()){
				$('#Editable').datagrid('appendRow',{status:'P'});
				editIndex = $('#Editable').datagrid('getRows').length-1;
				$('#Editable').datagrid('selectRow', editIndex)
						.datagrid('beginEdit', editIndex);
			}
		}
		function removeit(){
			if (editIndex == undefined){return}
			$('#Editable').datagrid('cancelEdit', editIndex)
					.datagrid('deleteRow', editIndex);
			editIndex = undefined;
		}
		function accept(){
			if (endEditing()){
				$('#Editable').datagrid('acceptChanges');
			}
		}
		function reject(){
			$('#Editable').datagrid('rejectChanges');
			editIndex = undefined;
		}
		function getChanges(){
			var rows = $('#Editable').datagrid('getChanges');
			alert(rows.length+' rows are changed!');
		}
	</script>
</div>