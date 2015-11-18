
<!-- ================================================================================= -->
<!-- <div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center'">
        <div id="tt" class="easyui-tabs" fit="true">
            <div title="Daftar User">
                 <div class="easyui-layout" data-options="fit:true">
                    <div data-options="region:'west'" style="width:50%">
                            <table id="contentCenter" fit="true" style="widht: 10000px;" >
                            </table>
                    </div>
                    <div data-options="region:'center'"style="width:20%">
                        <div id="panelPermission" fit="true" >

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
 <div class="easyui-layout" data-options="fit:true, border:false">
    <div data-options="region:'west'" style="width:50%">
        <table id="contentCenter" fit="true" > </table>
    </div>
    <div data-options="region:'center'"  >
        <div id="panelPermission"  title="Load Panel Content" style="padding:10px;" class="easyui-panel" > </div>
    </div>
</div>

        <!-- Toolbar==================================================================== -->
        <div id="toolbar" style="padding:5px;height:auto">
            <div style="margin-bottom:5px">
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" onclick="javascript:Tambah();"plain="true">Tambah </a>
                <!-- <a href="#" class="easyui-linkbutton" iconCls="fa fa-check-square-o" onclick="javascript:EditProfile();"plain="true">Edit Profile</a> -->
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-ban" plain="true" onclick="javascript:Suspend();"> Suspend</a>
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-ban" plain="true" onclick="javascript:unSuspend();"> unSuspend</a>
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-lock" plain="true"  onclick="javascript:Banned();">Banned</a>
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-unlock" plain="true"  onclick="javascript:unBanned();">unBanned</a>
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-refresh" plain="true" onclick="javascript:Refresh();">Refresh</a>
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-close  " plain="true" onclick="javascript:Delete();">Delete</a>
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Tampilkan Filter Dokumen</a> -->
            
            </div>
            <div style="padding:5px;height:auto;display:none;" id="formPencarian">
                <form name="pencarian" id="pencarian">
                <input name="cari" type="hidden" value="ok"> 
                
                    <div style="display:inline-block; width:10%;">
                    <legend title="Pilih">
                        <input name="skpd_id_ck" type="checkbox"> SKPD_id<br>
                        <input name="jenis_sppd_id_ck" type="checkbox"> Jenis SPPD<br>
                        <input name="penerima_ck" type="checkbox"> Penerima SPPD <br>
                        <input name="tahun_ck" type="checkbox"> Tahun<br>
                        <input name="no_sppd_ck" type="checkbox"> Nomor SPPD<br>
                        <input name="keperluan_ck" type="checkbox"> Keperluan<br>
                        </legend>
                    </div>
                    <div style="display:inline-block; width:30%;">
                        <!-- <input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px"> -->
                        <input id="skpd_id-x" name="skpd_id"  value="skpd_id" style="width:200px;"><br>
                        <input id="jenis_sppd_id-x" name="jenis_sppd_id" tvalue="jenis_sppd_id" style="width:200px;"><br>
                        <input name="penerima_id"   class="easyui-textbox"   style="width:100%" value="penerima"><br>
                        <input name="tahun"   class="easyui-textbox"  style="width:100%" value="tahun"><br>
                        <input name="no_sppd"   class="easyui-textbox"   style="width:100%" value="no_sppd"><br>
                        <input name="keperluan"   class="easyui-textbox"    style="width:100%" value="keperluan"><br>
                    </div>
                    <div style="display:inline-block; width:30%; position:absolute; top:0px; padding:20px;">
                        <a id="cari" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-close'" tyle="padding:50px;">Close</a>
                        <!-- <button type="button" id="cari" onclick="" style="padding:50px;"> Cari</button> -->
                    </div>
                </form>
            </div>
        </div>

<script type="text/javascript">
function Refresh (argument) {
    $('#contentCenter').datagrid('reload'); 
}

