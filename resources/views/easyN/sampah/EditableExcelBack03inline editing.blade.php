<div id="content">
{{-- <table id="editable"></table>
	<script type="text/javascript">
		$('#editable').datagrid({
			url:'{{asset('datagrid_data1.json')}}',
			columns:[[
			{field:'code',title:'Code',width:100},
			{field:'name',title:'Name',width:100},
			{field:'price',title:'Price',width:100,align:'right'}
			]]
		});
	</script> --}}

	{{-- 	<h2>Cell Editing in DataGrid</h2>
		<p>Click a cell to start editing.</p>
		<div style="margin:20px 0;"></div> --}}
		
		<table id="edit" title="Cell Editing in DataGrid" style="max-height:700px"
				data-options="
					iconCls: 'icon-edit',
					singleSelect: true,
					url: '{{asset('datagrid_data1.json')}}',
					method:'get',
					toolbar: '#toolbar'
				">
			<thead>
				<tr>
					<th data-options="field:'itemid',width:80">Item ID</th>
					<th data-options="field:'productid',width:100,editor:'datebox'">Product</th>
					<th data-options="field:'listprice',width:80,align:'right',editor:{type:'numberbox',options:{precision:1}}">List Price</th>
					<th data-options="field:'unitcost',width:80,align:'right',editor:'numberbox'">Unit Cost</th>
					<th data-options="field:'attr1',width:250,editor:'text'">Attribute</th>
					<th data-options="field:'status',width:60,align:'center',editor:{type:'checkbox',options:{on:'P',off:''}}">Status</th>
				</tr>
			</thead>
		</table>

		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton " iconCls="icon-add" plain="true" onclick="newUser('http://192.168.1.132/bidang/form-upload','Form-Upload-Excel' )" data-link="http://192.168.1.132/bidang/form-upload" data-title="Form-Upload-Excel">Upload File Lain</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick=" EditExcel('{{route('bidang.f.i')}}','Excel Editor')">Lihat File</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Hapus File</a>
		</div>

		<script type="text/javascript">
			$.extend($.fn.datagrid.methods, {
				editCell: function(jq,param){
					return jq.each(function(){
						var opts = $(this).datagrid('options');
						var fields = $(this).datagrid('getColumnFields',true).concat($(this).datagrid('getColumnFields'));
						for(var i=0; i<fields.length; i++){
							var col = $(this).datagrid('getColumnOption', fields[i]);
							col.editor1 = col.editor;
							if (fields[i] != param.field){
								col.editor = null;
							}
						}
						$(this).datagrid('beginEdit', param.index);
	                    var ed = $(this).datagrid('getEditor', param);
	                    if (ed){
	                        if ($(ed.target).hasClass('textbox-f')){
	                            $(ed.target).textbox('textbox').focus();
	                        } else {
	                            $(ed.target).focus();
	                        }
	                    }
						for(var i=0; i<fields.length; i++){
							var col = $(this).datagrid('getColumnOption', fields[i]);
							col.editor = col.editor1;
						}
					});
				},
	            enableCellEditing: function(jq){
	                return jq.each(function(){
	                    var edit = $(this);
	                    var opts = edit.datagrid('options');
	                    opts.oldOnClickCell = opts.onClickCell;
	                    opts.onClickCell = function(index, field){
	                        if (opts.editIndex != undefined){
	                            if (edit.datagrid('validateRow', opts.editIndex)){
	                                edit.datagrid('endEdit', opts.editIndex);
	                                opts.editIndex = undefined;
	                            } else {
	                                return;
	                            }
	                        }
	                        edit.datagrid('selectRow', index).datagrid('editCell', {
	                            index: index,
	                            field: field
	                        });
	                        opts.editIndex = index;
	                        opts.oldOnClickCell.call(this, index, field);
	                    }
	                });
	            }
			});

			$(function(){
				$('#edit').datagrid().datagrid('enableCellEditing');
			})
		</script>
</div>