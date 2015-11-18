{{-- <div id="toolbar1"> 
   <label>Pilih SKPD:</label>
   <input id="cskpd" name="skpd" />

</div>  --}}
<div style='height:50%; overflow:hidden'>
	<table id='dx-datagrid' /></table>
</div>
<div style='height:30%; overflow:hidden'>
	<table id='x-datagrid' /></table>
</div>

<script>
$('#dx-datagrid').datagrid({
	url:'google.com ',
	resize:true,
	title:'AAAA ',
	fit:true,
	toolbar: [{
		text:'Save',
		iconCls: 'add icon-add',
		handler: function(){
			// function handler
		}
	},{
		text:'Delete',
		iconCls: 'icon-remove',
		handler: function(){
			// function handler
		}
	}],
    columns:[[
        {field:'code',title:'Code',width:100},
        {field:'name',title:'Name',width:100},
        {field:'price',title:'Price',width:100,align:'right'}
    ]],

	pagination : true,
	remoteSort:true,
	rownumbers : true,
	singleSelect:true,
	striped:true
});
	
$('#x-datagrid').datagrid({
	url:'google.com',
	resize:true,
	title:'titleAA',
	fit:true,
	toolbar: [{
		text:'textAA',
		iconCls: 'add icon-add',
		handler: function(){
			// function handler
		}
	},{
		text:'textAA',
		iconCls: 'icon-remove',
		handler: function(){
			// function handler
		}
	}],
	columns:[[
	    {field:'code',title:'Code',width:100},
	    {field:'name',title:'Name',width:100},
	    {field:'price',title:'Price',width:100,align:'right'}
	]],

	pagination : true,
	remoteSort:true,
	rownumbers : true,
	singleSelect:true,
	striped:true
});

	



</script>