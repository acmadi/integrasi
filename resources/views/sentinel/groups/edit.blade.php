<div class="isi">
    <div class="easyui-panel" data-options="style:{borderWidth:0}" tyle="width:400px;padding:30px 70px 20px 70px">
        <form method="POST" onsubmit="return false;"  id="F-INPUT" aaction="{{ route('sentinel.groups.update', $group->hash) }}"  accept-charset="UTF-8">

                <div style="margin-bottom:10px">
                    <label for="name" style="100%; font-size: 20px; width: 100%;" class="labelq">Nama Group:</label><br>
                    <input class="easyui-textbox"  placeholder="Nama Group" data-options="prompt:'Nama Group',iconCls:'icon-man',iconWidth:38"   name="name" type="text"  value="{{ Input::old('name') ? Input::old('name') : $group->name }}"  style="width:100%;height:30px;padding:8px">
                    {{ ($errors->has('name') ? $errors->first('name') : '') }}
                </div>
                <div style="margin-bottom:10px">
                    <label for="Permissions" style="100%; font-size: 20px; width: 100%;" class="labelq">Permissions:</label>

                    <?php $defaultPermissions = config('sentinel.default_permissions', []); ?>
                    @foreach ($defaultPermissions as $permission)
                        <label class="checkbox-inline">
                        <input name="permissions[{{ $permission }}]" value="1" type="checkbox" {{ (isset($permissions[$permission]) ? 'checked' : '') }}>
                        {{ ucwords($permission) }}
                        </label>
                    @endforeach

            <div>
                <input name="_method" value="PUT" type="hidden">
                <br>
                <a href="#" class="easyui-linkbutton" id="update" data-options="iconCls:'icon-ok'" style="width:100%; height:30px;padding:8px">
                    <span style="font-size:14px;">Update Group</span>
                </a>
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <!-- <input class="btn btn-primary" value="Create" id="simpan" type="button"> -->
            </div>
        </form>
    </div>
</div>

<!--         <form id="F-INPUT" method="POST" onsubmit="return false;" action="{{ route('sentinel.groups.update', $group->hash) }}" accept-charset="UTF-8">

            <div>

                <label for="Permissions">Nama Group</label>
                <input class="form-control" placeholder="Name" name="name" value="{{ Input::old('name') ? Input::old('name') : $group->name }}" type="text">
                {{ ($errors->has('name') ? $errors->first('name') : '') }}
            </div>
            <div>

                <label for="Permissions">Permissions</label>
                <?php $defaultPermissions = config('sentinel.default_permissions', []); ?>
                @foreach ($defaultPermissions as $permission)
                <label class="checkbox-inline">
                    <input name="permissions[{{ $permission }}]" value="1" type="checkbox" {{ (isset($permissions[$permission]) ? 'checked' : '') }}>
                    {{ ucwords($permission) }}
                </label>
                @endforeach
            </div>
            <div>

            <label for="Permissions"></label>
                <input name="_method" value="PUT" type="hidden">
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <input id="update" value="Update Group" type="button">
            </div>
        </form> -->
 
<script type="text/javascript">
    $(function(){
 
        // $('#simpan').bind('click', function(){

        //         $('#F-INPUT').form('submit',{  url:'{{ route('sentinel.groups.store') }}',
        //                                 success: function(result){

        //                                     if (result.code ==  200 ){
        //                                         $.messager.show({  
        //                                             title: 'Status',  
        //                                             msg: 'Data SKPD Berhasil Dimasukkan !'  
        //                                         });
        //                                         $('#F-INPUT').form('reset');
        //                                         // $('#this').dialog('close')
        //                                         $('#contentCenter').datagrid('reload');
        //                                     }
        //                                     else {
        //                                         $('#contentCenter').datagrid('reload');
        //                                         $.messager.show({  
        //                                             title: 'Status',  
        //                                             msg: result  
        //                                         });
        //                                     } 
        //                                 } 
        //                             });
        // });
        $('#update').bind('click', function(){
                    $('#F-INPUT').form('submit',{ url:'{{ route('sentinel.groups.update', $group->hash) }}', 
                                            success: function(result){
                                                    var data = eval('(' + result + ')');
                                                    console.log(data);
                                                    if (data.success) {
                                                      $.messager.show({  
                                                          title: 'Status',  
                                                          msg: data.success 
                                                      });
                                                
                                                    }
                                                    else{
                                                      var err_f='';
                                                        $.each(data.errors, function(err, val) {
                                                                  err_f += '<li> '+val+' </li>';
                                                        });
                                                          $.messager.show({  
                                                              title: 'Status { ssError }',  
                                                              msg: '<ul>'+err_f+'</ul>'
                                                          });
                                                      
                                                    }
                                            } 
                                        });
            });

    });
</script>