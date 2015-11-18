
<style type="text/css">
	#ff div#ForInput{
	width:100%; display:inline-block; float:left; position:relative; top:50px;
	}
	#ff div#ForInput label{
		display:inline-block; width:25%
	}
	#ff div#ForInput div{
	padding: 2px 0px 10px 10px;
	}
	#ff div#ForInput input{
		width:20%;
	}

</style>

<div id="windowX" fit="true">
 <div class="easyui-layout" data-options="fit:true">
 	<div data-options="region:'center',title:' ',split:true">
 	<div class="easyui-tabs" fit="true" >
 			<div title="Form Data Unit Kerj" id="formBottom"   style="padding:3px 0px 0px 10px"  data-options="">
 				<div id="formBottom" style=""  >
 					<form id="ff" method="post">
 						<div id="ForInput" fit="true"  >
 							<div>
 								<label for="nama_skpd" >Tahun  </label>

 						 		: <input class="easyui-validatebox" type="text" name="idn tahun" data-options="validType:'email',required:true"  />
 							</div>
 							<div >
 								<label for="nama_skpd" >No SPPD  </label>
 								: <input class="easyui-validatebox" type="text" name="no_sppd" id="no_sppd" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tanggal SP2D </label>

 								: <input   class="easyui-combobox" style="width:20%" name="tgl_sppd"> id="tgl_sppd">
 								<label style=" padding:0px 0px 0px 30px; display:inline-block; width:25%" for="nama_singkat">Jenis SP2D </label>

 								: <input  name="jenis_sppd_id" id="jenis_sppd_id" class="easyui-combobox" style="width:20%" >
 							</div>
 							<div > 
 								<label for="nama_singkat">Nama SPKD : </label>
 							: <input  name="skpd_id" id="skpd_id" class="easyui-combobox" style="width:20%" >
 							</div>
 							<div > 
 								<label for="nama_singkat">Penerima SP2D : </label>
 								: <input  name="penerima" id="penerima"  class="easyui-combobox" style="width:20%" >
 							</div>
 							<div > 
 								<label for="nama_singkat">Keperluan </label>: 
 								<textarea cols="40" name="keperluan" id="keperluan" rows=""></textarea>
 							</div>
 							<div > 
 								<label for="nama_singkat">No. SPM 	: </label>
 								: <input class="easyui-validatebox" type="text" name="no_spm" id="no_spm" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. SPM : </label>
								: <input  name="tgl_spm" id="tgl_spm" class="easyui-combobox" style="width:20%" >
 							</div>
 							<div > 
 								<label for="nama_singkat">SMP Diajukan : </label>
 								: <input class="easyui-validatebox" type="text" name="spm_diajukan" id="spm_diajukan" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Potongan : </label>
 								: <input class="easyui-validatebox" type="text" name="potongan" id="potongan" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">SPM Sebenarnya: </label>
 								: <input class="easyui-validatebox" type="text" name="spm_benar" id="spm_benar" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. Pengantar : </label>
 								: <input   class="easyui-combobox" style="width:20%" name="tgl_pengantar" id="tgl_pengantar" >
 								<label for="nama_singkat">Tgl. Diterima : </label>
 								: <input   class="easyui-combobox" style="width:20%" >
 							</div>
 							<div > 
 								<label for="nama_singkat">No. Agenda : </label>
 								: <input class="easyui-validatebox" type="text" name="no_agenda" id="no_agenda" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. acc KASI : </label>
								: <input  name="tgl_acc_kasi" id="tgl_acc_kasi" class="easyui-combobox" style="width:20%" >
								<label for="nama_singkat">Tgl. acc KABID : </label>
								: <input  name="tgl_acc_kabid" id="tgl_acc_kabid" class="easyui-combobox" style="width:20%" >
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. acc KADIS : </label>
								: <input  name="tgl_acc_kadis" id="tgl_acc_kadis" class="easyui-combobox" style="width:20%" >
 							</div>
 							
 							<div > 
 								<label for="nama_singkat">Keterangan : </label>
 								: <input class="easyui-validatebox" type="text" name="keterangan" id="keterangan" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Nama Dokumen : </label>
 								: <input class="easyui-validatebox" type="text" name="nama_dokumen" id="nama_dokumen" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. Referensi : </label>
 								: <input  name="tgl_referensi" id="tgl_referensi" class="easyui-combobox" style="width:20%" >
 								<label for="nama_singkat">No. Rak : </label>
 								: <input class="easyui-validatebox" type="text" name="no_rak" id="no_rak" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">No. Boks : </label>
 								: <input class="easyui-validatebox" type="text" name="no_boks" id="no_boks" data-options="validType:'email',required:true"  />
 								<label for="nama_singkat">No. Map : </label>
 								: <input class="easyui-validatebox" type="text" name="no_map" id="no_map" data-options="validType:'email',required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat"> </label>
 								: <input class="easyui-validatebox" type="checkbox" name="tambah" id="tambah" data-options="validType:'email',required:true" /> Tambah Dokumen Lagi
 							</div>
	 						<!-- Button============================================== -->
 						</div>
	 						<div  style="background: none repeat scroll 0 0 #e0ecff;
							    display: inline-block;
							    height: 20px;
							    left: 0;
							    margin: 1px;
							    padding: 10px;
							    position: absolute;
							    top: 58px;
							    width: 94%;">
	 							<input type="button" value="Simpan">
	 							<hr>
	 						</div>


 					</form>

 				</div>


 			</div>

 		</div>

 	</div>
 	<div data-options="region:'east',title:' ',split:true" style="width:50%">


 	</div>
 </div>
 </div>

<script>
function submitForm(){
$('#entryDokSPPD').form('submit');
}
function clearForm(){
$('#entryDokSPPD').form('clear');
}

$('#windowX').find('.easyui-combobox').combobox()
$('#windowX').find('.easyui-validatebox').validatebox()
$('#windowX').find('.easyui-layout').layout()
$('#windowX').find('.easyui-linkbutton').linkbutton()
$('#windowX').find('.easyui-tabs').tabs()
$('#windowX').window({
title:'Form Input Dokumen SPPD',
height:400,
modal:true
});
</script>