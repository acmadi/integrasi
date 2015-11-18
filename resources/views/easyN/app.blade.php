<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Integrasi File Manager </title>
	<link rel="stylesheet" type="text/css" href="{{ asset('jquery-easyui-1.4.3/themes/default/easyui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('jquery-easyui-1.4.3/themes/icon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/form_style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/font-awesome.min.css')}}">

	<script type="text/javascript" src="{{ asset('jquery-easyui-1.4.3/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('jquery-easyui-1.4.3/jquery.easyui.min.js')}}"></script>
	<script src="{{ asset('asset/jquery.blockUI.js') }}"></script> 
	<style type="text/css" media="screen">

	</style>
	<script type="text/javascript">
	
		</script>
	</head>
<body class="easyui-layout" style="margin-left:10px;margin-right:10px;" data-options="fit:true">
/**  nort,=== snippet ===============================================================================
*/
	<div data-options="region:'north',split:false,border:true" >
		<div style="height:120px ;background:white; padding:2px; margin:0;" class="panel-header">	
			<div style="float:left; padding:0px; margin:0px;">
				<img width="auto" height="71" style="padding:10px 5px 3px 10px; margin:0;" src="{{asset('asset/images/logoa.png')}}">
			</div>
			<div style="float:left; line-height:3px; margin-top:0px; padding:2px 5px;" class="judul">
				<h1 style="padding-top:10px;"> {{ Session::get('nama_instansi') }}</h1>
				<p style="padding-top:10px;"><b>{{ Session::get('nama_singkat_instansi') }}</b></p>
				<p style="padding-top:10px;">Group  : {{ Session::get('group') }}</p>
			</div>
			<div style="float:right; line-height:3px; text-align:center;padding: 10px;">
				<br><br>
				<h1>Apilkasi Integrasi</h1>
				<p>.::  ::.</p>
			</div>
		</div>
		<div style="position: absolute; bottom: 0px;padding : 2px;" fit="true" class="panel-header">
			<div style="float:left;">

				<a id="home" href="#" style="width:100px;" > <i class="fa fa-home fa-lg"> Home </i></a>
				@if (Sentry::check())
					<a id="logout" href="#" style="width:100px;" ><i class="fa fa-power-off fa-lg">  Logout</i>  </a>
				@else
					<a id="login" data-link="{{ route('sentinel.login') }}" href="#" style="width:100px;">Login</a>
					<a id="register" data-link="{{ route('sentinel.register.form') }}" href="#" style="width:100px;">Register</a>
				@endif
			</div>
			<div style="float:right; padding-top:5px;">
				<span id="clock"><font color="#000"></font></span>		
			</div>
		</div>
	</div>
	/**  west / menu ,=== snippet ===============================================================================
	*/
	<div data-options="region:'west',title:'Menu',split:true, collapsible:true" style="width:230px;">
		<div class="easyui-accordion" style="float:left" data-options="fit:true,border:false">

			@if (Sentry::check())
				<div id="profile" title="User Akun" data-options="iconCls:'fa fa-user fa-lg'" style="overflow:auto;padding:0px 15px ;" >

					<div style="padding:5px 0;">
						<a href="#" class="easyui-linkbutton menuKiri" data-link="{{route('sentinel.profile.show')}}"  data-options="iconCls:'fa fa-edit fa-lg'" style="width:100%">{{ Session::get('email') }} Profil</a><br><br>
						<a href="#" class="easyui-linkbutton menuKiri" data-link="{{route('ExtendProfile.editPass.edit')}}" data-options="iconCls:'fa fa-unlock fa-lg'" style="width:100%">Password</a><br>
					</div>
				</div>
			@endif

			@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
				<div id="UAC" title="User Acces Control " data-options="iconCls:'fa fa-users fa-lg'" style="overflow:auto;padding:0px 15px ;">
					<ul class="easyui-tree menuKiri"  data-options="url:'{{  url('json/admin')}}',method:'get',animate:true"></ul>
				</div>
			@endif

			<div title="Manajemen Database" data-options="iconCls:'fa fa-cubes fa-lg'," style="overflow:auto;padding:0px 15px;">
				<ul class="easyui-tree menuKiri"  data-options="url:'{{  route('json')}}',method:'get',animate:true"></ul>

				@if( 'DPPKA' == Session::get('nama_singkat_instansi') or 'Super Admin' == Session::get('nama_singkat_instansi') )
				<ul  class="easyui-tree menuKiri">
				    <li>
				        <span><a style="display:block;width:200px;" data-link="bb.php" data-title="urusan">Alex Menu</a></span>
				    </li>
				</ul>
				@endif

			</div>
		</div>
	</div>
	/**  center as content,=== snippet ===============================================================================
	*/
	<div id="x-content" data-options="region:'center', title:'', split:false, border:true, collapsible:false" >
		<div id="tt" class="easyui-tabs"  data-options="border:false, fit:true">
			<div title="{{ 'home' }}" data-options="iconCls:'fa fa-home fa-lg'" style="padding:10px;">
				Selamat Datang user : {{ Session::get('email') }}, Apllikasi Integrasi
			</div>
			<div id="app" title="{{ 'Applikasi' }}" data-options="iconCls:'fa fa-folder-o fa-lg'" >
				@yield('content')
			</div>
		</div>
	</div>
	/**  south bawah / footer ,=== snippet ===============================================================================
	*/
	 <div data-options="region:'south',split:false" style="height:20px;"></div>
