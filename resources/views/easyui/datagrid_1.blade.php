@section('content')
	<h2>Add search functionality in DataGrid</h2>
	<div class="demo-info" style="margin-bottom:10px">
		<div class="demo-tip icon-tip">&nbsp;</div>
		<div>Enter search values and press search button.</div>
	</div>

	<table id="tt" class="easyui-datagrid" style="width:700px;height:250px"
	url="datagrid24_getdata.php"
	title="Searching" iconCls="icon-search" toolbar="#tb"
	rownumbers="true" pagination="true">
	<thead>
		<tr>
			<th field="itemid" width="80">Item ID</th>
			<th field="productid" width="120">Product ID</th>
			<th field="listprice" width="80" align="right">List Price</th>
			<th field="unitcost" width="80" align="right">Unit Cost</th>
			<th field="attr1" width="200">Attribute</th>
			<th field="status" width="60" align="center">Stauts</th>
		</tr>
	</thead>
</table>
<div id="tb" style="padding:3px">
	<span>Item ID:</span>
	<input id="itemid" style="line-height:26px;border:1px solid #ccc">
	<span>Product ID:</span>
	<input id="productid" style="line-height:26px;border:1px solid #ccc">
	<a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
</div>
<script type="text/javascript">
	function doSearch(){
		$('#tt').datagrid('load',{
			itemid: $('#itemid').val(),
			productid: $('#productid').val()
		});
	}
</script>
@endSection