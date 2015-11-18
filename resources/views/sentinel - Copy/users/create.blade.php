
         <form id="ff" method="POST" style="  background: #d2e9ff none repeat scroll 0 0;
    color: #666;
    font: 12px Arial,Helvetica,sans-serif;
    margin-left: auto;
    margin-right: auto;
    max-width: 500px;
    padding: 20px;"  action="{{ route('sentinel.users.store') }}" accept-charset="UTF-8">
         <label>
             <span>Username</span>
            :  <input class="easyui-textbox " data-options="required:true" 
             placeholder="Username" name="username" type="text"  value="{{ Input::old('username') }}" >
            
         </label>
            
            <table cellpadding="5">
                <tr>
                    <td>Username</td>
                    <td>:  <input class="easyui-textbox" data-options="required:true" 
                    placeholder="Username" name="username" type="text"  value="{{ Input::old('username') }}" >
                    </input></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:  <input class="easyui-textbox" type="text" name="email" data-options="required:true,validType:'email'"
                        placeholder="E-mail" name="email" type="text"  value="{{ Input::old('email') }}"
                    ></input></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:  <input class="easyui-textbox" data-options="required:true"
                    placeholder="Password" name="password" value="" type="password"
                    ></input></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:  <input class="easyui-textbox" data-options="required:true"
                    placeholder="Confirm Password" name="password_confirmation" value="" type="password"
                    ></input></td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input name="activate" value="activate" type="checkbox"> Activate</td>
                </tr>
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
            </table>
        </form>
        <div style="text-align:center;padding:5px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">Submit</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">Clear</a>
        </div>
<script>

        function submitForm(){
            // alert('daf');
                $('#ff').form('submit',{  
                                        success: function(result){
                                                console.log(result)
                                                var data = eval('(' + result + ')');
                                                console.log(data)
                                                
                                            // console.log(result)
                                            // if (result.code == 403){
                                                // alert('405')

                                                // console.log(result.code);
                                                var err='';
                                                  $.each(data.errors, function(index, val) {
                                                       // if(isArray(val)){
                                                            $.each(val, function(indexx, valx) {
                                                                err += index+' : '+valx+'<br>';    
                                                            });
                                                       // }
                                                  });
                                                    console.log(err);
                                                        $.messager.show({  
                                                            title: 'Status '+data.msg,  
                                                            msg: err
                                                        });
                                                
                                                // $.messager.show({  
                                                //     title: 'Status',  
                                                //     msg: 'Data Berhasil Dimasukkan !'  
                                                // });
                                                // $('#ff').dialog('close')
                                                // $('#ff').datagrid('reload');
                                            // }
                                            // else {
                                            //     // $('#ff').form('clear');
                                            //     // $('#ff').dialog('refresh');
                                            //     alert('else')
                                            // console.log(result)
                                            //     $.messager.show({  
                                            //         title: 'Status',  
                                            //         msg: result.msg
                                            //     });
                                            // } 
                                        } 
                                    });
            // $('#ff').form('submit');
        }
        function clearForm(){
            $('#ff').form('clear');
        }
</script>

<!-- 
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="{{ route('sentinel.users.store') }}" accept-charset="UTF-8">

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
                    <input name="activate" value="activate" type="checkbox"> Activate
                </label>
            </div>

            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Create" type="submit">

        </form>
    </div>
</div>
 -->