function Banned (argument) {
    var row = $('#contentCenter').datagrid('getSelected');
    var url='google.com'
    if (row){
            $.get('{{url('users')}}/'+row.id+'/ban', function(data, textStatus, xhr) {
                alert(data)
          
                    if (textStatus=='success') {
                        $.messager.show({  
                        title: 'Status',  
                        msg: data.success  
                        }); 
                        $('#contentCenter').datagrid('reload');

                    }
                    else{
                        $.messager.show({  
                        title: 'Gagal !',  
                        msg: 'Terjadi Kesalahan !'  
                        });     
                        $('#contentCenter').datagrid('re load');
                    }
                }).fail(function(data) {
                  
                    $.messager.show({  
                    title: 'Gagal !',  
                    msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
                    }); 
                        $('#contentCenter').datagrid('reload');
                    // alert( "error" );
                  });
        // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
    }
}
function unBanned (argument) {
    var row = $('#contentCenter').datagrid('getSelected');
    if (row){
        $.messager.confirm('Konfirmasi', 'Apakah anda ingin memUnbanned {'+row+'}', function(r){
            if (r)
            {
            $.get('{{url('users')}}/'+row.id+'/unban', function(data, textStatus, xhr) {
                    if (textStatus=='success') {
                        $.messager.show({  
                        title: 'Status',  
                        msg: data.success  
                        }); 
                        $('#contentCenter').datagrid('reload');

                    }
                    else{
                        $.messager.show({  
                        title: 'Gagal !',  
                        msg: 'Terjadi Kesalahan !'  
                        });     
                        $('#contentCenter').datagrid('re load');
                    }
                }).fail(function(data) {
                   
                    $.messager.show({  
                    title: 'Gagal !',  
                    msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
                    }); 
                        $('#contentCenter').datagrid('reload');
                    // alert( "error" );
                  });
                }
        });
        // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
    }
}
function Delete() {
    var row = $('#contentCenter').datagrid('getSelected');
    if (row){
        $.messager.confirm('Konfirmasi', 'Apakah anda ingin membanned {'+row.user+'}', function(r){
            if (r)
            {
                $.post('{{url('users')}}/'+row.id, { _method: 'DELETE', _token: row.token }, function(data, textStatus, xhr) {
                        $('#contentCenter').datagrid('re load');
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
                 
                }).fail(function(data) {
                    $.messager.show({  
                        title: 'Gagal !',  
                        msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
                    }); 
                    $('#contentCenter').datagrid('reload');
                });
            }
        });
    }

}
function  Suspend(argument) {
    var row = $('#contentCenter').datagrid('getSelected');
    console.log(row);
    // $('#content-x').empty()
    $('#windowA').empty();
    if (row){
        $.messager.confirm('Konfirmasi', 'Apakah anda ingin membanned {'+row.user+'}', function(r)
        {
            if (r)
            {

                $.get('{{url('users')}}/'+row.id+'/suspend', function(data, textStatus, xhr) {
                        if (textStatus=='success') {
                            $.messager.show({  
                                title: 'Status',  
                                msg: data.success 
                            }); 
                            $('#contentCenter').datagrid('reload');

                        }
                        else{
                            $.messager.show({  
                                title: 'Gagal !',  
                                msg: 'Terjadi Kesalahan !'  
                            });     
                            $('#contentCenter').datagrid('re load');
                        }
                    }).fail(function(data) {
                    $.messager.show({  
                        title: 'Gagal !',  
                        msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
                    }); 
                    $('#contentCenter').datagrid('reload');
                });
            // $('#windowA').window('refresh');
            }
        });
    }
    else{
        $.messager.alert('Info', 'Anda harus memilih baris di tabel terlebih dulu', 'info');
    }
        
}
function  unSuspend(argument) {
        var row = $('#contentCenter').datagrid('getSelected');
        console.log(row);
            // var url='google.com'
                // $('#content-x').empty()
            $('#windowA').empty();
            if (row){            
                $.get('{{url('users')}}/'+row.id+'/unsuspend', function(data, textStatus, xhr) {
                    if (textStatus=='success') {
                        $.messager.show({  
                        title: 'Status',  
                        msg: data.success 
                        }); 
                        $('#contentCenter').datagrid('reload');

                    }
                    else{
                        $.messager.show({  
                        title: 'Gagal !',  
                        msg: 'Terjadi Kesalahan !'  
                        });     
                        $('#contentCenter').datagrid('re load');
                    }
                }).fail(function(data) {
                    // $.messager.show({  
                    // title: 'Gagal !',  
                    // msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
                    // });  
                    $.messager.show({  
                    title: 'Gagal !',  
                    msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
                    }); 
                        $('#contentCenter').datagrid('reload');
                    // alert( "error" );
                  });
                 // $('#windowA').window('refresh');
                 // $('#windowA').window('refresh');
                // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
            }
                else{
                    $.messager.alert('Info', 'Anda harus memilih baris di tabel terlebih dulu', 'info');
                }
        
}
    function Tambah () {

    $('#windowA').empty()
    $('#windowA').window({href:'{{ route('sentinel.users.create') }}',
            iconCls:'fa fa-plus',
            title:'Tambah User',width:320, height:370,
            modal:true,
            cache:false,draggable:false,resizable:false,minimizable:false,
            buttons:'#dlg-buttons',
            onBeforeClose:function  (argument) {
          

            },
            onLoad:function  (param) {
                        $('#windowA').window('center'); 
            },
            onBeforeLoad: function  (param) {
                // console.log('onbeforeLoad');
                // alert(param)
            }
        });
    // $('#windowA').window('refresh');
    }
