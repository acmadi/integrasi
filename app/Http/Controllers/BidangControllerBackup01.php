<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Fileentry;

// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;;


class BidangController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	

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

	public function getListUploaded(){
		
		// dd($entries->toArray());

		// dd($entries);
		return view('easyN.ListUploaded');

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

			$routeForGrid=route('bidang.r.e');
			$idForUnikGrid='BidangFI-'.$fileName[0];

			return view('easyN.EditableExcel')->with('route', $routeForGrid)->with('idgrid', $idForUnikGrid);
	}
	function anyReadExcel(Request $req)
	{
		// dd($req->get('filename'));
		// if ($req->get('filename')) {
			
		// $dataExcel=array(1,2,3,4,5,67);

		$dataExcel=\Excel::load($reader='storage\app\php6EA5.tmp.xlsx', function($reader) {

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
			// dd($dataExcel);

			$dataExcel=array();
		    foreach ( $reader->setActiveSheetIndex(0)->getCellCollection() as $sell) {
		                     // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
		                     // $obj = $reader->setActiveSheetIndexByName('2008-2009')->getCell($sell)->getValue().'<br>';
		                     $dataExcel[$sell]=$reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();
		                     // echo $reader->setActiveSheetIndexByName('Sheet1')->getCell($sell)->getValue();

		                     // write data
		                     // $reader->getActiveSheet()->setCellValue($sell, 'Agussss');
		                     
		        }
		                     // echo $reader->setActiveSheetIndexByName('2008-2009')->getCell('B'.'19')->getValue();
		                     // dd($reader->all()[0]);
		                     // dd($reader->toObject());xxxx

		                     // $reader->setActiveSheetIndex(0);
		                     // $reader->getActiveSheet()->setCellValue('G22', 'Agussss')
		                         // ->setCellValue('C7', '5');
		  // $reader->createWriter($reader, 'Excel2007');
		  // $reader->create('Nimit New.xlsx')->store('xlsx');
		        echo json_encode(json_decode(json_encode($dataExcel)));



		 });
		// return json_encode(json_decode(json_encode($dataExcel)));

			// ->setFileName('achmadi_BSSSS')->save('xlsx');
		// }
		
	}
	public function postImportToTable(Request $req){


	}


	public function getListTable($filename){


	}

	public function postExportToFile(Request $req){


	}

	

}
