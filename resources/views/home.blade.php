@extends('easyui.app')


<?php //exit();?>
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
			
				</div>
			</div>
		</div>
	</div>
</div>
@if (isset($content))
    {!! $content !!}
@endif

@endsection

