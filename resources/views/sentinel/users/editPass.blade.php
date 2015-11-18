
<div class="easyui-layout" data-options="fit:true, border:false">
    <div data-options="region:'center'">
        <div id="tt" class="easyui-tabs" data-options="fit:true, border:false">
            <div title="--== Edit Password Anda  ==--">
                <div class="isi">
                    <?php
    // Pull the custom fields from config
                    $isProfileUpdate = ($user->email == Sentry::getUser()->email);
                    $customFields = config('sentinel.additional_user_fields');
    // Determine the form post route
                    if ($isProfileUpdate) {
                        $profileFormAction = route('sentinel.profile.update');
                        $passwordFormAction = route('sentinel.profile.password');
                    } else {
                        $profileFormAction =  route('sentinel.users.update', $user->hash);
                        $passwordFormAction = route('sentinel.password.change', $user->hash);
                    }
                    ?>
                <!-- <div class="easyui-panel" data-options="" style="width:100%;padding:10px 70px 20px 70px"> -->
                      <h3>Ubah Password </h3>
                        <form  method="POST" id="F-pass" action="{{ $passwordFormAction }}" accept-charset="UTF-8">
                            @if(! Sentry::getUser()->hasAccess('admin'))
                            <div style="margin-bottom:10px">
                                <label for="oldPassword" style="display:inline-block; width:20%;" > Password Lama</label>
                                <input class="easyui-textbox"   placeholder="Old Lama" name="oldPassword" value="" id="oldPassword" type="password" data-options="prompt:'Ketik Password Lama Anda ',iconCls:'icon-man',iconWidth:38"    style="display:inline-block;width:60%;height:30px;padding:8px">
                            </div>
                            @endif
                            <div style="margin-bottom:10px">
                                <label for="newPassword" style="display:inline-block; width:20%;" > Password Baru</label>
                                <input class="easyui-textbox"   placeholder="Password Baru" name="newPassword" value="" id="newPassword" type="password" data-options="required:true, prompt:'Password Baru',iconCls:'icon-man',iconWidth:38"    style="display:inline-block;width:60%;height:30px;padding:8px">
                            </div>
                             <div style="margin-bottom:10px">
                                <label for="newPassword_confirmation" style="display:inline-block; width:20%;" > Ulangi Password  Baru</label>
                                <input class="easyui-textbox"  placeholder="Ketik Ulang Password Baru" name="newPassword_confirmation" value="" id="newPassword_confirmation" 
                                  value=""  type="password"   data-options="required:true, prompt:'Ketik Ulang Password Baru',iconCls:'icon-man',iconWidth:38"   style="display:inline-block;width:60%;height:30px;padding:8px">
                            </div>
                            <div>
                                <a href="#" class="easyui-linkbutton" id="pass" data-options="iconCls:'icon-ok'" style="width:100%;height:40px;padding:8px">
                                    <span style="font-size:14px;">Ubah Password</span>
                                </a>
                                
                            </div>
                            <input name="_token" value="{{ csrf_token() }}" type="hidden">
                            <!-- <input name="_method" value="PUT" type="hidden"> -->
                            {{ ($errors->has('oldPassword') ? '<br />' . $errors->first('oldPassword') : '') }}
                            {{ ($errors->has('newPassword') ?  '<br />' . $errors->first('newPassword') : '') }}
                            {{ ($errors->has('newPassword_confirmation') ? '<br />' . $errors->first('newPassword_confirmation') : '') }}

                        </form>
                    <!-- </div> -->

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#x-content').find('.easyui-textbox').textbox()
$('#x-content').find('.easyui-linkbutton').linkbutton()
$('#x-content').find('.easyui-layout').layout({border:false})
$('#x-content').find('.easyui-tabs').tabs({border:false})
           
            $('#pass').bind('click', function(){
                $('#F-pass').form('submit',{
                    onSubmit: function(param){

                            var a = $('#newPassword').textbox('getValue');  
                            var b = $('#newPassword_confirmation').textbox('getValue'); 
                            if(a !== b) {
                                // return true
                                $.messager.show({  
                                title: 'Status',  
                                msg: 'Password Anda tidak Sama '
                                });
                                return false
                            }

                            var isValid = $(this).form('validate');
                            if (!isValid){
                              // $.messager.progress('close'); 
                                $.messager.show({  
                                title: 'Status',  
                                msg: 'data tidak lengkap'
                                });
                              return false 
                            }
                            return isValid;
                    } ,
                    success: function(result){
                        // alert('succcc');
                        console.log(result);
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
     


</script>