 <div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'west'" style="width:40%">
        <!-- <div style='height:300px; overflow:hidden'> -->
            <table id='dx' /></table>
        <!-- </div> -->
        <!-- <div style=' height:300px; overflow:hidden'> -->
            <table id='submenu' /></table>
        <!-- </div> -->
    </div>
    <div data-options="region:'center'"style="width:20%">
        <div id="pB" >

        </div>
    </div>
</div>


    <script type="text/javascript">
    $('.easyui-layout').layout();
    function TambahGroup () {
        $('#dialog-x').dialog({
                        title: 'Create Grouop',
                        width: 500,
                        height: 500,
                        modal:true,
                        // fit:true,
                        cache: false,
                        href: '{{ route('sentinel.groups.create') }}',
                        buttons:[{
                            text:'Simpan',
                            handler:function (){                            
                            $('#createGroup').form('submit',{  
                                                    success: function(result){
                                                        // console.log(result)
                                                        if (result == "202"){
                                                            $.messager.show({  
                                                                title: 'Status',  
                                                                msg: 'Data Berhasil Dimasukkan !'  
                                                            });
                                                            $('#dialog-x').dialog('close')
                                                            // $('#dx').datagrid('reload');
                                                        }
                                                        else {
                                                            $.messager.show({  
                                                                title: 'Status',  
                                                                msg: 'result'  
                                                            });
                                                        } 
                                                    } 
                                                });
                                 
                                }
                            },{
                            text:'Batal',
                            handler:function(){
                                $('#dialog-x').dialog('close');
                            }
                        }]
                    });    
            $('#dialog-x').dialog('open');
    }
    function EditGroup (url) {

        console.log('EditUser');
        var row = $('#dx').datagrid('getSelected');
        console.log(row);
         var url=url+'/'+row.id+'/edit';
        console.log( url);
        if (row) {
            $('#dialog-x').dialog({
                            title: 'Edit Group',
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
    function DeletGroup (url) {
         console.log('DeletGroup');
         var row = $('#dx').datagrid('getSelected');
         console.log(row);
          var url=url+'/'+row.id;
         console.log( url+'/'+row.id);
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
    }
    function EditActionGroup(url) {

    }
     function EditPermissionMennu(url){
         console.log('EditPermissionMennu');
         // $(this).attr('disabled', 'disabled');
         var row = $('#dx').datagrid('getSelected');
         console.log(row);
         // var url=findUrls(row.Name)[0];
         var url=url+'/'+row.id
         console.log( url+'/'+row.id)
         // console.log(row.Name);
         // return false;
         if (row){
                 $('#dialog-x').dialog({
                                 title: 'Edit Permisi',
                                 width: 400,
                                 height: 400,
                                 modal:true,
                                 // fit:true,
                                 href: url,
                                 buttons:[{
                                     text:'Save',
                                     handler:function (){                            
                                         
                                         }
                                     },{
                                     text:'Close ',
                                     handler:function(){
                                         $("#dialog-x").dialog('close');
                                     }
                                 }]
                             });    
                     // $('#dialog-x').dialog('open');
             // $.messager.confirm('Confirm','Are you sure you want to Edit this user?',function(r){
             //     if (r){
             //         // $.post(url[0],
             //         //     function(result){
             //         //     $(this).attr('disabled', '');
             //         //     var data = $.parseJSON(result);
             //         //     console.log(data.msg);
             //         //     $('#dg').datagrid('reload'); 
             //         //     $.messager.alert('Info', data.msg, 'info');
             //         //     if (data.code==200){
             //         //             $.messager.show({   // show error message
             //         //                 title: 'Ok',
             //         //                 msg: data.msg
             //         //             });
             //         //         } else {
             //         //         $.messager.show({   // show error message
             //         //             title: 'Error',
             //         //             msg: data.msg
             //         //         });
             //         //     }
             //         // });
             //     }
             // });
         }
       
     }
    var toolbarx=[
                {
                text:'Tambah Group',
                iconCls:'icon-add',
                handler:function(){
                            TambahGroup();
                    }
                }
                ,{
                    text:'Edit Group',
                    iconCls:'icon-cut',
                    handler:function(){
                        // alert('Edit Group')
                        EditGroup('{{url('groups')}}')
                    }
                },{
                    text:'Delete Group',
                    iconCls:'icon-save',
                    handler:function(){
                        DeletGroup('{{url('groups')}}')
                    }
                }
                // ,{
                //     text:'Edit Action',
                //     iconCls:'icon-save',
                //     handler:function(){
                //         EditActionGroup(url)
                //     }
                // }
                ,{
                    text:'Edit Permisi Menu',
                    iconCls:'icon-save',
                    handler:function(){
                        EditPermissionMennu('{{url('groups')}}');
                    }
                }
            ];
        function EventonLoadSuccess (result) {
            console.log(result);
        }
            
    $('#dx').datagrid({
        url:'{{ route('sentinel.groups.DG') }}',
        resize:true,
        title:'Daftar Groups ',
        // fit:true,
        // height:300,
        // width:300,
        toolbar: toolbarx
        ,
        pagination : true,
        columns:[[
            {field:'name',title:'Name',width:100},
            {field:'permissions',title:'Permissions',width:100},
            {field:'options',title:'Options',width:100,align:'right'},
            {field:'akses',title:'Akses',width:100,align:'right'}
        ]],
        pagination : true,
        remoteSort:true,
        rownumbers : true,
        singleSelect:true,
        striped:true,
        // ,
        // onLoadSuccess:EventonLoadSuccess(),
        onDblClickRow:function  (data) {
         var row = $('#dx').datagrid('getSelected');
         // 'sentinel.groups.LDB'
          $('#submenu').datagrid('load',{
            // id: row.id,
            hash: row.id
          });
            // console.log();
            // alert(row.id)
        }
    });
    $('#submenu').datagrid({
        url:'{{ route('sentinel.groups.LDB') }}',
        resize:true,
        title:'Daftar Menu',
        // height:300,
        // width:300,
        // toolbar: toolbarx
        // ,
        // pagination : true,
        columns:[[
            {field:'table',title:'Database',width:100}
            // {field:'permissions',title:'Permissions',width:100},
            // {field:'options',title:'Options',width:100,align:'right'},
            // {field:'akses',title:'Akses',width:100,align:'right'}
        ]],
        remoteSort:true,
        rownumbers : true,
        singleSelect:true,
        striped:true,
        onLoadSuccess: function  (xx) {
            // console.log(xx);
        },
        onDblClickRow:function  (data) {
         var row = $('#submenu').datagrid('getSelected');
            console.log(row);
            // 'sentinel.groups.EA'

            $.get('{{route('sentinel.groups.EA')}}', {table_id:row.id ,hash:row.hash }, function(data, textStatus, xhr) {
                $('#pB').html(data);
                // return data;
            });
            // $('#dialog-x').dialog({
            //                 title: 'this',
            //                 width: 350,
            //                 height: 180,
            //                 modal:true,
            //                 href: '{{route('sentinel.groups.EA')}}',
            //                 buttons:[{
            //                     text:'url',
            //                     handler:function (){                            
            //                         handler
            //                         }
            //                     },{
            //                     text:'handler',
            //                     handler:function(){
            //                         $('#url').dialog('close');
            //                     }
            //                 }]
            //             });    
            //     $('#dialog-x').dialog('open');
            // alert(row.id)
        }

        // ,
        // onLoadSuccess:EventonLoadSuccess()
    });
    
       
       

    </script>

<!-- <div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead> 
                <th>Name</th>
                <th>Permissions</th>
                <th>Options</th>
                <th>Akses </th>
            </thead>
            <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td><a href="{{ route('sentinel.groups.show', $group->hash) }}">{{ $group->name }}Name</a></td>
                    <td>
                    {{-- dd($group->with('akses')->get()) --}}  {{-- Builder --}}

                        <?php
                            $permissions = $group->getPermissions();
                            $keys = array_keys($permissions);
                            $last_key = end($keys);
                            // dd($permissions);
                        ?>
                        @foreach ($permissions as $key => $value)
                            {{ ucfirst($key) . ($key == $last_key ? '' : ', ') }}
                        @endforeach
                    </td>
                    <td>
                        <button class="btn btn-default" onClick="location.href='{{ route('sentinel.groups.edit', [$group->hash]) }}'">Edit</button>
                        <?php if (!array_key_exists('admin', $permissions)): ?>
                            <button class="btn btn-default action_confirm {{ ($group->name == 'Admins') ? 'disabled' : '' }}" type="button" data-token="{{ csrf_token() }}" data-method="delete" href="{{ route('sentinel.groups.destroy', [$group->hash]) }}">Delete</button>
                        <?php endif ?>

                    </td>
                    <td><a href="{{ route('sentinel.groups.show', $group->hash) }}">{{ $group->name }} Edit Akses</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div> 
 -->

