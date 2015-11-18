<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Full Layout - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/themes/default/easyui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/themes/icon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/demo.css') }}">
	<script type="text/javascript" src="{{ asset('asset/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('asset/jquery.easyui.min.js') }}"></script>



</head>
<body class="easyui-layout">
	<div data-options="region:'north',border:false" style="height:60px;background:#B3DFDA;padding:10px">north region</div>
	<div data-options="region:'west',split:true,title:'West'" style="width:150px;padding:10px;">west content


		


	</div>
	<div data-options="region:'east',split:true,collapsed:true,title:'East'" style="width:100px;padding:10px;">east region</div>
	<div data-options="region:'south',border:false" style="height:50px;background:#A9FACD;padding:10px;">south region</div>
	<div data-options="region:'center',title:'Center'"></div>
</body>
</html>