function EditProfile () {
        var row = $('#contentCenter').datagrid('getSelected');

    $('#windowA').empty()
    $('#windowA').window({href:'{{ url('users') }}/'+row.id+'/edit',
            iconCls:'fa fa-check-square-o',
            title:'Edit User '+ row.user,
          modal:true,
          cache:false,
          width:600,
            onLoad:function  (param) {
                // $('#windowA').window('center');
              
                // $('#update').hide();
                    // $('#simpan').show();
                    // $('#F-INPUT').form('clear');
                    // if ($('#F-INPUT').find("input[name='_method']").length >= 1) {
                    //     $('#F-INPUT').find("input[name='_method']").remove();
                    // };
                    
                
            },
            onBeforeLoad: function  (param) {
                // console.log('onbeforeLoad');
                // alert(param)
            }
        });
    // $('#windowA').window('refresh');
    }
    // function EditProfile (action) {
    //     edit(action);
    // }
   


    $('#contentCenter').datagrid(
    {
        url:'{{route('ExtendUser.users.data')}}',
        // method:'get',
        
        title:'Daftar User',
        toolbar: '#toolbar',
        border:false,
        columns:[[
        // {field:'productid',title:'No',width:200},
        {field:'user',title:'User  ',width:20},
        {field:'status',title:'Status ',width:20},
        
        // {field:'jenis_sppd_id',title:'Jenis SPPD ',width:20},
        // {field:'skpd_id',title:'SKPD ',width:20},
        // {field:'penerima',title:'Penerima ',width:20},
        // {field:'keperluan',title:'Keperluan ',width:20}
        // {field:'productname',title:'Singkatan'}
        ]],
        // height: 200,
        pagination : true,
        // remoteSort:true,
        rownumbers : true,
        singleSelect:true,
        striped:true, 
        collapsible:true,
        autoRowHeight:true,
        fitColumns:true,
        onDblClickRow:function  (data) {
         var row = $('#contentCenter').datagrid('getSelected');
         $('#panelPermission').panel({
            fit:true,
            border:false,
            href:'{{ url('users') }}/'+row.id+'/edit',
            title:'Edit Group { '+row.user+' }'
         }); 
        }
    });
                        // $('#content-x').find('.easyui-combobox').combobox({
                        //      url:'combobox_data.json',
                        //      valueField:'id',
                        //      textField:'text',
                        //      onSelect: function(rec){
                        //          alert('selected')
                        //      // var url = 'get_data2.php?id='+rec.id;
                        //      // $('#cc2').combobox('reload', url);
                        //  }
                        // }
                        
                        $('.easyui-layout').layout()
                        $('.easyui-linkbutton').linkbutton()
                        // $('#content-x').find('.easyui-tabs').tabs()


$('#show').change(function() {
    if ($(this).is(':checked')) {
         $( "#formPencarian" ).show( "slow" );
        // this.checked = confirm("Are you sure?");
        // $(this).trigger("change");
    }
    else{
        $( "#formPencarian"  ).slideUp("slow");
    }
});
$.fn.serializeObject = function() {
var o = {};
var a = this.serializeArray();
$.each(a, function() {
    if (this.name.substr(-2) == "[]"){
        this.name = this.name.substr(0, this.name.length - 2);
        o[this.name] = [];
    }

    if (o[this.name]) {
        if (!o[this.name].push) {
            o[this.name] = [o[this.name]];
        }
        o[this.name].push(this.value || '');
    } else {
        o[this.name] = this.value || '';
    }
});
return o;
}
$(function  () {
        $('#cari').bind('click', function(){
                // alert('cariiiii');
                var data = $( "#pencarian" ).serializeArray();
                var xx = new Object()
                jQuery.each( data, function( i, result ) {
                    // console.log(result);
                    xx[result.name]=result.value
                     
                    

                  // $( "#results" ).append( field.value + " " );
                });
                $('#contentCenter').datagrid('load', xx);
                // console.log(xx); 
                // return false;
                // console.log(data);
                // console.log({name: 'easyui', address: 'ho'});
                    
                    // $('#contentCenter').datagrid('load', {
                    //     name: 'easyui',
                    //     address: 'ho'
                    // });
                    // $('#pencarian').form('submit',{  
                    //  success: function(result){
                    //      if (result == "this"){
                    //          $.messager.show({  
                    //              title: 'Status',  
                    //              msg: 'Data Berhasil Dimasukkan !'  
                    //          });
                    //          $('#this').dialog('close')
                    //          $('#this').datagrid('reload');
                    //      }
                    //      else {
                    //          $.messager.show({  
                    //              title: 'Status',  
                    //              msg: result  
                    //          });
                    //      } 
                    //  } 
                    // });          // alert('easyui');
        });
})
</script>