
<?php // $aksess=$group->akses->toArray(); ?>

    {{-- print_r($actions) --}}
    {{-- dd($group->akses()) --}}{{-- Return hasmany Object  --}}
    {{-- print_r($group->toArray()) --}}{{-- Return data --}}
    {{-- dd($group->akses->toArray()) --}}{{-- one TO Many string(85) "select * from `akses` where `akses`.`group_id` = ? and `akses`.`group_id` is not null"  --}}

     <form id="FormListAkses" method="POST"  action="{{ route('akses.i') }}" accept-charset="UTF-8" style="padding:5px">
    <input class="btn btn-primary" value="Save Changes" onclick="SubmitFormListAkses();" type="button">
     <div style="    max-width: 500px;
    max-height: 400px;
    overflow: scroll;">
     <input name="_token" value="{{ csrf_token() }}" type="hidden">

   
	    <ul>
	    <?php $i=0;?>
	    @foreach($dataakses as $key_action => $action)
	    	<li>
	   		 <!--Controllers : {{ $action['Controllers'] }} methode => {{ $action['methode'] }} -> name --><div style="display:inline-block; width:150px"> {{ $i.' '.$action['name'] }}</div>
	    		
	    		<?php $tanda=0; 
			    		// $id_akses=0; 
			    		$viewakses=0;
	    				//default
	    				// $id_akses='belum ada';
    					$arr_id=$key_action;
    					$table_id=$table_id;
	    				$id_akses=null; 
	    				$aksesvalue=0;
	    		?>
				    	{{-- cocokan  dan manipulasi--}}			
	    			@if(count($aksess))
			    		@foreach($aksess as $akses )
			    			<?php 
			    			//cocokan dengan config table
			    				// echo $table['id'] .'--'.$akses['table_id'] .'<br>';
			    				// if ($table['id']==$akses['table_id']) {
			    					// echo 
			    					$table_id=$akses['table_id'];
			    					// echo 'table_id-- '.$table_id.' -- ';
			    				//$v_id_akses=$akses['id'];
			    					//cocokan dengan config arrayaction
				    				if ($akses['arr_id']== $key_action ){
					    				$id_akses=$akses['id'];
			    					// echo 'id_akses-- '.$id_akses.'<br>';

				    					$viewakses=$akses['akses'];
				    					$arr_id=$akses['arr_id'];
				    					$aksesvalue=$akses['akses'];
				    					break;
				    				}
				    				else{
				    					if ($tanda==0){
					    				//$v_id_akses='belum ada';
				    					$viewakses=$action['akses'];
				    					$arr_id=$key_action;
				    					}

				    				}
				    			// elseif($table['id'] !===$akses['table_id']){

				    			// }
			    				// }
			    			?>
			    		@endForeach
			    	@endIf
	    			<!--Id Akses { dari db } : {{-- $v_id_akses --}} ->
	    			Arr ID Akses : {{ $arr_id }} ->
	    			Akses : {{ $viewakses }} <br>
					-->

			    	<!-- table_id : --> <input type="hidden" name="data[{{ $table_id }}][{{$key_action}}][table_id]" value="{{ $table_id }}">
			    	<!-- Id : --> <input type="hidden" name="data[{{ $table_id }}][{{$key_action}}][id]" value="{{ $id_akses }}">
			    	<!-- group_id:  --><input type="hidden" name="data[{{ $table_id }}][{{$key_action}}][group_id]" value="{{ $group_id }}">
			    	<div style="display:inline-block; width:50px"> akses: </div> <input type="hidden" name="datax[{{ $table_id }}][{{$key_action}}][akses]" value="{{ $aksesvalue }}">
			    	<?php if($aksesvalue == 1){?> 
				    	<input type="radio" name="data[{{ $table_id }}][{{$key_action}}][akses]" value="1" checked > Aktif 
				    	<input type="radio" name="data[{{ $table_id }}][{{$key_action}}][akses]" value="0"> Nonaktif
			    	<?php }else{?>
				    	<input type="radio" name="data[{{ $table_id }}][{{$key_action}}][akses]" value="1"  > Aktif 
				    	<input type="radio" name="data[{{ $table_id }}][{{$key_action}}][akses]" value="0" checked> Nonaktif
			    	<?php }?>
			    	arr_id : <input type="hidden" name="data[{{ $table_id }}][{{$key_action}}][arr_id]" value="{{ $arr_id }}">
			    	<br>
	    	</li> 
	    	<?php $i++?>  	
	    @endForeach
	    </ul>
	    </div>
    </form>
<script type="text/javascript">
function SubmitFormListAkses () {
		$('#FormListAkses').form('submit',{  
								success: function(result){
								  var data = eval('(' + result + ')');
									// if (data == ""){
									// 	$.messager.show({  
									// 		title: 'Status',  
									// 		msg: 'Data Berhasil Dimasukkan !'  
									// 	});
									// 	// $('#FormListAkses').dialog('close')
									// 	// $('#FormListAkses').datagrid('reload');
									// }
									// else {
										$.messager.show({  
											title: 'Status',  
											msg: data.msg  
										});
									// } 
								} 
							});
}
	// $('#FormListAkses').


</script>