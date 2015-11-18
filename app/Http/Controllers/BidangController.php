<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Fileentry;
use App\Bidang;

// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;;


class BidangController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	function __construct()
	{
		$this->middleware('sentry.admin');
        // $this->middleware('sentry.admin');
	}
	

	public function getFormUpload()
	{
		
		return  view('easyN.FormUpload');
	}
	
	public function postUpload(Request $req) {
		$response=array();

		if ( $req->file('excelF')) {
			$file = $req->file('excelF');
			$extension = $file->getClientOriginalExtension();
			$filename= $file->getClientOriginalName();
			/*periksa extensi file */
			if ('xlsx'!==$extension) {
				$response['code']=404;
				$response['msg']="File berextensi $extension dengan nama $filename, file Seharusnya Berupa Excel";
				// $response['msg']="File Anda   $file->getClientOriginalName(), Pastikan File yang Anda upload sesuai dengan format ";

				return $response;
				 // return $response;
			}
			elseif (\Storage::disk('local')->put($file->getFilename().'.'.$extension, \File::get($file))) {
				// simpan kedadalam table
				$entry = new Fileentry();
				$entry->mime = $file->getClientMimeType();
				$entry->original_filename = $file->getClientOriginalName();
				$entry->filename = $file->getFilename().'.'.$extension;
				$entry->save();
				$response['code']=200;
				$response['msg']="File  $entry->original_filename Telah disimpan";
				return $response;
			}
		}
		$response['code']=404;
		$response['msg']="Gagal Upload File !!!";
		
		return json_encode($response);
		 // echo '{"TEST1": 454535353,"TEST2": "test2"}';
	}
	// function anyDeleteFile($filename='',$fileentries_id='')
	function anyDeleteFile(Request $req)
	{
		// dd($req->all());

		// hapus file yang terupload !!!!
		$filename= $req->get('filename');
		$response=array();

		if (\Storage::disk('local')->exists($filename)) {
			if (\Storage::disk('local')->delete($filename)){
			$pesan="File \" $filename \" Telah Dihapus dari local Storage ";
				$file = Fileentry::find($req->get('id'));
				if ($file->delete()) {
					$pesan .=" File Telah Terhapus dari DB !!";

				}
				
			}
			$response['code']=200;
			$response['msg']=$pesan;
			// return '{"code":200,"msg":"File  bidang.xlsx Telah disimpan"}';

			return json_encode($response);

		}
			$response['code']=404;
			$response['msg']="Gagal menghapus File $filename !!";
			return json_encode($response);
		
	}

	public function getListUploaded(){
		
		// dd($entries->toArray());

		// dd($entries);
		$anyDeleteFile=route('bidang.d.f');

		return view('easyN.ListUploaded')->with('df',$anyDeleteFile);

		// ->with('content',$result);
	}
	/*param Request
	1. $page   Int
	2.	$rows 	Int
	3.  Bidang 	Session 
	*/
	public function postDataUploaded(Request $req)
	{
		// dd($req->all());
		// ->skip($offset)
		//    ->take($perpage)
		//    ->get();

		$page=1;
		if ($req->get('page')) {
			$page=$req->get('page');
		}
		$rows=10;
		if ($req->get('rows')) {
			$rows=$req->get('rows');
		}
		
		$entries = Fileentry::skip($page)->take($rows)->paginate();
		// dd($rows);
		// dd($entries->toArray());

		$result['total']=$entries->toArray()['total'];
		$result['rows']=$entries->toArray()['data'];
		return json_encode($result);

		# code...
	}


	public function getFormImport($filename){
			// dd($filename);
		$fileName=explode('.', $filename);

			$anyReadExcel=route('bidang.r.e').'/'.$fileName[0];
			$routeForpostImportToTable=route('bidang.i.t.t');

			$idForUnikGrid='BidangFI-'.$fileName[0];

			return view('easyN.EditableExcel')->with('re', $anyReadExcel)
			->with('itt', $routeForpostImportToTable)->with('idgrid', $idForUnikGrid);
	}
	function anyReadExcel($filename)
	{

		// $columns = \Schema::getColumnListing('users'); // users table
		// dd($columns); // dump the result and die
	$dataExcel=\Excel::load($reader='storage\app\/'.$filename.'.tmp.xlsx', function($reader) { //Maatwebsite\Excel\Readers\LaravelExcelReader
				// dd($reader->sheet(1));//Maatwebsite\Excel\Classes\LaravelExcelWorksheet
				// dd(get_class($reader->setActiveSheetIndex(0)));

		 		 // echo get_class(get_class($reader->setActiveSheetIndex(0)));
		                   // dd($reader->getExcel()->getSheet()); //xxx
		                   
		                   // dd($reader->setActiveSheetIndex(0)->getCellCollection());
				$frame	=[
						'A'=>	'id',
						'B'=>	'tahun',
						'C'=>	'kd_urusan',
						'D'=>	'kd_bidang',
						'E'=>'nm_bidang'
						];
						// dd( $reader->setActiveSheetIndex(0)->getCellCollection());

			$acuan=11;
			$start=0;
			$dataExcel=array();
		    foreach ( $reader->setActiveSheetIndex(0)->getCellCollection() as $sell) {
		    				// echo "$sell";
		    				$key=preg_replace("/[^0-9]/","",$sell);
		    				$bantu=preg_replace("/[^A-Z]/","",$sell);

		    				// echo $bantu;
		    				// echo $acuan;
		    				if($key==$acuan){

		    					// $dataExcel[$start][$frame[$bantu]]=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
		    					$dataExcel[$start][$frame[$bantu]]=$reader->setActiveSheetIndex(0)->getCell($sell)->getValue();
		    					// $data[$frame[$bantu]]=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
		    					// $dataExcel[$start]=(object)$data;
		    				}
		    				else{ $acuan++;
		    					$start++;
		    					// $dataExcel[$start][$frame[$bantu]]=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
		    					$dataExcel[$start][$frame[$bantu]]=$reader->setActiveSheetIndex(0)->getCell($sell)->getValue();
		    					// $data[$frame[$bantu]]=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
		    					// $dataExcel[$start]=(object)$data;
		    				}
		    				// echo $reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
							// $key=preg_replace("/[^0-9]/","",$sell);
							// if($key==$acuan){
							// $dataExcel[$acuan][$sell]=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
							// }
							// else{ $acuan++;
							// $dataExcel[$acuan][$sell]=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
							// }

		                     // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
		                     // $obj = $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
		                     // $dataExcel[$sell]=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
		                      // echo $reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();

		                     // write data
		                     // $reader->getActiveSheet()->setCellValue($sell, 'Agussss');
		                     
		        }
// 		        $json='{"total":28,"rows":[
// 	{"itemid":"FI-SW-01","productid":"KoiA","listprice":10.00,"unitcost":10.00,"attr1":10.00,"status":10.00},
// 	{"itemid":"FI-SW-01","productid":"KoiB","listprice":10.00,"unitcost":10.00,"attr1":10.00,"status":10.00},
// 	{"itemid":"FI-SW-01","productid":"KoiC","listprice":10.00,"unitcost":10.00,"attr1":10.00,"status":10.00},
// 	{"itemid":"FI-SW-01","productid":"KoiD","listprice":10.00,"unitcost":10.00,"attr1":10.00,"status":10.00}
	
// ]}
// ';

// echo "<pre>";
		        // echo $json;
		        // print_r(json_decode(json_encode( json_decode($json))));

		        // print_r($dataExcel);
		        
		        foreach ($dataExcel as $value) {
		        	$datax[]=(object)$value;
		        }
		        $data['total']=30;
		        $data['rows']=$datax;
		        
// // 		        // print_r(json_decode(json_encode(json_decode( json_encode($data)))));
// 		          // echo json_encode((object)$data);
		          echo json_encode((object)$data);
		        
		        // echo json_encode(json_decode(json_encode($data)));


		        // foreach ($dataExcel as $key => $value) {
		        // 		foreach ($value as  $value) {
		        // 			// echo $value;

		        // 		}
		        // }
		        
		       


		                     // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell('B'.'19')->getValue();
		                     // dd($reader->all()[0]);
		                     // dd($reader->toObject());xxxx

		                     // $reader->setActiveSheetIndex(0);
		                     // $reader->getActiveSheet()->setCellValue('G22', 'Agussss')
		                         // ->setCellValue('C7', '5');
		  // $reader->createWriter($reader, 'Excel2007');
		  // $reader->create('Nimit New.xlsx')->store('xlsx');
		        // dd($dataExcel);

		         // print_r($dataExcel);
		        // echo json_encode(json_decode(json_encode($dataExcel)));



		 });
		// return json_encode(json_decode(json_encode($dataExcel)));

			// ->setFileName('achmadi_BSSSS')->save('xlsx');
		// }
		
	}
	public function postImportToTable(Request $req){


		// dd($req->get('data'));
		// if ($req->get('data')) {
		// 		Bidang::insert($req->get('data'));
		// 		$response['code']=200;
		// 		$response['msg']="Import File Selesai";
		// 		return json_encode($response);
		// }
		$response['msg']='';
		$response['code']=200;
		if($req->get('data')){
			foreach ($req->get('data') as $value) {
				$row=json_encode($value);
				if(!Bidang::create($value)){
					$response['msg'].="Data ini $row Error <br>";
					return json_encode($response);
				}
				else {
					$response['msg'].="Data ini $row  OK <br>";
				}
			}
		return json_encode($response);
		}
		$response['code']=404;
		$response['msg']="Gagal Import File !!!";
		return json_encode($response);
		
	}


	public function getListTable(){
		

		return __class__;
	}

	public function postExportToFile(Request $req){


	}

	

}
