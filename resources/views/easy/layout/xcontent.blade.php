
<div class="easyui-layout" data-options="fit:true">
				<div data-options="region:'center'">
					<div id="tt" class="easyui-tabs" fit="true">
					<div title="Daftar Dokumen SPPD">
						<table id="contentCenter" fit="true" style="widht: 10000px;" >
						</table>
					</div>
					</div>
				</div>

				<div data-options="region:'south',split:true" style="height:200px;"> 
					<div class="easyui-tabs"  data-options="fit:true">
						<!-- form ================================================= -->
						<div title="Daftar Dokumen SPPD" id="formBottom"  style="padding:3px 0px 0px 10px"  data-options="">
							<div id="formBottom" style=""  >
								<form id="ff" method="post">
									<div id="ForInput" style="width:70%; display:inline-block; float:left; ">
										
										<div style="padding: 2px 0px 10px 10px;"> 
											<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Jenis SPPD : </label>
											<input class="easyui-validatebox" type="text" name="nama_singkat" data-options="validType:'email',required:true" style="width:700px" />
										</div>
										<div style="padding: 2px 0px 10px 10px;"> 
											<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Singkat SPPD : </label>
											<input class="easyui-validatebox" type="text" name="nama_singkat_unit_kerja" data-options="validType:'email',required:true" />
										</div>
									</div>

									<div id="ForButton" style="padding: 2px 0px 10px 10px; display:inline-block;  border:solid;padding:0px 20px 0px 0px;">
										<input type="button" value="Simpan" style="display:block; padding:10px 10px 10px 10px; margin: 0px 0px 20px 0px; ">
										<input type="button" value="Close" style="display:block; padding:10px 10px 10px 10px; margin: 0px 0px 20px 0px; ">
									</div>

								</form>

							</div>


						</div>

					</div>


				</div>
			</div>

