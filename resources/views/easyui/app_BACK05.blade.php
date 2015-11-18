
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Halaman Administrator</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="index, follow">
	<meta http-equiv="Copyright" content="Achmadii Author">
	<meta name="author" content="Achmadii Author">
	<meta http-equiv="imagetoolbar" content="no">
	<meta name="language" content="Indonesia">
	<meta name="revisit-after" content="7">
	<meta name="webcrawlers" content="all">
	<meta name="rating" content="general">
	<meta name="spiders" content="all">

	<link rel="stylesheet" type="text/css" href="/asset/css/layout.css">
	<link href="asset/css/fonts/stylesheet.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/asset/css/themes/cupertino/easyui.css">
	<link rel="stylesheet" type="text/css" href="/asset/css/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/asset/css/smoothness/jquery-ui-1.7.2.custom.css">

	<script type="text/javascript" src="asset/js/jquery-1.7.1.min.js"></script>
	{{-- <script type="text/javascript" src="asset/js/clock.js"></script> --}}
	<script type="text/javascript" src="/asset/js/jquery.easyui.min.js"></script>

	<!--datepicker-->
	{{-- <script type="text/javascript" src="/asset/js/ui.core.js"></script> --}}
	{{-- <script type="text/javascript" src="/asset/js/ui.datepicker-id.js"></script> --}}
	{{-- <script type="text/javascript" src="/asset/js/ui.datepicker.js"></script> --}}

	<!--Polling-->
	{{-- <script type="text/javascript" src="asset/js/highcharts.js"></script> --}}
	{{-- <script type="text/javascript" src="asset/js/exporting.js"></script> --}}

	<!-- notifikasi -->
	{{-- <script type="text/javascript" src="asset/js/notifikasi.js"></script> --}}


</head>
<body>
	<div class="header" style="height:70px;background:white;padding:2px;margin:0;">	
		<div style="float:left; padding:0px; margin:0px;">
			<img src='asset/images/logo_koperasi_85.png' style="padding:0; margin:0;" width="85" height="71">
		</div>
		<div class="judul" style="float:left; line-height:3px; margin-top:0px; padding:2px 5px;">
			<h1>{{ $instansi or 'Default'  }}</h1>
			<p><b>{{ $usaha or 'Default'  }}</b></p>
			<p>{{ $alamat_instansi or 'Default'  }}</p>
		</div>
		<div style="float:right; line-height:3px; text-align:center;">
			<br /><br />
			<h1>Apilkasi {{ $nama_program or 'Default'  }}</h1>
			<p>.:: Jurnal Umum - Buku Besar - Laporan Laba Rugi ::.</p>
		</div>
	</div>	
	
	<div class="panel-header" fit="true" style="height:21px;padding-top:1px;padding-right:20px">
		<div style="float:left;">
			@if (Auth::guest())
			<a href="/auth/login" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-login">Login</a>
			<a href="/auth/register" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-register">Register</a>
			@else
			<a href="logout" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-logout">Logout</a>
			@endif
			<a href="home" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-home">Home</a>

		</div>
		<div style="float:right; padding-top:5px;">
			<?php //echo $this->session->userdata('nama_lengkap') }} &rarr;?>
			<span id="clock"></span>		
		</div>
	</div>
	<!-- awal kiri -->
	<div id="kiri" style="float:left;">
		<div id="Profil" class="easyui-panel" title="Profil Pengguna" style="float:left;width:300px;height:90px;padding:5px;">
			<img style="float:left;padding:2px;" src="{{  asset('asset/images/lambang.jpg')}}" width="50" height="50" align="middle" />
			<p style="line-height:15px;">
				<b><?php //echo $this->session->userdata('nama_lengkap') }}</b><br />?>
				<a href="#">Edit Profil</a>
			</p>
		</div>		
		<div class="easyui-accordion" style="float:left;width:300px;">

			<div title="Manage DB Bidang"data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu"  data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree menuKiri" id="menu" data-options="url:'{{  route('b.json')}}',method:'get',animaccte:true,dnd:true"></ul>

					<ul class="easyui-tree menuKiri"  >
						<li data-options="iconCls:'icon-surat_perintah'">
							<a  href="javascript:void(0);" data-link="iniLIkkkkk" >Rekening</a>
						</li>
					
					</ul>
				</div>
			</div>

			

			<div title="Grafik" data-options="iconCls:'icon-grafik'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree menuKiri">
						<li>
							<span><a href="grafik_jurnal">Jurnal</a></span>
						</li>
						<li>
							<span><a href="grafik_buku_besar">Buku Besar</a></span>
						</li>
					</ul>
				</div>
			</div>

		</div>

	</div>       
	<div id="tt" class="easyui-tabs" style="height:570px;">
		<div title="{{ 'home' }}" style="padding:10px">
			<?php ///echo $content }}	?>
			@yield('content');
		</div>
	</div>	


	<div class="panel-header" fit="true" style="height:20px;text-align:center;">	    
		Copyright &copy; {{ $instansi or 'Default'  }} 2013.
	</div>
		<script type="text/javascript">
		$(document).ready(function() {
			// $('#menu').tree({
			// 	onClick: function(node){
			// 		// alert('id menu onclikkkk'); 
			// 		 // alert node text property when clicked
			// 	}
			// });

			// $("body").on('click',  function(event) {
			$(".menuKiri").on('click', function(event) {
			// $("#checkoutCommand").on('click', function  (e) {
					console.log('kiriiii');
					console.log(event);
				
				// event.preventDefault();
				if ($(event.target).is('a')){
					console.log('masukkk');
					var link =$(event.target).attr('data-link');
					console.log(link);


					// var product = event.target.id.split('-')[1];
					// var qty = $("#qty-"+product).val();
					return false;
					console.log(product);
					console.log(qty);
					$.ajax({
						url: '',
						type: 'POST',
						 dataType: 'JSON',
						data: { produk : product, qty: qty },
					})
					.done(function(result) {
						$("#mycart").text(result.getSubTotal);
						console.log(result.getSubTotal);
						console.log("success");
						console.log(result);
					})
					.fail(function(result) {
						console.log("error");
						console.log(result);
					})
					.always(function(result) {
						console.log("complete");
						console.log(result);
					});
					// $('body').removeClass().addClass(bodyClass);
					// $('#switcher button').removeClass('selected');
					// $(event.target).addClass('selected');
					event.stopPropagation();
					
				}
				/* Act on the event */
			});
	});
		</script>
</body>
</html>
