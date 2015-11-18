    <?php //$tables=\Config::get('tables');?>
    <form method="POST" id="formPermission" name="formPermission"  action="{{ url('groups') }}/{{ $group_id }}/CUP" accept-charset="UTF-8">
    <input name="_token" value="{{ csrf_token() }}" type="hidden">
    <div class="easyui-accordion">
        @foreach($tables as $table_id => $table)
            <div title="{{ $table }}" data-options="iconCls:'fa fa-th-list fa-lg'" style="overflow:auto; max-height:400px; padding:10px;">
            <?php //echo $table['id']?>
                @include('sentinel.groups.table-permission', ['table_id' => $table_id,'table'=>  $table,'permissions'=>  $permissions ,'config_permits'=>  $config_permits ])
            </div>
        @endForeach
    </div>
    </form>