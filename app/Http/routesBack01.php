<?php

use App\Dpa;
use App\Fileentry;
use App\Kegiatan;
use App\OrganisasiSkpd;
use App\Program;
use App\Realisasi;
use App\Rkpd;
use App\User;
use App\Bidang;
use App\Urusan;

use Illuminate\Filesystem\Filesystem;
// echo base_path();


// dd(( new Filesystem)->files(base_path().'\/app'));

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// dd($_SERVER);
Route::controller('bidang', 'BidangController', [
    'getFormUpload' => 'bidang.f.u',
    'postUpload' => 'bidang.u',
    'getListUploaded' => 'bidang.l.u',
    'getFormImport' => 'bidang.f.i',
    'postImportToTable' => 'bidang.i.t.t',
    'getListTable' => 'bidang.l.t',
    'postExportToFile' => 'bidang.e.t.f'
]);


Route::get('/', 'WelcomeController@index');

Route::get('home',array('as'=>'home', 'uses' =>'HomeController@index'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


    // Route::controller('filemanager', 'FilemanagerLaravelController');
Route::group(array('middleware' => 'auth'), function(){

    Route::controller('filemanager', 'FilemanagerLaravelController');

    Route::get('user/profile', function () {
          // Uses Auth Middleware
      });
    // Route::controller('filemanager', 'FilemanagerLaravelController');
});


/*DEBUG MODE========DEBUG MODE========DEBUG MODE========DEBUG MODE========DEBUG MODE=================================================*/

Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
  'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[ 
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);


Route::get('e',function ($value='')
{
  // return view('easyui.full');
  return view('home')->with('content', 'achmadi');
});






Route::get('excelr', function ()
{
  $reader='http://laravel5.com/fileentry/get/phpD3.tmp.xlsx';




   $dataexcel=Excel::load($reader='storage\app\php6EA5.tmp.xlsx', function($reader) {

    // dd($reader);
    // dd($reader->get());//xxx
    // dd($reader->all()[0]);//xx
    // echo get_class(get_class($reader->setActiveSheetIndex(0)));
    // var_dump(get_class_methods($reader->setActiveSheetIndex(0)));

                      // dd($reader);
                      // dd($reader->getExcel()->getSheet()); //xxx
                      // dd($reader->setActiveSheetIndex(0)->getRowDimensions());
                      // dd($reader->setActiveSheetIndex(0)->getCellCollection());
    // dd(get_class($reader->setActiveSheetIndex(0)));

     // $reader->setActiveSheetIndex(0)->getCell('G22')->getValue();
           foreach ( $reader->setActiveSheetIndex(0)->getCellCollection() as $sell) {
                        // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
                        // $obj = $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
                        $value=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
                        // write data
                        $reader->getActiveSheet()->setCellValue($sell, 'Agussss');
                        
           }
                        // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell('B'.'19')->getValue();
                        // dd($reader->all()[0]);
                        // dd($reader->toObject());xxxx

                        // $reader->setActiveSheetIndex(0);
                        // $reader->getActiveSheet()->setCellValue('G22', 'Agussss')
                            // ->setCellValue('C7', '5');
     // $reader->createWriter($reader, 'Excel2007');
     // $reader->create('Nimit New.xlsx')->store('xlsx');


    })->setFileName('achmadi_BSSSS')->save('xlsx');
   // ->export('xlsx');
  // ->get();//tidak bisa dipakai xxx
   // dd($dataexcel);
  
  // echo dd($dataexcel->take(10));//xx
  // echo $dataexcel->getTitle();
  // foreach($dataexcel as $sheet)
  // {
  //     // get sheet title
  //   echo $sheet->getTitle();
  //   // dd($sheet);

  // }
   // dd($dataexcel);
   
  $dataExcel=Excel::selectSheets('2008-2009')->load('storage\app\php6EA5.tmp.xlsx', 
    function ($reader)
    {
      echo $reader->setActiveSheetIndex(0)->getCell('B7')->getValue();
    })->setFileName('achmadi_B')->save('xlsx');
    // })->store('xlsx','E:\xampp 1.8.3\htdocs\laravel5\storage/exports/phpD3.xlsx');

  // ->convert('csv');
  // dd($dataExcel->getFileName());

  
   // Storage::disk('local')->put('simpan.xlsx',  File::get($dataexcel));//xxx
   // 
  // Excel::create('sasa')->store('xlsx');//xxx

});
Route::get('m',   function ()
{
  $u=new Urusan;
  $u->tahun=2018;
  $u->kd_urusan=65;
  $u->nm_urusan='Nama Urusan 09999999';
  $u->save();

  dd( Urusan::all()->toArray());



});\
Route::get('jsonX',['as' => 'json', function ()
{
  $h='<a href="#" data-url="{{ route("bidang.f.u")}}">Upload</a>';

  $j='[{
  "id":1,
  "text":"Upload",
  "attributes":{
      "url":"/demo/book/abc",
      "price":100
  },
  "children":[]
},{
  "id":2,
  "text":"Excel ",
  "state":"closed",
  "children":[{
    "id":21,
    "text":"Excel 1"
  },{
    "id":23,
    "text":"Excel 2"
  },{
    "id":24,
    "text":"Excel 3"
  },{
    "id":25,
    "text":"Excel 4"
  }]
},{
  "id":3,
  "text":"Results",
  "state":"closed",
  "children":[{
    "id":33,
    "text":"Result Excel 1"
  },{
    "id":34,
    "text":"Result Excel 2"
  },{
    "id":35,
    "text":"Result Excel 3"
  }]
}]';

 
// print_r((array) json_decode($j));
// echo dd(arrayCastRecursive(json_decode($j)));

// return json_encode(arrayCastRecursive(json_decode($j)));
// var_dump((arrayCastRecursive(json_decode($j))));
// echo arrayCastRecursive($j);
// $obj = new stdClass;
// $obj->aaa = 'asdf';
// $obj->bbb = 'adsf43';
// $arr = array('asdf', array($obj, 3));

// var_dump($arr);
// $arr = arrayCastRecursive($arr);
// var_dump($arr);

}]);

function arrayCastRecursive($array)
{
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = arrayCastRecursive($value);
            }
            if ($value instanceof stdClass) {
                $array[$key] = arrayCastRecursive((array)$value);
            }
        }
    }
    if ($array instanceof stdClass) {
        return arrayCastRecursive((array)$array);
    }
    return $array;
}

// Route::group(array('middleware' => 'auth'), function(){
//     Route::controller('admin/filemanager', 'FilemanagerLaravelController');
// });

