
	<script type="text/javascript">
		$('input#hh').focus();
	</script>

	
		<form id="UploadExcel" action="{{ $url}}" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<table class="dataTable">
			
				<tr>
					<td>Deskripsi File
					<td>: <input name="description" class="f1 easyui-textbox" type="textarea"></input></td>
				</tr>
				<!-- <tr>
					<td>
					<td>: <input name="phone" class="f1 easyui-textbox"></input></td>
				</tr> -->
				<tr>
					<td>File:</td>
					<td>: <input class="f1 easyui-filebox" name="excelF" >
					</td>
				</tr>
				{{-- <tr>
					<td></td>
					<td><input type="submit" value="Submit"></input><input type="reset" value="Reset"></input></td>
				</tr> --}}
			</table>
		</form>

	<style >
		.f1{
			width:500px;
		}
	</style>
	 <script type="text/javascript">
		// $(function(){
		// 	$('#FormUploadExcel-{{ $UnikId }}').form({
		// 		success:function(data){
		// 			var result=$.parseJSON(data);
		// 			console.log(result);
		// 			$('#FormUploadExcel-{{ $UnikId }}').form('reset');
		// 			$('#ListData-{{ $UnikId }}').datagrid('reload');
		// 			// if(200 == result.code){
		// 				// alert(result.code);
		// 			// }
		// 				// $.form('reset');
		// 				$.messager.alert('Info', result.msg, 'info');
		// 			}
		// 		});
		// });
	 </script>