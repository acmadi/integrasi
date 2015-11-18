<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Administrator</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index, follow">
<meta http-equiv="Copyright" content="achmadi Author">
<meta name="author" content="achmadi Author">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="stylesheet" type="text/css" href="/asset/css/layout.css">
//-------<link href="asset/css/fonts/stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/asset/css/themes/cupertino/easyui.css">
<link rel="stylesheet" type="text/css" href="/asset/css/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/asset/css/smoothness/jquery-ui-1.7.2.custom.css">

//-------<script type="text/javascript" src="asset/js/jquery-1.7.1.min.js"></script>
//-------<script type="text/javascript" src="asset/js/clock.js"></script>
<script type="text/javascript" src="/asset/js/jquery.easyui.min.js"></script>

<!--datepicker-->
<script type="text/javascript" src="/asset/js/ui.core.js"></script>
<script type="text/javascript" src="/asset/js/ui.datepicker-id.js"></script>
<script type="text/javascript" src="/asset/js/ui.datepicker.js"></script>

<!--Polling-->
//-------<script type="text/javascript" src="asset/js/highcharts.js"></script>
//-------<script type="text/javascript" src="asset/js/exporting.js"></script>

<!-- notifikasi -->
//-------<script type="text/javascript" src="asset/js/notifikasi.js"></script>

<script type="text/javascript">
$(function() {
	$("#dataTable tr:even").addClass("stripe1");
	$("#dataTable tr:odd").addClass("stripe2");
	$("#dataTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>

</head>
<body onLoad="goforit()">
<div class="header" style="height:70px;background:white;padding:2px;margin:0;">	
		<div style="float:left; padding:0px; margin:0px;">
        //-------<img src='asset/images/logo_koperasi_85.png' style="padding:0; margin:0;" width="85" height="71">
        </div>
        <div class="judul" style="float:left; line-height:3px; margin-top:0px; padding:2px 5px;">
        <h1><?php echo $instansi;?></h1>
      <p><b><?php echo $usaha;?></b></p>
      <p><?php echo $alamat_instansi;?></p>
      </div>
		<div style="float:right; line-height:3px; text-align:center;">
        <br /><br />
        <h1>Apilkasi <?php echo $nama_program;?></h1>
        <p>.:: Jurnal Umum - Buku Besar - Laporan Laba Rugi ::.</p>
        </div>
	</div>	
	
	<div class="panel-header" fit="true" style="height:21px;padding-top:1px;padding-right:20px">
		<div style="float:left;">
			//-------<a href="home" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-home">Home</a>
            //-------<a href="login/logout" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-logout">Logout</a>
		</div>
		<div style="float:right; padding-top:5px;">
			<?php echo $this->session->userdata('nama_lengkap');?> &rarr;
            <span id="clock"></span>		
		</div>
	</div>
	<!-- awal kiri -->
    <div id="kiri" style="float:left;">
    	<div id="Profil" class="easyui-panel" title="Profil Pengguna" style="float:left;width:170px;height:90px;padding:5px;">
        //-------<img style="float:left;padding:2px;" src="asset/foto_profil/ayah_profile.jpg" width="50" height="50" align="middle" />
        <p style="line-height:15px;">
        <b><?php echo $this->session->userdata('nama_lengkap');?></b><br />
        <a href="#">Edit Profil</a>
        </p>
        </div>		
        <div class="easyui-accordion" style="float:left;width:170px;">
        <div title="Menu" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
			<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
			<ul class="easyui-tree">
				<li data-options="iconCls:'icon-surat_perintah'">
					//-------<a href="rekening">Rekening</a>
				</li>
                <li data-options="iconCls:'icon-surat_keputusan'">
					//-------<a href="saldo_awal">Saldo Awal</a>
				</li>
                <li data-options="iconCls:'icon-surat_keluar'">
					//-------<a href="jurnal_umum">Jurnal Umum</a>
				</li>
                <li data-options="iconCls:'icon-surat_keluar'">
					//-------<a href="buku_besar">Buku Besar</a>
				</li>
                <li data-options="iconCls:'icon-surat_keluar'">
					//-------<a href="jurnal_penyesuaian">Jurnal Penyesuaian</a>
				</li>
                <li data-options="iconCls:'icon-surat_keluar'">
					//-------<a href="tutup_buku">Tutup Buku</a>
				</li>
			</ul>
		</div>
		</div>
        <div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
			<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
			<ul class="easyui-tree">
				<li>
					//-------<span><a href="lap_buku_besar">Buku Besar</a></span>
				</li>
                <li>
					//-------<span><a href="lap_neraca_lajur">Neraca Lajur</a></span>
				</li>
                <li>
					//-------<span><a href="lap_laba_rugi">Laba Rugi</a></span>
				</li>
                <li>
					//-------<span><a href="lap_neraca">Neraca</a></span>
				</li>
			</ul>
		</div>
		</div>
		<div title="Grafik" data-options="iconCls:'icon-grafik'" style="overflow:auto;padding:5px 0px;">
			<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
			<ul class="easyui-tree">
				<li>
					//-------<span><a href="grafik_jurnal">Jurnal</a></span>
				</li>
                <li>
					//-------<span><a href="grafik_buku_besar">Buku Besar</a></span>
				</li>
			</ul>
		</div>
		</div>
		</div>
	</div>       
    <div id="tt" class="easyui-tabs" style="height:570px;">
        <div title="<?php echo $judul;?>" style="padding:10px">
		<?php echo $content;?>	
        </div>
    </div>	
			

<div class="panel-header" fit="true" style="height:20px;text-align:center;">	    
Copyright &copy; <?php echo $instansi;?> 2013.
</div>
</body>
</html>
