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
use App\Treemenu;
use App\Repository\MenuManager;

use Illuminate\Filesystem\Filesystem;
// echo base_path();
Event::listen('illuminate.query', function($query)
{
    // var_dump($query);
});

// dd(( new Filesystem)->files(base_path().'\/app'));
// echo route('b.json');
// exit('linkk');
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
    'anyDeleteFile' => 'bidang.d.f',
    'postDataUploaded' => 'bidang.d.u',
    'getFormImport' => 'bidang.f.i',
    'anyReadExcel' => 'bidang.r.e',
    'postImportToTable' => 'bidang.i.t.t',
    'getListTable' => 'bidang.l.t',
    'postExportToFile' => 'bidang.e.t.f'
]);

/*Link {action}/{DB}/........{fileExcelID/DBsavedfilter}*/
Route::controller('excel', 'ExcelController', [
    'getFormUpload' => 'excel.f.u',
    'postUpload' => 'excel.u',
    'getListUploaded' => 'excel.l.u',
    'anyDeleteFile' => 'excel.d.f',
    'postDataUploaded' => 'excel.d.u',
    'getFormImport' => 'excel.f.i',
    'anyReadExcel' => 'excel.r.e',
    'postImportToTable' => 'excel.i.t.t',
    'getListTable' => 'excel.l.t',
    'postExportToFile' => 'excel.e.t.f'
]);
Route::controller('resultdb', 'ExcelController', [
    'getFormUpload' => 'resultdb.f.u',
    'postUpload' => 'resultdb.u',
    'getListUploaded' => 'resultdb.l.u',
    'anyDeleteFile' => 'resultdb.d.f',
    'postDataUploaded' => 'resultdb.d.u',
    'getFormImport' => 'resultdb.f.i',
    'anyReadExcel' => 'resultdb.r.e',
    'postImportToTable' => 'resultdb.i.t.t',
    'getListTable' => 'resultdb.l.t',
    'postExportToFile' => 'resultdb.e.t.f'
]);
Route::controller('exported', 'ExcelController', [
    'getFormUpload' => 'exported.f.u',
    'postUpload' => 'exported.u',
    'getListUploaded' => 'exported.l.u',
    'anyDeleteFile' => 'exported.d.f',
    'postDataUploaded' => 'exported.d.u',
    'getFormImport' => 'exported.f.i',
    'anyReadExcel' => 'exported.r.e',
    'postImportToTable' => 'exported.i.t.t',
    'getListTable' => 'exported.l.t',
    'postExportToFile' => 'exported.e.t.f'
]);


Route::get('/',function ($page='')
{
  // return view('easyui.full');
  return view('easyN.app')->with('content', 'achmadi');
});


// Route::get('/', 'WelcomeController@index');

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

/* App=============================================================*/
Route::get('bidang/{page}',function ($page='')
{
  // return view('easyui.full');
  return view('easyN.app')->with('content', 'achmadi');
});


/*DEBUG MODE========DEBUG MODE========DEBUG MODE========DEBUG MODE========DEBUG MODE=================================================*/
/*baruuuuuuuuu ============================================*/
Route::get('easyN/{page}',function ($page='')
{
  // return view('easyui.full');
  return view('easyN.app')->with('content', 'achmadi');
});




/*layouuut lamama ============================================*/

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
Route::get('grid',function ($value='')
{
  // return view('easyui.full');
  return view('home')->with('content', view('easyui.datagrid_1'));
});

