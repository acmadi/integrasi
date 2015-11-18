<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/
	// Only route ======================================================================================
// 	[
// 		"Controllers"=>null,
// 		"methode"=>null,
// 		"routeName"=>'home',
// 		"akses"=>'1',
// 		"name"=>'Tampilkan Home Page'
// 	],
// 	[
// 		"Controllers"=>null,
// 		"methode"=>null,
// 		"routeName"=>'ajaxgrid',
// 		"akses"=>'1',
// 		"name"=>'Tampilkan grid data master'
// 	],
// 	[
// 		"Controllers"=>null,
// 		"methode"=>null,
// 		"routeName"=>'token',
// 		"akses"=>'1',
// 		"name"=>'Mengambil data token untuk token form'
// 	],
// 	[
// 		"Controllers"=>null,
// 		"methode"=>null,
// 		"routeName"=>'pdf',
// 		"akses"=>'1',
// 		"name"=>'Akses membuat laporan PDF'
// 	],
// 	[
// 		"Controllers"=>null,
// 		"methode"=>null,
// 		"routeName"=>'lap.prev.grid',
// 		"akses"=>'1',
// 		"name"=>'Akses membuat laporan PDF'
// 	],
// 	[
// 		"Controllers"=>null,
// 		"methode"=>null,
// 		"routeName"=>'lap.prev.data',
// 		"akses"=>'1',
// 		"name"=>'Akses membuat laporan PDF'
// 	],
// 	[
// 		"Controllers"=>null,
// 		"methode"=>null,
// 		"routeName"=>'tahun',
// 		"akses"=>'1',
// 		"name"=>'Akses referensi data'
// 	],

// 	// Controller master=======================================================================
// 	[
// 		"Controllers"=>'App\Http\Controllers\JenissppdController',
// 		"methode"=>'anyData',
// 		"routeName"=>'jenis-sppd.index',
// 		"akses"=>'1',
// 		"name"=>'Aksi Tampilkan daftar Jenis SPPD'
// 	],
// 	[
// 		"Controllers"=>'App\Http\Controllers\JenissppdController',
// 		"methode"=>'store',
// 		"routeName"=>'jenis-sppd.store',
// 		"akses"=>'1',
// 		"name"=>'Aksi Simpan Jenis Sppd'
// 	]
// 	,[
// 		"Controllers"=>'App\Http\Controllers\JenissppdController',
// 		"routeName"=>'jenis-sppd.update',
// 		"methode"=>'update',
// 		"akses"=>'1',
// 		"name"=>'Aksi Update Jenis SPPD'
// 	]

// ];

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


['Controllers'=>'LogController'
	,'controller_method'=> 'getListGrid' 
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '0' 
	,'table_id'=> ''
	,'ket'=>'Daftar History'
	,'route_name'=> 'log.l.g' 
	]
,['Controllers'=>'LogController'
	,'controller_method'=> 'postListGridData' 
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '1' 
	,'table_id'=> ''
	,'ket'=>'Isi Data History'
	,'route_name'=> 'log.l.g.d' 
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'getFormUpload'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '2' 
	,'table_id'=> ''
	,'ket'=>'Ambil Form Upload'
	,'route_name'=>'excel.f.u'
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'postUpload'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '3' 
	,'table_id'=> ''
	,'ket'=>'Upload File'
	,'route_name'=>'excel.u'
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'getListUploaded'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '4' 
	,'table_id'=> ''
	,'ket'=>'Daftar file terupload'
	,'route_name'=>'excel.l.u'
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'postDataUploaded'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '5' 
	,'table_id'=> ''
	,'ket'=>'Aksi Upload Excel'
	,'route_name'=>'excel.dt.u'
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'anyDeleteFile'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '6' 
	,'table_id'=> ''
	,'ket'=>' Delete file terupload'
	,'route_name'=>'excel.d.f'
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'anyDeleteHasilImport'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '7' 
	,'table_id'=> ''
	,'ket'=>'Hapus hasil import'
	,'route_name'=>'excel.d.h.i'
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'getFormImport'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '8' 
	,'table_id'=> ''
	,'ket'=>'Ambil form import '
	,'route_name'=>'excel.f.i'
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'anyReadExcel'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '9' 
	,'table_id'=> ''
	,'ket'=>'Baca excel untuk import'
	,'route_name'=>'excel.r.e'
	]
,['Controllers'=>'ExcelController'
	,'controller_method'=> 'postImportToTable'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '10' 
	,'table_id'=> ''
	,'ket'=>'Aksi Import Table'
	,'route_name'=>'excel.i.t.t'
]
,['Controllers'=>'ResultDBController'
	,'controller_method'=> 'getListTable'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '11' 
	,'table_id'=> ''
	,'ket'=>'Daftar ekspor file'
	,'route_name'=>'resultdb.l.t'
]
,['Controllers'=>'ResultDBController'
	,'controller_method'=> 'postDataImported'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '12' 
	,'table_id'=> ''
	,'ket'=>'Daftar data terimport'
	,'route_name'=>'resultdb.dt.i'
	]
,['Controllers'=>'ResultDBController'
	,'controller_method'=> 'anyDetailTable'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '13' 
	,'table_id'=> ''
	,'ket'=>'Detail import data '
	,'route_name'=>'resultdb.det.t'
	]
,['Controllers'=>'ResultDBController'
	,'controller_method'=> 'postDataDetailImported'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '14' 
	,'table_id'=> ''
	,'ket'=>'Simpan data import'
	,'route_name'=>'resultdb.d.det.t'
	]
,['Controllers'=>'ResultDBController'
	,'controller_method'=> 'postExportToFile'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '15' 
	,'table_id'=> ''
	,'ket'=>'Aksi ekspor ke file '
	,'route_name'=>'resultdb.e.t.f'
	]
,['Controllers'=>'ResultDBController'
	,'controller_method'=> 'anyDeleteTable'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '16' 
	,'table_id'=> ''
	,'ket'=>'Hapus hasil import'
	,'route_name'=>'resultdb.d.t'
	]
,['Controllers'=>'ResultDBController'
	,'controller_method'=> 'getDownload'
	,'group_id'=> '' 
	,'akses'=> '' 
	,'arr_id'=> '17' 
	,'table_id'=> ''
	,'ket'=>'Dowload file eksport'
	,'route_name'=>'resultdb.d'
	]
];


