<?php

// use Excel;

// Cache::flush();
// Event::listen('illuminate.query', function($sql)
//   {
//      var_dump($sql);
    
//   });
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
// return View::make('auth.login');



Route::get('/', 'WelcomeController@index');

// Route::get('/', 'HomeController@index');
Route::get('home', 'DasboardController@index');

Route::get('excelr', function ()
{
  $reader='http://laravel5.com/fileentry/get/phpD3.tmp.xlsx';




   $dataexcel=Excel::load($reader='storage\app\phpD3.tmp.xlsx', function($reader) {

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
           // foreach ( $reader->setActiveSheetIndex(0)->getCellCollection() as $sell) {
           //              // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
           //              // $obj = $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
           //              $value=$reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue();
           //              // write data
           //              $reader->getActiveSheet()->setCellValue($sell, 'Agussss');
                        
           // }
                        // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell('B'.'19')->getValue();
                        // dd($reader->all()[0]);
                        // dd($reader->toObject());xxxx

                        // $reader->setActiveSheetIndex(0);
                        // $reader->getActiveSheet()->setCellValue('G22', 'Agussss')
                            // ->setCellValue('C7', '5');
     // $reader->createWriter($reader, 'Excel2007');
     // $reader->create('Nimit New.xlsx')->store('xlsx');


    });
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
   
  $dataExcel=Excel::selectSheets('2008-2009')->load('storage\app\phpD3.tmp.xlsx', 
    function ($reader)
    {
      echo $reader->setActiveSheetIndex(0)->getCell('G22')->getValue();
    })->setFileName('achmadi_B')->save('xlsx');
    // })->store('xlsx','E:\xampp 1.8.3\htdocs\laravel5\storage/exports/phpD3.xlsx');

  // ->convert('csv');
  // dd($dataExcel->getFileName());

  
   // Storage::disk('local')->put('simpan.xlsx',  File::get($dataexcel));//xxx
   // 
  // Excel::create('sasa')->store('xlsx');//xxx

});


// Route::get('home', 'HomeController@index');
// Route::get('Dasboard', ['as' => 'xxx', 'uses' => 'DasboardController@index']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['middleware' => 'auth'], function()
{

    Route::controller('filemanager', 'FilemanagerLaravelController');
    // Route::get('/', function()
    // {
    //     // Uses Auth Middleware
    // });
    
    // Route::get('/', 'HomeController@index');
    // Route::get('rekening', 'RekeningController@index');
    Route::get('rekening', ['as' => 'rekening', 'uses' => 'RekeningController@index']);
    
    // Route::post('rekening', 'RekeningController@index');
    Route::post('rekening/edit', 'RekeningController@edit');
    Route::post('rekening/simpan', 'RekeningController@simpan');
    Route::get('rekening/hapus/{id?}', function($id)
          {
      // $id = array('no_rek'=>$id);
      // print_r($id);
      // $id=array($id);
      // $app = app();
      // $controller = $app->make('App\Http\Controllers\RekeningController');
      // return $controller->callAction('hapus', $id);
      // exit($id);
               $del=new App\Http\Controllers\RekeningController;
                return $del->hapus($id);
                // return redirect('rekening');
          });

    Route::get('rekening/edit', 'RekeningController@edit');
    Route::controller('saldo_awal', 'SaldoawalController');
    // Route::get('jurnal_umum', 'JurnalumumController@index');
    Route::controller('jurnal_umum', 'JurnalumumController');
    Route::controller('ref_json', 'RefjsonController');
    Route::controller('buku_besar', 'BukubesarController');
    Route::controller('jurnal_penyesuaian', 'JurnalpenyesuaianController');
    Route::get('tutup_buku', 'DasboardController@index');
    Route::get('/', 'DasboardController@index');

    Route::get('user/profile', function()
    {
        // Uses Auth Middleware
    });


});

/* demo mode ============================================================================================*/
Route::get('form/{id}', function ($value=1){
  return view('easyui.form'.$value);
});
Route::get('form2', function ($value=''){
  return view('app')->with('content','easyui.form2');
});
Route::post('form/{id}', function ($id='')
{
  $token = htmlspecialchars($_REQUEST['_token']);
if ($id==2) 
{  $name = htmlspecialchars($_REQUEST['name']);
  $email = htmlspecialchars($_REQUEST['email']);
  $phone = htmlspecialchars($_REQUEST['phone']);
  $file = $_FILES['file']['name'];
  // $file = 'aaa';
  echo "<<<INFO
    <div style=\"padding:0 50px\">
    <p>Name: $name</p>
    <p>Email: $email</p>
    <p>Phone: $phone</p>
    <p>File: $file</p>
    </div>
    INFO $token";}

  if ($id==1) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject  = $_POST['subject'];
    $message   = $_POST['message'];

    echo "Name: $name <br/> Email: $email <br/> Subject: $subject <br/>$token<br/> Message:$message";

  }
});


