

 <div class="easyui-layout" data-options="fit:true,border:false">
    <div data-options="region:'west'" style="width:50%">
            <table id="contentCenter" fit="true" style="widht: 10000px;" > </table>
    </div>
    <div data-options="region:'center'" >
        <div id="panelPermission" title="Load Panel Content" fit="true" style="padding:10px;" class="easyui-panel" >

        </div>
    </div>
</div>

        <!-- Toolbar==================================================================== -->
        <div id="toolbar" style="padding:5px;height:auto">
            <div style="margin-bottom:5px">
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" onclick="javascript:Tambah();"plain="true">Tambah </a>
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-check-square-o" onclick="javascript:Edit();"plain="true">Edit </a>
          
                <a href="#" class="easyui-linkbutton" iconCls="fa fa-close" plain="true" onclick="javascript:Delete();">Delete</a>
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
                        <a id="cari" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-search'" tyle="padding:50px;">Close</a>
                        <!-- <button type="button" id="cari" onclick="" style="padding:50px;"> Cari</button> -->
                    </div>
                </form>
            </div>
        
        </div>

  <div id="foot" style="text-align: center;">
      
      <a href="#" class="easyui-linkbutton" id="simpan" data-options="iconCls:'fa fa-save fa-lg'" style="width:50%;height:30px;padding:8px">
          <span style="font-size:14px;">Update Permisi</span>
      </a>
  </div> 
  <style type="text/css">
    
  </style>
<script type="text/javascript">
function Refresh (argument) {
    $('#contentCenter').datagrid('reload'); 
}
function Delete() {
var row = $('#contentCenter').datagrid('getSelected');
        if (row){
               $.messager.confirm('Konfirmasi', 'Apakah anda ingin menghapus Group {'+row.name+'}', function(r){
            if (r)
            {
            $.post('{{url('groups')}}/'+row.id, { _method: 'DELETE', _token: row.token }, function(data, textStatus, xhr) {
                console.log(data);
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
                        $('#contentCenter').datagrid('reload');
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

        }
                
            }


    function Tambah () {

    $('#windowA').empty()
    $('#windowA').window({href:'{{ route('sentinel.groups.create') }}',
            iconCls:'icon-save',
            title:'..: Tambah Group Baru :..',
            width:320, height:370,
            modal:true,
            cache:false,draggable:false,resizable:false,minimizable:false,
            buttons:'#dlg-buttons',
            onBeforeClose:function  (argument) {
            },
            onLoad:function  (param) {
                // $('#jenis_sppd_id').combobox({
                //     url:'{{--route('suplay.jenis-sppd.combobox')--}}',
                //     valueField:'id',
                //     textField:'nama_jenis_sppd'
                // });
                // $('#skpd_id').combobox({
                //     url:'{{--route('suplay.skpd.combobox')--}}',
                //     valueField:'id',
                //     textField:'nama_skpd'
                // });
                // $('#penerima_id').combobox({
                //     url:'{{--route('suplay.skpd.combobox')--}}',
                //     valueField:'id',
                //     textField:'nama_singkat_skpd'
                // });
                // $('#update').hide();
                //     $('#simpan').show();
                //     $('#F-INPUT').form('clear');
                //     if ($('#F-INPUT').find("input[name='_method']").length >= 1) {
                //         $('#F-INPUT').find("input[name='_method']").remove();
                //     };
                    
                
            },
            onBeforeLoad: function  (param) {
                // console.log('onbeforeLoad');
                // alert(param)
            }
        });
    // $('#windowA').window('refresh');
    }
function Edit () {
        var row = $('#contentCenter').datagrid('getSelected');

    $('#windowA').empty()
    $('#windowA').window({href:'{{ url('groups') }}/'+row.id+'/edit',
            iconCls:'icon-save',
            title:'..: Edit User '+ row.name+' :..',
            width:320, height:370,
            modal:true,
            cache:false,draggable:false,resizable:false,minimizable:false,
            onBeforeClose:function  (argument) {
                // alert('on before')
                // return false

            },
            onLoad:function  (param) {
                $('#windowA').window('center');
                // $('#jenis_sppd_id').combobox({
                //     url:'{{--route('suplay.jenis-sppd.combobox')--}}',
                //     valueField:'id',
                //     textField:'nama_jenis_sppd'
                // });
                // $('#skpd_id').combobox({
                //     url:'{{--route('suplay.skpd.combobox')--}}',
                //     valueField:'id',
                //     textField:'nama_skpd'
                // });
                // $('#penerima_id').combobox({
                //     url:'{{--route('suplay.skpd.combobox')--}}',
                //     valueField:'id',
                //     textField:'nama_singkat_skpd'
                // });
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


    $('#contentCenter').datagrid(
    {
        url:'{{route('ExtendGroup.groups.data')}}',
        // method:'get',
        border:false,
        title:'Daftar Group',
        toolbar: '#toolbar',
        columns:[[
        // {field:'productid',title:'No',width:200},
        {field:'name',title:'nama Group  ',width:20},
        {field:'permission',title:'Permission ',width:20},
        
        // {field:'jenis_sppd_id',title:'Jenis SPPD ',width:20},
        // {field:'skpd_id',title:'SKPD ',width:20},
        // {field:'penerima',title:'Penerima ',width:20},
        // {field:'keperluan',title:'Keperluan ',width:20}
        // {field:'productname',title:'Singkatan'}
        ]],
        onDblClickRow:function  (data) {
         var row = $('#contentCenter').datagrid('getSelected');
         $('#panelPermission').panel({
             footer:'#foot',
             border:false,
             href:'{{ url('groups')}}/'+row.id+'/edit-permission',
             title:'Edit Group { '+row.name+' }',
             onLoad:function  (argument) {
                // $('ul li:odd').addClass('zebra_odd');  
                // $('ul li:even').addClass('zebra_even');  
             }
         }); 
         // 'ExtendGroup.groups.LDB'
          // $('#submenu').datagrid('load',{
          //   // id: row.id,
          //   hash: row.id
          // });
            // console.log();
            // alert(row.id)
        },
        // height: 200,
        pagination : true,
        // remoteSort:true,
        rownumbers : true,
        singleSelect:true,
        striped:true, 
        collapsible:true,
        autoRowHeight:true,
        fitColumns:true
        // scrollbarSize:10,
        // pageSize:10
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
                        // $('.easyui-tabs').tabs()


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
    $('#simpan').bind('click', function(){
            $(this).attr('disabled', 'disabled');
            $('#formPermission').form('submit',{  
                                    success: function(result){
                                        $(this).attr('disabled', '');
                                        console.log(result);
                                        if (result ){
                                            $.messager.show({  
                                                title: 'Status',  
                                                msg: 'Permisi telah di update'  
                                            });
                                            $('#panelPermission').panel('open').panel('refresh');
                                        }
                                        else {
                                            $.messager.show({  
                                                title: 'Status',  
                                                msg: result  
                                            });
                                        } 
                                    } 
                                });
                // $('#djs').layout('collapse','south');
    });
})
</script>