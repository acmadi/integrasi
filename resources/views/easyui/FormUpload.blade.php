	<table width="100%" class="list">
		<thead>
	    <tr><td colspan="6" class="btn"><center><b>CONTROL PANEL</b></center></td></tr>
	    </thead>
	    <tbody>
	    <tr><td colspan="6" class="btn"><center><b>CONTROL PANEL</b></center></td></tr>
	    <tr><td colspan="6" class="btn"><center><b>CONTROL PANEL</b></center></td></tr>
	    <tr><td colspan="6" class="btn"><center><b>CONTROL PANEL</b></center></td></tr>
	    <tr><td colspan="6" class="btn"><center><b>CONTROL PANEL</b></center></td></tr>
	    <tr><td colspan="6" class="btn"><center><b>CONTROL PANEL</b></center></td></tr>
	    
	    <tr>
	    	<td align="center" width="20%" class="btn"><a href="rekening"><img src="asset/images/surat_perintah.png"><br>
	        <b>Rekening</b></a>
	        </td>
	        <td align="center" width="20%"><a href="saldo_awal"><img src="asset/images/berita.png"><br>
	        <b>Saldo Awal</b></a>
	        </td>
	        <td align="center" width="20%" class="btn"><a href="jurnal_umum"><img src="asset/images/surat_keputusan.png"><br>
	        <b>Jurnal Umum</b></a>
	        </td>
			<td align="center" width="20%"><a href="jurnal_penyesuaian"><img src="asset/images/surat_keluar.png"><br>
	        <b>Jurnal Penyesuaian</b></a>
	        </td>
	        <td align="center" width="20%" class="btn"><a href="buku_besar"><img src="asset/images/keuangan.png"><br>
	        <b>Buku Besar</b></a>
	        </td>
		</tr>       
		</tbody>
	</table>


		
		<div class="easyui-panel" title="Ajax Form" style="width:300px;padding:10px;">
			<form id="ff" action="{{ route('bidang.u')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table>
					<tr>
						<td>Name:</td>
						<td><input name="name" class="f1 easyui-textbox"></input></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input name="email" class="f1 easyui-textbox"></input></td>
					</tr>
					<tr>
						<td>Phone:</td>
						<td><input name="phone" class="f1 easyui-textbox"></input></td>
					</tr>
					<tr>
						<td>File:</td>
						<td><input name="file" class="f1 easyui-filebox"></input></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Submit"></input></td>
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
						console.log(data);

						// return data;

						$.messager.alert('Info', data, 'info');
					}
				});
			});
		</script>