Route::get('logout', function($name = null)
{
    // return $name;
    Auth::logout();
    return redirect('/home');
});

// Route::get('user/{id}', 'UserController@showProfile');
Route::controller('usersXX/{link}/{d}', 'UserController');
Route::resource('users', 'UserController');

// Route::resource('modelNames', 'ModelNameController');
// Route::resource('modelNames', 'ModelNameController',
//                 [
//                 'only' => ['index', 'show'],
//                   'except' => ['create', 'store', 'update', 'destroy']
//                 ]);


// Route::any('photos/{aaa}', 'PhotoController@create');
Route::resource('photos', 'PhotoController');
Route::resource('modelNames', 'ModelNameController'
    // ,['only' => ['index', 'show','create','store', 'destroy']]
    // ,['except' => ['create', 'store', 'update', 'destroy']]
    // ,['names' => ['create' => 'modelNames.build']]
  );

// Route::get('modelNames/{id}/delete', [
//     'as' => 'modelNames.delete',
//     'uses' => 'ModelNameController@destroy',
// ]);

Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);


Route::get('{name?}', function($name = null)
{
    // print_r($name);
    $warning= '<h1> Url ini  : "<b>'. $name .'</b>" tidak terdaftar </h1>';
    $css='
body {
    background: url("asset/images/notFound.jpg") repeat scroll 0 0 rgba(0, 0, 0, 0);
    font: 13px/20px "TitilliumText14L250wt","Helvetica Neue",Helvetica,Arial,sans-serif;
    margin: 0;
    padding: 0;
    width: 100%;
}';
    return view('auth.login', ['warning'=>$warning, 'css'=>$css]);
    exit();
    // echo  __class__.' Missing methode : '.__function__.' on FIle : '.__file__.' line : '.__line__;
  // print_r( get_class_methods(App\Rekening::where('no_rek', '>', 131)));
  // $input=131;
  // print_r( App\Rekening::where('no_rek', '=',$input )->orWhere('nama_rek','like',$input)->get()->toArray());
  // print_r( App\Rekening::where('no_rek', '=',$input )->orWhere('nama_rek','like','%'.$input.'%')->get()->toArray());
  
  // $data =App\Rekening::paginate(15);
  // print_r( get_class_methods($data));
  // print_r(App\Rekening::paginate(5)->toarray()) ;
  // echo "\n";
  // $pagi=new Illuminate\Pagination\Paginator;
  // print_r($pagi);
  // echo $data->appends('aaaaaa');
  // echo $data->render();
  // print_r($data=App\Rekening::paginate(15)->toArray());

  print_r( get_class(App\Rekening::where('no_rek', '>', 131))); echo "\n";
  print_r( get_class_methods((App\Rekening::where('no_rek', '>', 131))));echo "\n";
  echo "\n \n \n \n \n ";
  // 
  print_r( get_class(App\Rekening::all())); echo "\n";
  print_r( get_class_methods((App\Rekening::all())));echo "\n";
    // print_r(App\Rekening::all()->toArray());
  
  echo "\n \n \n \n \n ";
  $rek= new App\Rekening;
  print_r(get_parent_class($rek)); echo "\n";
  print_r(get_class_methods($rek));
    
    // return view('home')->with('content','Halaman '.$name.' : tidak terdaftar');
    return '!!';
});

// 0  Illuminate\Database\Eloquent\Builder->where()
// 1  call_user_func_array() called at [E:\xampp 1.8.3\htdocs\laravel5\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php:3362]
// 2  Illuminate\Database\Eloquent\Model->__call()
// 3  App\Rekening->where()
// 4  call_user_func_array() called at [E:\xampp 1.8.3\htdocs\laravel5\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php:3376]
// 5  Illuminate\Database\Eloquent\Model::__callStatic()
// 6  App\Rekening::where() called at [E:\xampp 1.8.3\htdocs\laravel5\app\Http\routes.php:132]

//  0  Illuminate\Support\Collection->all() called at [E:\xampp 1.8.3\htdocs\laravel5\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php:384]
// 1  Illuminate\Database\Eloquent\Builder->getModels() called at [E:\xampp 1.8.3\htdocs\laravel5\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php:162]
// 2  Illuminate\Database\Eloquent\Builder->get() called at [E:\xampp 1.8.3\htdocs\laravel5\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php:662]
// 3  Illuminate\Database\Eloquent\Model::all() called at [E:\xampp 1.8.3\htdocs\laravel5\app\Http\routes.php:136]
#4  App\Providers\RouteServiceProvider->{closure}()

  
 
 