Route::get('excelr', function ()
{

   // $dataexcel=Excel::load($reader='storage\app\php7018.tmp.xlsx', function($reader) {
   $dataexcel=Excel::load($reader='storage\app\php6A96.tmp.xlsx', function($reader) {

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

     echo $reader->setActiveSheetIndex(0)->getCell('A11')->getValue();
    // dd($reader->setActiveSheetIndexByName('Sheet1'));
     // dd($reader->setActiveSheetIndex(0)->getCellCollection());

           foreach ( $reader->setActiveSheetIndex(0)->getCellCollection() as $sell) {
                        // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
                        // $obj = $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
                        echo $sell;

                        $value=$reader->setActiveSheetIndexByName('bidang')->getCell($sell)->getValue();// SET ACTIVE SET BY INDEX NAMEEE
                        echo $value;
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


    })->setFileName('achmadi_BSSSSghfhfhfh')->save('xlsx');
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
   
  $dataExcel=Excel::selectSheets('2008-2009')->load('storage\app\php6A96.tmp.xlsx', 
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



});

Route::get('b/json',['as' => 'b.json', function ()
{
  // echo route('bidang.f.u');
  // echo route('bidang.l.t');
  // echo '<a style="display:block;width:200px;" data-link="http://192.168.1.132/excel/list-uploaded/bidang/" data-idgrid="" data-title="bidang*Import">Import</a>';
  // // echo route('bidang.l.u');
  // // echo route('exported.l.t');
  // exit();
  $s=new MenuManager();
  $s->createMenu('1',$s->textLink('Upload','bidang.f.u','Form-Upload-Excel'));
  $s->createMenu('2',$s->textLink('Excel','bidang.l.u', 'Daftar-File-Terupload'),[$s->subMenu('1',$s->textLink('Excel','bidang.f.u', 'File-1'))]);
  $s->createMenu('3',$s->textLink('ResultDB ','bidang.f.u','Daftar DB'),[$s->subMenu('1',$s->textLink('Import 1','bidang.f.u')),$s->subMenu('1',$s->textLink('Import2','bidang.f.u'))]);

  echo $s->render();
 }]);

Route::get('json',['as' => 'json', function ()
{
  // $s=new MenuManager();
  // $s->createMenu('1',$s->textLink('Upload','bidang.f.u','Form-Upload-Excel'));
  // $s->createMenu('2',$s->textLink('Excel','bidang.f.u', 'Daftar-File-Terupload'),[$s->subMenu('1',$s->textLink('Excel','bidang.f.u', 'File-1'))]);
  // $s->createMenu('3',$s->textLink('ResultDB ','bidang.f.u','Daftar DB'),[$s->subMenu('1',$s->textLink('Import 1','bidang.f.u')),$s->subMenu('1',$s->textLink('Import2','bidang.f.u'))]);
  // // $s->createMenu('1','Excel',[$s->createMenu('1','excel1'),$s->createMenu('3','excel2')]);
  // // $s->createMenu('1','DB',[$s->createMenu('1','DB1 '),$s->createMenu('3','DB2')]);
  // echo $s->render();
  // exit();
  // dd( json_decode($s->render()));

   $arr=Treemenu::all();
   $tree = buildTree($arr, 'parentid', 'id');
// print_r($tree);
  echo json_encode(json_decode(json_encode($tree)));
  exit();






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

  $X='[{
  "id":1,
  "text":"My Documents",
  "children":[{
    "id":11,
    "text":"Photos",
    "state":"closed",
    "children":[{
      "id":111,
      "text":"Friend"
    },{
      "id":112,
      "text":"Wife"
    },{
      "id":113,
      "text":"Company"
    }]
  },{
    "id":12,
    "text":"Program Files",
    "children":[{
      "id":121,
      "text":"Intel"
    },{
      "id":122,
      "text":"Java",
      "attributes":{
        "p1":"Custom Attribute1",
        "p2":"Custom Attribute2"
      }
    },{
      "id":123,
      "text":"Microsoft Office"
    },{
      "id":124,
      "text":"Games",
      "checked":true
    }]
  },{
    "id":13,
    "text":"index.html"
  },{
    "id":14,
    "text":"about.html"
  },{
    "id":15,
    "text":"welcome.html"
  }]
}]
';
dd(arrayCastRecursive(json_decode($j)));
// echo dd(arrayCastRecursive(json_decode($j)));

return json_encode(arrayCastRecursive(json_decode($j)));
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

// function arrayCastRecursive($array)
// {
//     if (is_array($array)) {
//         foreach ($array as $key => $value) {
//             if (is_array($value)) {
//                 $array[$key] = arrayCastRecursive($value);
//             }
//             if ($value instanceof stdClass) {
//                 $array[$key] = arrayCastRecursive((array)$value);
//             }
//         }
//     }
//     if ($array instanceof stdClass) {
//         return arrayCastRecursive((array)$array);
//     }
//     return $array;
// }

// Route::group(array('middleware' => 'auth'), function(){
//     Route::controller('admin/filemanager', 'FilemanagerLaravelController');
// });




function buildTree($flat, $pidKey, $idKey = null)
{
    $grouped = array();
    foreach ($flat as $sub){
        $grouped[$sub[$pidKey]][] = $sub;
    }
    // print_r($grouped);
    // exit();
    // return    $grouped ;
    $fnBuilder = function($siblings) use (&$fnBuilder, $grouped, $idKey) {
        foreach ($siblings as $k => $sibling) {
            $id = $sibling[$idKey];
            //priksa apakah punya turunan atau tidak 
            if(isset($grouped[$id])) {
                $sibling['children'] = $fnBuilder($grouped[$id]);
                // $sibling['text']='<a data-link=""'.route($sibling['route_link']).'/'.$sibling['db'].'">'.$sibling['text'].'</a>';//turunan
                // var_dump($sibling['route_link']);

                // $sibling['text']='<a data-title="'.$sibling['db'].'-'.$sibling['text'].'" data-idgrid="'.$sibling['id_datagrid'].'"
                // data-link="'.$link.'/'.$sibling['db'].'/'.$sibling['filter_filter'].'"
                // >'.$sibling['text'].'</a>';//turunan
                $link=(strlen($sibling['route_link'])>=2)?route($sibling['route_link']):'';
                $sibling['text']='<a data-title="'.$sibling['db'].'-'.$sibling['text'].'" data-idgrid="'.$sibling['id_datagrid'].'" data-link="'.$link.'/'.$sibling['db'].'/'.$sibling['filter_filter'].'" style="display:block;width:200px;">'.$sibling['text'].'</a>';//turunan

                // print_r($sibling);
                // exit();
                // var link =$(event.target).attr('data-link');
                // var panjang=$(event.target).attr('data-link').length;
                // var title =$(event.target).attr('data-title');
                // var idgrid =$(event.target).attr('data-idgrid');

            }
            //tidak punya turunan
            // $link=(strlen($sibling['route_link'])>=2)?route($sibling['route_link']):'';
            // $sibling['text']='<a  data-title="'.$sibling['link'].'" data-link="'.$link.'/'.$sibling['db'].'/'.$sibling['filter_filter'].'"data-idgrid="'.$sibling['idgrid'].'">---'.$sibling['text'].'</a>';
            // $link=(strlen($sibling['route_link'])>=2)?route($sibling['route_link']):'';
            // $sibling['text']='<a data-title="'.$sibling['db'].'-'.$sibling['text'].'" data-idgrid="'.$sibling['id_datagrid'].'"
            // data-link="'.$link.'/'.$sibling['db'].'/'.$sibling['filter_filter'].'"
            //  style="display:block;width:200px;">'.$sibling['text'].'</a>';//turunan
            $link=(strlen($sibling['route_link'])>=2)?route($sibling['route_link']):'';
            $sibling['text']='<a data-title="'.$sibling['db'].'-'.$sibling['text'].'" data-idgrid="'.$sibling['id_datagrid'].'" data-link="'.$link.'/'.$sibling['db'].'/'.$sibling['filter_filter'].'" style="display:block;width:200px;">'.$sibling['text'].'</a>';//turunan
         
            $siblings[$k] = $sibling;
        }

        return $siblings;
    };

    $tree = $fnBuilder($grouped[0]);

    return $tree;
}
Route::get('mr', function ()
{
   $exitCode = Artisan::call('route:list',['name']);
   // dd($exitCode);
  // Artisan::call('help');
    dd(Artisan::output());

});