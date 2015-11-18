<!-- <div class="isi easyui-panel" > -->
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

@if (! empty($customFields))
<!-- <div class="easyui-panel"> -->
  <h3>Profile</h3>
    <form method="POST" id="F-profile" action="{{ $profileFormAction }}"  accept-charset="UTF-8">
        <?php $i=0;?>
        @foreach(config('sentinel.additional_user_fields') as $field => $rules)
            <div style="margin-bottom:10px">
                <label for="{{ $field }}" style="display:inline-block; width:30%;">{{-- ucwords(str_replace('_',' ',$field)) --}} {{ $i==0?'Nama Depan':'Nama Belakang' }} <!-- {{ $i++ }} --></label>
                <input class="easyui-textbox"  name="{{ $field }}" placeholder="{{ $field }}" data-options="prompt:'{{ $field }}',iconCls:'icon-man',iconWidth:38"    type="text"  value="{{ Input::old($field) ? Input::old($field) : $user->$field }}" style="display:inline-block;width:60%;height:30px;padding:8px">
                    {{ ($errors->has($field) ? $errors->first($field) : '') }}
            </div>
        @endforeach
        <div>

         <!--    <a href="#" class="easyui-linkbutton" id="profile" data-options="iconCls:'icon-ok'" style="width:100%;height:30px;padding:8px">
                <span style="font-size:14px;">Update Profile </span>
            </a>
 -->
            <a href="#" class="easyui-linkbutton" id="profiley" data-options="iconCls:'fa fa-check-square-o fa-lg'" style="width:100%;height:30px;padding:8px">
                <span style="font-size:14px;">Update Profile</span>
            </a>
            
        </div>
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input name="_method" value="PUT" type="hidden">

    </form>

@endif

@if (Sentry::getUser()->hasAccess('admin') && ($user->hash != Sentry::getUser()->hash))
<!-- <div class="easyui-panel" > -->
  <h3>Group Memberships</h3>
    <form  method="POST" id="F-member" action="{{ route('sentinel.users.memberships', $user->hash) }}" accept-charset="UTF-8">
            @foreach($groups as $group)
                        <!-- <li> -->
                            <input type="checkbox" name="groups[{{ $group->name }}]" value="1" {{ ($user->inGroup($group) ? 'checked' : '') }}> {{ $group->name }}
                        <!-- </li> -->
            @endforeach
        <div>
            <a href="#" class="easyui-linkbutton" id="member" data-options="iconCls:'fa fa-check-square-o fa-lg'" style="width:100%;height:30px;padding:8px">
                <span style="font-size:14px;">Update Group Member </span>
            </a>
            
        </div>
        <input name="_token" value="{{ csrf_token() }}" type="hidden">

    </form>

@endif

<!-- <div class="easyui-panel" > -->
  <h3>Ubah Password </h3>
    <form  method="POST" id="F-pass" action="{{ $passwordFormAction }}" accept-charset="UTF-8">
        @if(! Sentry::getUser()->hasAccess('admin'))
        <div style="margin-bottom:10px">
            <label for="oldPassword" style="display:inline-block; width:30%;" > Password Lama</label>
            <input class="easyui-textbox"   placeholder="Old Lama" name="oldPassword" value="" id="oldPassword" type="password" data-options="prompt:'Ketik Password Lama Anda ',iconCls:'icon-man',iconWidth:38"    style="display:inline-block;width:60%;height:30px;padding:8px">
        </div>
        @endif
        <div style="margin-bottom:10px">
            <label for="newPassword" style="display:inline-block; width:30%;" > Password Baru</label>
            <input class="easyui-textbox"   placeholder="Password Baru" name="newPassword" value="" id="newPassword" type="password" data-options="prompt:'Password Baru',iconCls:'icon-man',iconWidth:38"    style="display:inline-block;width:60%;height:30px;padding:8px">
        </div>
         <div style="margin-bottom:10px">
            <label for="newPassword_confirmation" style="display:inline-block; width:30%;" > Ulangi Password  Baru</label>
            <input class="easyui-textbox"  placeholder="Ketik Ulang Password Baru" name="newPassword_confirmation" value="" id="newPassword_confirmation" 
              value=""  type="password"   data-options="prompt:'Ketik Ulang Password Baru',iconCls:'icon-man',iconWidth:38"   style="display:inline-block;width:60%;height:30px;padding:8px">
        </div>
        <div>
            <a href="#" class="easyui-linkbutton" id="pass" data-options="iconCls:'fa fa-check-square-o fa-lg'" style="width:100%;height:30px;padding:8px">
                <span style="font-size:14px;">Ubah Password</span>
            </a>
            
        </div>
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <!-- <input name="_method" value="PUT" type="hidden"> -->
        {{ ($errors->has('oldPassword') ? '<br />' . $errors->first('oldPassword') : '') }}
        {{ ($errors->has('newPassword') ?  '<br />' . $errors->first('newPassword') : '') }}
        {{ ($errors->has('newPassword_confirmation') ? '<br />' . $errors->first('newPassword_confirmation') : '') }}

    </form>

<script type="text/javascript">
    $(function(){
        $('#pass').bind('click', function(){
            // alert('passs')
            $('#F-pass').form('submit',{  
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
$('#profiley').bind('click', function(){
            $('#F-profile').form('submit',{  
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
$('#member').bind('click', function(){
        $('#F-member').form('submit',{  
                                success: function(result){
                                        var data = eval('(' + result + ')');
                                        $.messager.show({  
                                            title: 'Status',  
                                            msg: data.success  
                                        });
                                } 
                            });
            });


    });


</script>