

	<div class="easyui-panel" title="Form Upload {{ '' or '--' }}" style="padding:10px;">
		<form id="ff" action="{{ route('bidang.u')}}" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<table class="dataTable">
				<tr>
					<td>Name:</td>
					<td>: <input name="name" class="f1 easyui-textbox"></input></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>: <input name="email" class="f1 easyui-textbox" ></input></td>
				</tr>
				<tr>
					<td>Phone:
					<td>: <input name="phone" class="f1 easyui-textbox"></input></td>
				</tr>
				<tr>
					<td>File:</td>
					<td>{{-- <input name="file" class="f1 easyui-filebox"></input> --}}
						: <input class="easyui-filebox" name="excelF" style="width:70%">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Submit"></input><input type="reset" value="Reset"></input></td>
				</tr>
			</table>
		</form>
	</div>
	<style scoped>
		.f1{
			width:100%;
		}
	</style>
	<script type="text/javascript">
		$(function(){
			$('#ff').form({
				success:function(data){
					var result=$.parseJSON(data);
					console.log(result);
					$('#ff').form('reset');
					$('#ListData').datagrid('reload');
					// if(200 == result.code){
						// alert(result.code);
					// }
						// $.form('reset');
						$.messager.alert('Info', result.msg, 'info');
					}
				});
		});
	</script>