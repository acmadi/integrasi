<div id="content">
	<table id="Editable" title="Cell Editing in DataGrid" style="max-height:700px"
	data-options="
	iconCls: 'icon-edit',
	singleSelect: true,
	pagination: true,
	url: '{{ route('bidang.d.u') }}',
	method:'post'
	">
	{{-- url: '{{asset('datagrid_data1.json')}}', --}}
	{{-- toolbar: '#toolbarEditable' --}}
	<thead>
		<tr>
			{{-- <th data-options="field:'itemid',width:80">Item ID</th>
			<th data-options="field:'productid',width:100,editor:'datebox'">Product</th>
			<th data-options="field:'listprice',width:80,align:'right',editor:{type:'numberbox',options:{precision:1}}">List Price</th>
			<th data-options="field:'unitcost',width:80,align:'right',editor:'numberbox'">Unit Cost</th>
			<th data-options="field:'attr1',width:250,editor:'text'">Attribute</th>
			<th data-options="field:'status',width:60,align:'center',editor:{type:'checkbox',options:{on:'P',off:''}}">Status</th> --}}
			
			<th data-options="field:'email',width:80,editor:'textarea'" >Tahun Anggaran</th>
			<th data-options="field:'original_filename',width:80,editor:'text'" >Nama File </th>
			{{-- <th field="firstname" width="50">filename</th> --}}
			<th data-options="field:'created_at',editor:'datebox'">Tanggal Upload</th>
			<th data-options="field:'updated_at',editor:'datebox'">Tanggal Update</th>
			<th data-options="field:'updated_atX',editor:'datebox'">Oleh </th>

			{{-- <th field="email" width="10%">Tahun Anggaran</th> --}}
			{{-- <th field="original_filename" width="10%">Nama File </th> --}}
			{{-- <th field="firstname" width="50">filename</th> --}}
			{{-- <th field="created_at" width="50">Tanggal Upload</th> --}}
			{{-- <th field="updated_at" width="50">Tanggal Update</th> --}}
			{{-- <th field="updated_at" width="50">Oleh </th> --}}
		</tr>
	</thead>
</table>

<div id="toolbarEditable">
	<a href="javascript:void(0)" class="easyui-linkbutton " iconCls="icon-add" plain="true" onclick="newUser('http://192.168.1.132/bidang/form-upload','Form-Upload-Excel' )" data-link="http://192.168.1.132/bidang/form-upload" data-title="Form-Upload-Excel">Upload File Lain</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick=" EditExcel('{{route('bidang.f.i')}}','Excel Editor')">Lihat File</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Hapus File</a>
</div>

<script type="text/javascript">
$(function(){
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


	$('#Editable').datagrid().datagrid('enableCellEditing');
})
</script>
</div>