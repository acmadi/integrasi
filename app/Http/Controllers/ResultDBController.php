<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\File;
use App\Eksport;
use App\Bidang;
use App\Dpa;
use App\Kegiatan;
use App\OrganisasiSkpd;
use App\Program;
use App\Realisasi;
use App\Rkpd;
use App\User;
use App\Urusan;

use App\Traits\DbTrait;

use Illuminate\Support\Facades\Response;

class ResultDBController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	use DbTrait;

	function __Construct()
	{
	    $this->middleware('sentry.admin');
		
	}
	
	
	/**
	 * 
	 */
	public function getListTable($db){
		$db=$db;
			$url['postDataImported']=route('resultdb.dt.i',  ['db'=> $db] );
		$url['anyDetailTable']=route('resultdb.det.t',  ['db'=> $db] );
			// $url['postDataDetailImported']=route('resultdb.d.det.t',  ['db'=> $db] );
		$url['postExportToFile']=route('resultdb.e.t.f',  ['db'=> $db] );
		$url['anyDeleteTable']=route('resultdb.d.t',  ['db'=> $db] );
		// $url['FormUpload']=route('resultdb.f.u').'/'.$db;
		// $anyDeleteFile=route('resultdb.d.f');
		// $postDataUploaded=route('resultdb.dt.u');
		return view('easyN.ListDbResulted')->with('url',$url)->with('db', $db);
	}
	
	/**
	 * 
	 */
	public function postDataImported(Request $req, $db)	{
		$page=1; 
		if ($req->get('page')) {
			$page=$req->get('page');
		}
		$rows=10;
		if ($req->get('rows')) {
			$rows=$req->get('rows');
		}
		$entries = File::with('user','import','eksport')->skip($page)->where('db_table',$db)->take($rows)->paginate();
		// dd($rows);
		// dd($entries->toArray());
		$newEntry=[];
		$i=0;
		// foreach ($entries->toArray()['data'] as $entry) {
		foreach ($entries as $entry) {
			// dd($entry);
			$newEntry[$i]=$entry;
			// $newEntry[$i]['oleh']=$entry['user']['email']; $i++;
			$newEntry[$i]['email']=!empty($entry->user)? $entry->user->email : 'tidak diketahui '; 
			$newEntry[$i]['import.status_import']=!empty($entry->import)? $entry->import->status_import: 'Belum';
			// dd($entry->import->user->email);
			$newEntry[$i]['import.user.email']=!empty($entry->import->user->email)?$entry->import->user->email: 'Belum'; 
			$newEntry[$i]['eksport.status_eksport']=!empty($entry->eksport)? $entry->eksport->status_eksport: 'Belum';
			$newEntry[$i]['eksport.user.email']=!empty($entry->eksport->user->email)?$entry->eksport->user->email: 'Belum'; 
			$newEntry[$i]['eksport.link_file']=!empty($entry->eksport->link_file)?'<a href="'.$entry->eksport->link_file.'">'.$entry->eksport->nama_file.'</a>' : 'Belum'; $i++;
			// $newEntry[$i]['import.users.email']=(!empty($entry['import']) && !empty($entry['import']['users_id']) )? $entry['import']['status_import']: '----'; $i++;
		}
		$result['total']=$entries->toArray()['total'];
		// $result['rows']=$entries->toArray()['data'];
		$result['rows']=$newEntry;
		return json_encode($result);
	}
	
	/**
	 * 
	 */
	public function anyDetailTable($db, $idData)	{
		// $data=$this->mod($db)->where('filename','=',$idData)->get();
		// dd($data);
		$fileName=explode('.', $idData);
		$koloms=$this->mod($db)->kolom;
		$postDataDetailImported=route('resultdb.d.det.t').'/'.$db.'/'.$fileName[0];
		$postExportToFile=route('resultdb.e.t.f').'/'.$db.'/'.$fileName[0];
		$anyDeleteTable=route('resultdb.d.t').'/'.$db;
		$idgrid=$db.'-'.$fileName[0];
		return view('easyN.ExportDbGrid')->with('postDataDetailImported', $postDataDetailImported)->with('koloms',$koloms)
		->with('postExportToFile', $postExportToFile)->with('idgrid', $idgrid);
	}
	
	/**
	 * 
	 */
	public function postDataDetailImported($db, $files_id){
		$data=$this->mod($db)->where('files_id',$files_id)->get();
		
		if (Eksport::where('files_id',$files_id)->get()->count() >= 1) {
			$data=0;
			$result['msg']='File Sudah di-Import';
			$result['error']='error_step';
		}
		$result['total']=10000;
		$result['rows']=$data;
		return json_encode($result);
	}
	
	/**
	 * 
	 */
	public function postExportToFile(Request $req,$db,$idData){
		// dd($req->all());
		$file=File::find($idData);
			$file_name = $file->filename;
		$keytable=$this->mod($db)->kolom;
		$datapost=$req->all()['data'];
		$readkey=0;
		// dd($datapost);
		// $ins=\Excel::load($reader="storage\app\/$idData.tmp.xls");
		$ins=\Excel::load($reader="storage\app\/".$file_name);
		$tmp=$ins->setActiveSheetIndex(0);
		// $tmp=$ins->setActiveSheetIndexByName();
		  $template_excel= $tmp->toArray(null, true,true,true);
		  // print_r($data);
		  $arr = array();
		foreach ( $template_excel as $key => $value) {
		    $baris=$key;
		    if ($key >= 11) {
		    		foreach ($keytable as $kolom => $header) {
		    			// echo $kolom.$baris.' : '.$datapost[$readkey][$header].'--';
				        $tmp->setCellValue($kolom.$baris,  $datapost[$readkey][$header]) ;//ini utnuk update
		    				
		    		}
		      // foreach ($value as $key => $value) {
		      //     // $row[$model[$key]]=$value;
		    	 // // $bantu=preg_replace("/[^A-Z]/","",$sell);
		      // 	// dd($key);
		      // 	// dd($keytable[$key]);
		      // 	// $data[$readkey][$keytable[]]
		      // 	// echo $readkey;	
		      // 	if (isset($keytable[$key])) {
			     //    $tmp->setCellValue($key.$baris,  $datapost[$readkey][$keytable[$key]]) ;//ini utnuk update
		      // 	}
		      // }
		      // $arr[]=(object)$row;
		    $readkey++;
		    }
		}
		$current_date= date("Y-m-d"); 
		$nama_file_download= $db.'_'.$current_date.'_'.$idData;
		$ins->setFileName($nama_file_download);
		
		if($ins->save('xlsx')){
				// ca_export=tat ke export table
				$data_export['files_id'] =    $file->id ; 
				$data_export['imports_id'] =   $file->import->id ; 
				$data_export['users_id'] =    \Sentry::getUser()->id ; 
				// $data_export['link_file'] =  route('resultdb.d',['filename'=> $nama_file_download ]) ; 
				$data_export['link_file'] =  route('resultdb.d',[  'tabel'=> $db, 'filename'=> $nama_file_download ]) ; 
				$data_export['status_eksport'] = 'ok ' ;
				$data_export['nama_file'] =  $nama_file_download ;
				$data_export['created_at'] =  $current_date ;
				Eksport::create($data_export);
			$response['msg']='Export Selesaill <br> Silahkan tunggu atau Klik link <a href="'.route('resultdb.d',[ 'tabel'=> $db, 'filename'=> $nama_file_download]).'" >ini</a>';
			$response['download']=route('resultdb.d',[ 'tabel'=> $db, 'filename'=> $nama_file_download]) ;
			$response['code']=200;
			return json_encode($response);
		   // ->export('xlsx');
		}
		// $ins=\Excel::load($reader='storage\app\/'.$idData.'.tmp.xlsx');
		// $tmp=$ins->setActiveSheetIndexByName($db);
		// 	$data= $tmp->toArray(null, true,true,true);
		// 	// print_r($data);
		// 	$arr = array();
		// foreach ( $data as $key => $value) {
		// 		$baris=$key;
		// 		if ($key >= 11) {
		// 			foreach ($value as $key => $value) {
		// 					// $row[$model[$key]]=$value;
		// 				$tmp->setCellValue($key.$baris, $value)	;//ini utnuk update
		// 			}
		// 			// $arr[]=(object)$row;
		// 		}
		// }
		// dd($tmp);
		// $tmp->create('Nimit New.xlsx')->store('xlsx');
	}
	
	/**
	 * 
	 */
	public function anyDeleteTable(Request $req, $db)	{
		// ECHO $req->get('filename');
		// dd(explode('.', $req->get('filename'))[0]);
		$model=$this->mod($db);
		// $model->where('filename','=',$req->get('filename'))->delete();
		$export= Eksport::where('files_id',$req->get('file_id'));
		// dd($export->delete());
		if (count($export)) {
				$nama_file=$export->get()[0]->nama_file.'.xlsx';
				$dir_export='exports/';
				// echo $dir_export.$nama_file;
				// dd(\Storage::disk('local')->exists($dir_export.$nama_file) );
				if (\Storage::exists($dir_export.$nama_file)  and \Storage::delete($dir_export.$nama_file) ) {
					if ($export->delete()) {
						$response['code']=200;
						$response['msg']="Menghapus export : ".$nama_file." Sukses";
					}
				}
				else{
					$response['code']=400;
					$response['msg']=" Gagal!  File export : ".$nama_file." Tidak Ada";
				}
		}
		else{
			$response['code']=400;
			$response['msg']="Terjadi Kesalahan";
		}
		echo json_encode($response);
	}
	
	/**
	 * 
	 */
	public function getDownload( $db, $filename ){
		$ins=\Excel::load($reader='storage\app\exports\/'.$filename.'.xlsx')->setFileName($filename)->export('xlsx');
		// $ins=\Excel::load($reader="storage\/exports\/$filename.tmp.xlsx")->setFileName('fsfs')->export('xlsx');
		// $ins=\Excel::load($reader='\storage\/'.$filename.'.tmp.xlsx')->setFileName('fsfs')->export('xlsx');
		return $ins;
			
			// $entry = File::where('filename', '=', $filename)->firstOrFail();
			// $file = \Storage::disk('local')->get($entry->filename);
			// // dd($file);
	 	// 	// return $file;
	 	// 	// return response()->download($pathToFile);
	 	// 	return response()->download($file);
	 	// 	return \Response::download($file);
			// return (new \Response($file, 200))
	  //             ->header('Content-Type', 'xlsx');
		}
	 
	
	/**
	 * 
	 */
	// public function getFormImport($filename){
	// 		// dd($filename);
	// 	$fileName=explode('.', $filename);
	// 		$anyReadExcel=route('bidang.r.e').'/'.$fileName[0];
	// 		$routeForpostImportToTable=route('bidang.i.t.t');
	// 		$idForUnikGrid='BidangFI-'.$fileName[0];
	// 		return view('easyN.ImportExcelGrid')->with('re', $anyReadExcel)
	// 		->with('itt', $routeForpostImportToTable)->with('idgrid', $idForUnikGrid);
	// }
	
}