/**  widget ,=== snippet ===============================================================================
*/
	<div id="dialog-x"></div>
	<div id="windowA"></div>

 <script type="text/javascript">
 	$(document).ready(function() {
 		function formatlink(node){
			return '<a href=\'#\' data-link=\''+node.url+'\' > ' + node.text + '</a>';
				}

			$('#menu').tree({
				onLoadSuccess:function  () {
					$('ul li:odd').addClass('zebra_odd');  
					$('ul li:even').addClass('zebra_even'); 
				}
			})
			$('#menu').tree('collapseAll');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				error:function  (result) {
					$.messager.alert('Info', result.responseText, 'error : '+ result.status);
					// console.log(error);
				}
			});

			$(".menuKiri,#UAC,#profil,#register").on('click', function(event) {
			if ($(event.target).is('a') || $(event.target).parents('a').is('a')){
				// console.log('masukkk');
			$(this).attr('disabled', 'disabled');	
				var target = $(event.target).is('a')?event.target:$(event.target).parents('a');

				var text=$(target).text();
				console.log(text);
				var link =$(target).attr('data-link');
				var panjang=$(target).attr('data-link').length;
				var title =$(target).attr('data-title')+'@'+text+'';
				var idgrid =$(target).attr('data-title')+'@'+text+'';

				if(1<=panjang){
				openx(link,title,idgrid); 
				return false;
				}
			}
			});
			$("#toolbar").on('click', function(event) {
					console.log('toolbar');
					if ($(event.target).is('a')){
						console.log('toolbar');
						var link =$(event.target).attr('data-link');
						var title =$(event.target).attr('data-title');
						console.log(title);
						console.log(link);
					}
				});

function openx( url,title){
	        $('#tt').tabs('select', 'Applikasi');
	        		$('#app').block({ overlayCSS: { backgroundColor: '#95b8e7' }, message: 'Silahkan Tunggu!' }); 

	        $.get(url,function (data) {
            
			    if (data.code == 404)
			     {
			     	$.messager.show({title: 'Error Akses', msg: data.msg }); return false;
		        } 
		        if (data.code == 400)
			     {
	                console.log(data);
	                $.messager.alert('Info', data.msg, 'info');
	                location.reload();
		        } 
		        else 
		        {
		          	$("#app").empty();
		        	$("#app").append(data).attr('data-options', "iconCls:'fa fa-folder-o fa-lg'").unblock(); ;
		        	return false;
		        }
	    }) 
	}
	$('#home').linkbutton({
	    plain:true
	});
	$('#logout').linkbutton({
	    plain:true
	});
	$('#login').linkbutton({
	    iconCls: 'icon-search',
	    plain:true
	});
	$('#register').linkbutton({
	    iconCls: 'icon-search',
	    plain:true
	});
	$('#logout').bind('click', function(){
	    $.messager.confirm('Logout', 'Apakah Anda ingin Logout !', function(r){
	    				if (r)
	    				{
	    					$.get('{{ route('sentinel.logout') }}' , function (data) {
	    						location.reload();
	    					});
	    				}
	    			});
	});
	$('#home').bind('click', function(){
		$('#tt').tabs('select', 'home');
	});
	$('#login').bind('click', function(){
		       $('#tt').tabs('select', 'Applikasi');
		location.reload();
	});

});

</script>
</body>
</html>