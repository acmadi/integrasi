<div style="max-width:100%; max-height:50%; overflow:scroll; font-size:12px">
	    <ul style="list-style-type:none; margin-left:-20px; ">
	    <?php $i=1; ?>
        <li style="margin-bottom:5px;">
            <div style="display:inline-block; text-align:right; width:50%;">
                Nama Aksi
            </div> <div style="display:inline-block; text-align:center; padding:3px; width: 198px; height: 20 px;">Perimisi</div>
        </li>
	    @foreach($config_permits as $key_action => $config_permit)
	    	<li style="margin-bottom:5px;">
	    		<?php $tanda=0; 
			    		//default
			    		$viewakses=0; $arr_id=$key_action; $id_akses=null; $aksesvalue=0; 
                ?>
				    	{{-- cocokan  dan manipulasi untuk disediakan ke view--}}			
	    			<?php if(count($permissions)){ ?>
			    		@foreach($permissions as $akses )
			    			<?php 
                                if ($akses['table_id']== $table_id) {
                                    # code...
                                    if ($akses['arr_id']== $config_permit['arr_id']  ){
                                        $id_akses=$akses['id'];

                                        $viewakses=$akses['akses'];
                                        $arr_id=$akses['arr_id'];
                                        $aksesvalue=$akses['akses'];
                                        break;
                                    }
                                    else{
                                        if ($tanda==0){ //belum ada 
                                        $viewakses=$config_permit['akses'];
                                        $arr_id=$key_action;
                                        }

                                    }
                                }
			    			?>
			    		@endForeach
			    	<?php } ?>
					<div style="display:inline-block; width:50%; text-align:right;">
                     {{-- $i.'. '.$config_permit['ket'].' ('.$config_permit['route_name'].') ' --}}
                     {{ $config_permit['ket'].' .'. $i}}
                     </div>
                    <?php if($aksesvalue == 1){ //echo "-- $aksesvalue --";?> 
                                <input type="hidden" name="data[{{$table_id}}][{{$key_action}}][id]" value="{{ $id_akses }}">
                                <input type="hidden" name="data[{{$table_id}}][{{$key_action}}][table_id]" value="{{$table_id}}">
                                <input type="hidden" name="data[{{$table_id}}][{{$key_action}}][group_id]" value="{{ $group_id}}">
                                <input type="hidden" name="data[{{$table_id}}][{{$key_action}}][arr_id]" value="{{ $arr_id }}">

                                <input style="width:40%;height:20px;" class="easyui-switchbutton" type="checkbox"
                             name="data[{{$table_id}}][{{$key_action}}][akses]"  data-options="onText:'Ijinkan',offText:'Blokir'" checked>
                    <?php }else{?>
                                <input type="hidden" name="data[{{$table_id}}][{{$key_action}}][id]" value="{{ $id_akses }}">
                                <input type="hidden" name="data[{{$table_id}}][{{$key_action}}][table_id]" value="{{$table_id}}">
                                <input type="hidden" name="data[{{$table_id}}][{{$key_action}}][group_id]" value="{{ $group_id}}">
                                <input type="hidden" name="data[{{$table_id}}][{{$key_action}}][arr_id]" value="{{ $arr_id }}">
                    
                                <input style="width:40%;height:20px;" class="easyui-switchbutton" type="checkbox"
                             name="data[{{$table_id}}][{{$key_action}}][akses]" data-options="onText:'Ijinkan',offText:'Blokir'" >
                    <?php }?>
			    	
	    	</li  > 
	    	<?php $i++?>  	
	    @endForeach
	    </ul>

   <!--  </form> -->
    <!-- <input id="sb" style="width:50px;height:30px"> -->
    <!-- <hr> -->
        <!-- <input class="easyui-switchbutton" checked> -->
    <!-- <input style="width:200px;height:30px" class="easyui-switchbutton" data-options="onText:'Ijinkan',offText:'Blokir'" checked> -->
    </div>
    <script type="text/javascript">
    (function(){
    	    // $('#simpan').bind('click', function(){
    	    // 		$(this).attr('disabled', 'disabled');

    	    // 		$('#formPermission').form('submit',{  
    	    // 								success: function(result){
    	    // 									console.log(result);
    	    // 									if (result ){
    	    // 										$.messager.show({  
    	    // 											title: 'Status',  
    	    // 											msg: 'Permisi telah di update'  
    	    // 										});
    	    // 										$('#this').dialog('close')

    	    // 										$('#panelPermission').panel('open').panel('refresh', '{{ url('groups')}}/{{ $group_id }}/edit-permission');
    	    // 										// $('#panelPermission').panel({
    	    // 										//     // width:500,
    	    // 										//     href:'{{ url('groups')}}/'+row.id+'/edit-permission',
    	    // 										//     title:'Edit Permission for Group { '+row.name+' }',
    	    // 										//     tools:[{
    	    // 										//         iconCls:'icon-add',
    	    // 										//         handler:function(){alert('new')}
    	    // 										//     },{
    	    // 										//         iconCls:'icon-save',
    	    // 										//         handler:function(){alert('save')}
    	    // 										//     }]
    	    // 										// }); 

    	    // 									}
    	    // 									else {
    	    // 										$.messager.show({  
    	    // 											title: 'Status',  
    	    // 											msg: result  
    	    // 										});
    	    // 									} 
    	    // 								} 
    	    // 							});
    					// // $('#djs').layout('collapse','south');
    	    // });
    })();

    </script>