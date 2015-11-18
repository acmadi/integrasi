<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Complex Layout - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('jquery-easyui-1.4.3/themes/default/easyui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('jquery-easyui-1.4.3/themes/icon.css')}}">

	<script type="text/javascript" src="{{ asset('jquery-easyui-1.4.3/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('jquery-easyui-1.4.3/jquery.easyui.min.js')}}"></script>
	<style type="text/css" media="screen">
		input, .easyui-filebox{
			max-width:70%;
		}
		tr > td {
			padding:20px 0 0 20px;
		}
		.stripe1{
			background: rgba(0, 0, 0, 0) url("../images/page_bg.jpg") repeat scroll 0 0;
		}
	</style>
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$(".dataTable tr:even").addClass("stripe1");
		$(".dataTable tr:odd").addClass("stripe2");
		$(".dataTable tr").hover(
			function() {
				$(this).toggleClass("highlight");
			},
			function() {
				$(this).toggleClass("highlight");
			}
			);
		</script>
	</head>
<body><!-- 
	<h2>Complex Layout</h2>
	<p>This sample shows how to create a complex layout.</p>
	<div style="margin:20px 0;"></div>
	<div class="easyui-layout" style="width:700px;height:350px;">
		<div data-options="region:'north'" style="height:50px"></div>
		<div data-options="region:'south',split:true" style="height:50px;"></div>
		<div data-options="region:'east',split:true" title="East" style="width:180px;">
			<ul class="easyui-tree" data-options="url:'tree_data1.json',method:'get',animate:true,dnd:true"></ul>
		</div>
		<div data-options="region:'west',split:true" title="West" style="width:100px;">
			<div class="easyui-accordion" data-options="fit:true,border:false">
				<div title="Title1" style="padding:10px;">
					content1
				</div>
				<div title="Title2" data-options="selected:true" style="padding:10px;">
					content2
				</div>
				<div title="Title3" style="padding:10px">
					content3
				</div>
			</div>
		</div>
		<div data-options="region:'center',title:'Main Title',iconCls:'icon-ok'">
			<div class="easyui-tabs" data-options="fit:true,border:false,plain:true">
				<div title="About" data-options="href:'_content.html'" style="padding:10px"></div>
				<div title="DataGrid" style="padding:5px">
					<table class="easyui-datagrid"
							data-options="url:'datagrid_data1.json',method:'get',singleSelect:true,fit:true,fitColumns:true">
						<thead>
							<tr>
								<th data-options="field:'itemid'" width="80">Item ID</th>
								<th data-options="field:'productid'" width="100">Product ID</th>
								<th data-options="field:'listprice',align:'right'" width="80">List Price</th>
								<th data-options="field:'unitcost',align:'right'" width="80">Unit Cost</th>
								<th data-options="field:'attr1'" width="150">Attribute</th>
								<th data-options="field:'status',align:'center'" width="50">Status</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
-->
<div style="">

	<div id="cc" class="easyui-layout" style="padding:30px;min-width:100%;height:900px; margin:auto;">
		<div data-options="region:'north',title:'North Title',split:true" style="height:100px;"></div>
		<div data-options="region:'south',title:'South Title',split:true" style="height:100px;"></div>
		<div data-options="region:'east',title:'East',split:true" style="width:200px;"></div>

		<div data-options="region:'west',title:'West',split:true" style="width:300px;">
			<div class="easyui-accordion" style="float:left;width:300px;">

				<div title="Manage DB Bidang"data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
					<div title="TreeMenu"  data-options="iconCls:'icon-search'" style="padding:0px;">
						<ul class="easyui-tree menuKiri" id="menu" data-options="url:'{{  route('b.json')}}',method:'get',animaccte:true,dnd:true"></ul>
						{{-- 	<ul class="easyui-tree menuKiri"  >
						<li data-options="iconCls:'icon-surat_perintah'">
							<a  href="javascript:void(0);" data-link="iniLIkkkkk" >Rekening</a>
						</li>

					</ul> --}}
				</div>
			</div>

			<div title="Debug Pagee" data-options="iconCls:'icon-grafik'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree menuKiri" id="menu" data-options="url:'{{  route('json')}}',method:'get',animaccte:true,dnd:true"></ul>

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

	<div data-options="region:'center',title:''" style="padding:0px;background:#eee;">
		<div id="tt" class="easyui-tabs" style=";">
			<div title="{{ 'home' }}" style="padding:10px;min-height:600px">
				<?php ///echo $content }}	?>
				@yield('content');
			</div>
			<div title="{{ 'home' }}" style="padding:10px;min-height:600px">
				<?php ///echo $content }}	?>
				@yield('content');
			</div>
			
		</div>
	</div>
</div>
</div>
<hr>
 <!-- <body class="easyui-layout">
     <div data-options="region:'north',title:'North Title',split:true" style="height:100px;"></div>
     <div data-options="region:'south',title:'South Title',split:true" style="height:100px;"></div>
     <div data-options="region:'east',title:'East',split:true" style="width:100px;"></div>
     <div data-options="region:'west',title:'West',split:true" style="width:100px;"></div>
     <div data-options="region:'center',title:'center title'" style="padding:5px;background:#eee;"></div>
 </body> -->
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
 					var panjang=$(event.target).attr('data-link').length;
 					var title =$(event.target).attr('data-title');
 					var idgrid =$(event.target).attr('data-idgrid');
 					
 					console.log(link);
 					console.log(panjang);
 					if(1<=panjang){
 					openx(link,title,idgrid); 
 						
 					}


 					// var product = event.target.id.split('-')[1];
 					// var qty = $("#qty-"+product).val();
 					// return false;
 					// console.log(product);
 					// console.log(qty);
 					// $.ajax({
 					// 	url: '',
 					// 	type: 'POST',
 					// 	 dataType: 'JSON',
 					// 	data: { produk : product, qty: qty },
 					// })
 					// .done(function(result) {
 					// 	$("#mycart").text(result.getSubTotal);
 					// 	console.log(result.getSubTotal);
 					// 	console.log("success");
 					// 	console.log(result);
 					// })
 					// .fail(function(result) {
 					// 	console.log("error");
 					// 	console.log(result);
 					// })
 					// .always(function(result) {
 					// 	console.log("complete");
 					// 	console.log(result);
 					// });
 					// $('body').removeClass().addClass(bodyClass);
 					// $('#switcher button').removeClass('selected');
 					// $(event.target).addClass('selected');
 					event.stopPropagation();
 					
 				}
 				/* Act on the event */
 			});
			$("#toolbar").on('click', function(event) {
				// $("#checkoutCommand").on('click', function  (e) {
					console.log('kiriiii');
					if ($(event.target).is('a')){
						console.log('toolbar');
						var link =$(event.target).attr('data-link');
						var title =$(event.target).attr('data-title');
						console.log(link);
						openx(link,title);
						
					}
				});

function openx( url,title){
	if ($('#tt').tabs('exists',title)){
		$('#tt').tabs('select', title);
	} else {
		$('#tt').tabs('add',{
			title:title,
			href:url,
			closable:true,
			extractor:function(data){
	 										// console.log(data);
	 										// return false;
	 										return data;
	 										data = $.fn.panel.defaults.extractor(data);
	 										// console.log(data);

	 										var tmp = $('<div></div>').html(data);
	 										console.log(tmp);
	 										
	 										data = tmp.find('#content').html();
	 										console.log(data);
	 										tmp.remove();
	 										return data;
	 									}
	 								});
	}
}
});


 // function addTab(title, url){
 // 		if ($('#tt').tabs('exists', title)){
 // 			$('#tt').tabs('select', title);
 // 		} else {
 // 			var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
 // 			$('#tt').tabs('add',{
 // 				title:title,
 // 				content:content,
 // 				closable:true
 // 			});
 // 		}
 // 	}
</script>
</body>
</html>