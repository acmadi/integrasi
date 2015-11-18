<div class="isi">
         <!--    <h2>Custom TextBox</h2>
         <p>This example shows how to custom a login form.</p> -->
         <!-- <div style="margin:20px 0;"></div> -->

         <!--    <div class="easyui-layout" data-options="fit:true">
                    <div data-options="region:'east',split:true" style="width:100px"></div>
                    <div data-options="region:'center'" style="padding:10px;">
                        jQuery EasyUI framework help you build your web page easily.
                    </div>
                    <div data-options="region:'south',border:false" style="text-align:right;padding:5px 0 0;">
                        <a class="easyui-linkbutton" data-options="iconCls:'icon-ok'" href="javascript:void(0)" onclick="javascript:alert('ok')">Ok</a>
                        <a class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" href="javascript:void(0)" onclick="javascript:alert('cancel')">Cancel</a>
                    </div>
                </div> -->

                <div class="easyui-panel" data-options="style:{borderWidth:0}" tyle="width:400px;padding:30px 70px 20px 70px">
                    <form method="POST" id="F-INPUT" action="{{ route('sentinel.users.store') }}" accept-charset="UTF-8">
                        <div style="margin-bottom:10px">
                            <!-- <input style="width:100%;height:30px;padding:8px" data-options="prompt:'Username',iconCls:'icon-man',iconWidth:38"> -->

                            <input class="easyui-textbox"  placeholder="Username" data-options="prompt:'Username',iconCls:'icon-man',iconWidth:38"   name="username" type="text"  value="{{ Input::old('username') }}" style="width:100%;height:30px;padding:8px">
                            {{ ($errors->has('username') ? $errors->first('username') : '') }}
                        </div>
                        <div style="margin-bottom:10px">
                            <input class="easyui-textbox"  placeholder="E-mail" name="email" value="{{ Input::old('email') }}"   data-options="prompt:'Email',iconCls:'icon-man',iconWidth:38" name="username" type="text"  value="{{ Input::old('username') }}" style="width:100%;height:30px;padding:8px">
                            <!-- <input class="form-control" placeholder="" name="email" type="text"  value="{{ Input::old('email') }}"> -->
                            {{ ($errors->has('email') ? $errors->first('email') : '') }}
                        </div>

                        <div style="margin-bottom:20px">
                            <input class="easyui-textbox" type="password" placeholder="Password" name="password"   data-options="prompt:'Password',iconCls:'icon-lock',iconWidth:38" style="width:100%;height:30px;padding:8px">
                            <!-- <input class="form-control" placeholder="Password" name="password" value="" type="password"> -->
                            {{ ($errors->has('password') ?  $errors->first('password') : '') }}
                        </div>

                        <div style="margin-bottom:20px">
                            <input class="easyui-textbox" type="password" placeholder="Confirm Password"  name="password_confirmation"   data-options="prompt:'Confirm Password',iconCls:'icon-lock',iconWidth:38" style="width:100%;height:30px;padding:8px">
                            <!-- <input class="form-control" placeholder="Confirm Password" name="password_confirmation" value="" type="password"> -->
                            {{ ($errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '') }}
                        </div>
                        
                        <label class="checkbox">
                            <input name="activate"  type="hidden" value="1"> 
                        </label>
                        <div>
                            <a href="#" class="easyui-linkbutton" id="simpan" data-options="iconCls:'icon-ok'" style="width:100%;height:30px;padding:8px">
                                <span style="font-size:14px;">Buat User</span>
                            </a>
                            <input name="_token" value="{{ csrf_token() }}" type="hidden">
                        </div>



                    </form>
                </div>


        <!-- ========================================================================================================================= -->
     <!--    <form method="POST" id="F-INPUT" action="{{ route('sentinel.users.store') }}" accept-charset="UTF-8">

            <h2>Create New User</h2>

            <div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Username" name="username" type="text"  value="{{ Input::old('username') }}">
                {{ ($errors->has('username') ? $errors->first('username') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="E-mail" name="email" type="text"  value="{{ Input::old('email') }}">
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Password" name="password" value="" type="password">
                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Confirm Password" name="password_confirmation" value="" type="password">
                {{ ($errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '') }}
            </div>

            <div class="form-group">
                <label class="checkbox">
                    <input name="activate"  type="hidden" value="1"> Activate
                </label>
            </div>

            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Create" id="simpan" type="button">

        </form> -->
    </div>

    <script type="text/javascript">
        $(function(){
            $('#close').bind('click', function(){

                    // alert('easyui');
                });
            $('#simpan').bind('click', function(){

                $('#F-INPUT').form('submit',{  url:'{{ route('sentinel.users.store') }}',
                    success: function(result){
                        var data = eval('(' + result + ')');
                        $('#contentCenter').datagrid('reload');
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
