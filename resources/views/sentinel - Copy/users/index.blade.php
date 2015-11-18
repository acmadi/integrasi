
<div  style="height:50%; ">
    <div id="dgx"></div>
</div>
    
<!-- <table id="dg"class="easyui-datagrid" title="DataGrid with Toolbar" data-options="rownumbers:true,singleSelect:true,toolbar:toolbar">
    <thead>
        <tr>
            <th data-options="field:'User'">User</th>
            <th data-options="field:'Status'">Status</th>
            <th data-options="field:'Options'">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td><a href="{{ route('sentinel.users.show', array($user->hash)) }}">{{ $user->email }}</a></td>
            <td>{{ $user->status }} </td>
            <td>
                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.edit', array($user->hash)) }}'">Edit</button>
                @if ($user->status != 'Suspended')
                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.suspend', array($user->hash)) }}'">Suspend</button>
                @else
                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.unsuspend', array($user->hash)) }}'">Un-Suspend</button>
                @endif
                @if ($user->status != 'Banned')
                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.ban', array($user->hash)) }}'">Ban</button>
                @else
                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.unban', array($user->hash)) }}'">Un-Ban</button>
                @endif
                <button class="btn btn-default action_confirm" href="{{ route('sentinel.users.destroy', array($user->hash)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> -->

    <script type="text/javascript">
        var toolbar = [
        {
            text:'Tambah User',
            iconCls:'icon-add',
            handler:function(){
                // alert('{{ route('sentinel.users.create') }}')

                $('#dialog-x').empty();
                $('#dialog-x').dialog({
                                title: 'Tambah User',
                                width: 500,
                                height: 500,
                                modal:true,
                                // fit:true,
                                href: '{{ route('sentinel.users.create') }}'
                         
                            });    
                    // $('#dialog-x').dialog('open');
            }
        }
    
        ];
    $('#dg').datagrid({fit:true});
    function Edit(url) {
        console.log('EditUser');
        var row = $('#dgx').datagrid('getSelected');
        console.log(row);
         var url=url+'/'+row.id+'/edit';
        console.log( url);
        if (row) {
            $('#dialog-x').dialog({
                            title: 'Edit User',
                            width: 500,
                            height: 400,
                            modal:true,
                            href: url,
                            buttons:[{
                                text:'Submit',
                                handler:function (){                            
                                        alert('Submit');
                                    }
                                },{
                                text:'Close',
                                handler:function(){
                                    $('#dialog-x').dialog('close');
                                }
                            }]
                        });    
                $('#dialog-x').dialog('open');
        }


        
    }
    function Suspend(url) {
        console.log('EditUser');
        var row = $('#dgx').datagrid('getSelected');
        console.log(row);
         var url=url+'/'+row.id+'/suspend';
        console.log( url);
        // http://integrasi/users/y3yrw0/suspend
        $.get(url, function(data) {
                $.messager.show({  
                title: 'Status',  
                msg: data  
                });
                return false;
        });
    }
    function Banned(url) {
        // console.log('EditUser');
        var row = $('#dgx').datagrid('getSelected');
        console.log(row);
         var url=url+'/'+row.id+'/ban';
        console.log( url);
        // http://integrasi/users/y3yrw0/suspend
        $.get(url, function(data) {
                $.messager.show({  
                title: 'Status',  
                msg: data  
                });
                return false;
        });
    }
    function Delete(url) {
        console.log('DeleUsers');
        var row = $('#dgx').datagrid('getSelected');
        console.log(row);
         var url=url+'/'+row.id;
        if (row){
            $.messager.confirm('Konfirmasi', 'Apakakah anda yakin !!', function(r){
                            if (r)
                            {
                             
                                $.post(url ,
                                   { _method: "delete" },
                                    function (data) {
                                        $.messager.show({  
                                        title: 'Status',  
                                        msg: data  
                                        }); 
                                
                                });
                            }
                        });
        }


        // var row = $('#dgx').datagrid('getSelected');
        // console.log(row);
        // // var url=url+'/'+row.id;
        // console.log( url);
        // // http://integrasi/users/y3yrw0/suspend
        // $.post(url, {_methode:'delete'},function(data) {
        //         $.messager.show({  
        //         title: 'Status',  
        //         msg: data  
        //         });
        //         return false;
        // })

    }
    var toolbarx=[{
            text:'Select All',
            iconCls: 'add icon-add',
            handler: function(){
                $('#dgx').datagrid('selectAll'); 
                }
            },{
                text:'Unselect ',
                iconCls: 'icon-remove',
                handler: function(){
                    $('#dgx').datagrid('unselectAll'); 
                }
            },{
                text:'Edit ',
                iconCls: 'icon-remove',
                handler: function(){
                   Edit('{{url('users')}}');
                }
            },{
                text:'Tambah User',
                iconCls:'icon-add',
                handler:function(){
                $('#dialog-x').empty();
                $('#dialog-x').dialog({
                                title: 'Tambah User',
                                width: 500,
                                height: 500,
                                    modal:true,
                                // fit:true,
                                href: '{{ route('sentinel.users.create') }}'
                         
                            });
                }
            },{
                text:'Suspend ',
                iconCls: 'icon-remove',
                handler: function(){
                    // $('#dgx').datagrid('unselectAll'); 
                                Suspend('{{ url('users') }}')

                }
            },{
                text:'Banned ',
                iconCls: 'icon-remove',
                handler: function(){
                    Banned('{{ url('users') }}')
                }
            },{
                text:'Delete ',
                iconCls: 'icon-remove',
                handler: function(){
                    Delete('{{url('users')}}')
                    // console.log('dleteee');
            }
        }];
    var coloumnx=[[
            {field:'email',title:'User',width:100},
            {field:'status',title:'Status',width:100}
            // {field:'Options',title:'Options',width:100}
            // {field:'id',title:'id',width:100},
            // {field:'field',title:'field',rowspan:2,editor:'text',width:280}
        ]];
    $('#dgx').datagrid({
        url:'{{route('sentinel.users.DG')}}',
        resize:true,
        title:'Daftar Users ',
        fit:true,
        toolbar:toolbarx,
        columns:coloumnx,
        pagination : true,
        remoteSort:true,
        rownumbers : true,
        singleSelect:true,
        striped:true
    });
    
</script>
 <!--   
       <div class="row">
            <div class='page-header'>
                <div class='btn-toolbar pull-right'>
                    <div class='btn-group'>
                        <a class='btn btn-primary' href="{{ route('sentinel.users.create') }}">Create User</a>
                    </div>
                </div>
                <h1>Current Users</h1>
            </div> 
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>User</th>
                        <th>Status</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td><a href="{{ route('sentinel.users.show', array($user->hash)) }}">{{ $user->email }}</a></td>
                            <td>{{ $user->status }} </td>
                            <td>
                                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.edit', array($user->hash)) }}'">Edit</button>
                                @if ($user->status != 'Suspended')
                                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.suspend', array($user->hash)) }}'">Suspend</button>
                                @else
                                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.unsuspend', array($user->hash)) }}'">Un-Suspend</button>
                                @endif
                                @if ($user->status != 'Banned')
                                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.ban', array($user->hash)) }}'">Ban</button>
                                @else
                                <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.unban', array($user->hash)) }}'">Un-Ban</button>
                                @endif
                                <button class="btn btn-default action_confirm" href="{{ route('sentinel.users.destroy', array($user->hash)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       

-->
