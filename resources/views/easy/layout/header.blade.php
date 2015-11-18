@section('header')
<meta charset="UTF-8">
<title>sppd</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- <link rel="stylesheet" type="text/css" href="../../themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="../../themes/icon.css">
<link rel="stylesheet" type="text/css" href="../demo.css"> -->

<link rel="stylesheet" type="text/css" href="{{asset('asset/themes/default/easyui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/themes/icon.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/demo.cs')}}">

<link rel="stylesheet" type="text/css" href="{{asset('asset/fontawesome/css/font-awesome.css')}}">

<script type="text/javascript" src="{{asset('asset/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/jquery.easyui.min.js')}}"></script>

<!-- <script type="text/javascript" src="./assets/js/foundation.min.js"></script>-->
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

</script>
<style type="text/css">
	.fa{
		font-size: 17px;
	}
</style>
@endsection
