
@section('footer')
<script type="text/javascript">
				$('#mm').menu({
					onClick:function(item){
		        //...
		    }
		});
				$('#contentCenter').datagrid(
				{
					url:'datagrid_data1.json',
					// title:'Daftar Unit Kerja',
					toolbar: '#tb',
					columns:[[
			// {field:'productid',title:'No',width:200},
			{field:'productid',title:'Tahun ',width:20},
			{field:'productid',title:'No. SPPD ',width:20},
			{field:'productid',title:'Tgl. SPPD '},
			{field:'productid',title:'Jenis SPPD ',width:20},
			{field:'productid',title:'SKPD ',width:20},
			{field:'productid',title:'Penerima ',width:20},
			{field:'productid',title:'Keperluan ',width:20}
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
			fitColumns:true
			// scrollbarSize:10,
			// pageSize:10
		});

				$('#cc_skpd, #cc_skpd2').combobox({
					url:'combobox_data.json',
					valueField:'id',
					textField:'text',
					onSelect: function(rec){
						alert('selected')
				// var url = 'get_data2.php?id='+rec.id;
				// $('#cc2').combobox('reload', url);
			}

		});


		jQuery(document).ready(function($) {
				$( "p" ).click(function( event ) {
				alert( event.currentTarget === this ); // true
				});
			$('#mm1,#mm2,#mm3,#mm4,submm2').on('click', function(event) {
				// event.preventDefault();
				// event.target.is('a')
				// console.log($('#menus,#mm1,#mm2,#mm3,#mm4').find('a'));
				console.log(event.target);
					if ($(event.target).is('a')) {
						openPage($(event.target).attr('data-link'))
					// alert($(event.target).attr('data-link'));
					// $.get($(event.target).attr('data-link'), function(data) {
					// 	var isi= $('#content-x').empty().html(data)
					// 	console.log(isi);
					// 	// isi.find('.easyui-layout').layout()
					// 	// isi.find('.easyui-tabs').tabs()
					// 	 // $('#target').empty().html(tpl).find('.easyui-layout').layout();

					// });
				};

				// alert('menus');
				/* Act on the event */
			});
		});
		function openPage(url) {
			$.get(url, function(data) {
				var isi= $('#content-x').empty().html(data)
				console.log(isi);
				// isi.find('.easyui-layout').layout()
				// isi.find('.easyui-tabs').tabs()
				 // $('#target').empty().html(tpl).find('.easyui-layout').layout();

			});
		}

// localhost/easyui/jquery-easyui-1.4.1/demoku/layout/entry dokumen sppd.html
	</script>

	@endsection