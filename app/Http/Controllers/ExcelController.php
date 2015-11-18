<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Dpa;
use App\File;
use App\Import;
use App\Kegiatan;
use App\OrganisasiSkpd;
use App\Program;
use App\Realisasi;
use App\Rkpd;
use App\Bidang;
use App\User;
use App\Urusan;

use App\Traits\DbTrait;

use Illuminate\Support\Facades\Response;;

class ExcelController extends Controller {

	use DbTrait;
	
	/**
	 * 
	 */
	public function __construct() 
	{
	    $this->middleware('sentry.admin');
	}
	
	/**
	 * 
	 */
	public function getListUploaded($db='bidang'){
		$url['DataUploaded']		=route('excel.dt.u',  ['db'=>$db] );
		$url['FileImport']			=route('excel.f.i',  ['db'=>$db] );
		$url['FormUpload']			=route('excel.f.u',  ['db'=>$db] );
		$url['DeleteFile']			=route('excel.d.f',  ['db'=>$db] );
		$url['DeleteHasilImport']	=route('excel.d.h.i',  ['db'=>$db] );
		return view('easyN.ListExcelUploaded')->with('url',$url)->with('db', $db);
	}
	
	/**
	 * 
	 */
	public function postDataUploaded(Request $req,$db)
	{
		
		$page=1; 
		if ($req->get('page')) {
			$page=$req->get('page');
		}
		$rows=10;
		if ($req->get('rows')) {
			$rows=$req->get('rows');
		}
		$Files = File::with('user','import')->skip($page)->where('db_table',$db)->take($rows)->paginate();
	
		$rows=[];
		$i=0;
		foreach ($Files as $file) {
			$rows[$i]=$file;
			// $rows[$i]['oleh']=$file['user']['email']; $i++;
			$rows[$i]['user.email']=!empty($file->user)? $file->user->email : 'tidak diketahui '; 
			$rows[$i]['import.status_import']=!empty($file->import)? $file->import->status_import: 'Belum';
			// dd($file->import->user->email);
			$rows[$i]['import.user.email']=!empty($file->import->user->email)?$file->import->user->email: 'Belum'; 
			$i++;
			// $rows[$i]['import.users.email']=(!empty($file['import']) && !empty($file['import']['users_id']) )? $file['import']['status_import']: '----'; $i++;
		}
		$result['total']=$Files->toArray()['total'];
		// $result['rows']=$entries->toArray()['data'];
		$result['rows']=$rows;
		return json_encode($result);
	}
	
	/**
	 * 
	 */
	public function getFormUpload($db='bidang')
	{
		$db=$db;
		$UrlUpload=route('excel.u').'/'.$db;
		$UnikId=$db;
		return  view('easyN.FormUploadExcel')->with('url',$UrlUpload)->with('UnikId',$UnikId);
	}
	
	/**
	 * 
	 */
	public function postUpload(Request $req,$db) {
		$response=array();
		$file = $req->file('excelF');
		/*periksa type file excel ======================================================================================*/
		if ( $file && ( $file->getClientMimeType() == 'application/vnd.ms-excel' or $file->getClientMimeType() == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ) ) {
			$extension = $file->getClientOriginalExtension();
			$filename= $file->getClientOriginalName();
		
			if (\Storage::disk('local')->put($file->getFilename().'.'.$extension, \File::get($file))) {
				// simpan kedadalam table
				$entry = new File();
				$entry->mime = $file->getClientMimeType();
				$entry->original_filename = $file->getClientOriginalName();
				$entry->filename = $file->getFilename().'.'.$extension;
				$entry->description = $req->get('description', ' Tanpa Deskripsi ! ');
				$entry->db_table = $db;
				$entry->users_id = \Sentry::getUser()->id;
				$entry->save();
				$response['code']=200;
				$response['msg']="File  $entry->original_filename Telah disimpan";
				return $response;
			}
		}
		elseif( $req->file('excelF')  ) {
			$extension = $file->getClientOriginalExtension();
			$filename= $file->getClientOriginalName();
			
				$response['code']=404;
				$response['msg']="File berextensi $extension dengan nama $filename, file Seharusnya Berupa Excel";
				// $response['msg']="File Anda   $file->getClientOriginalName(), Pastikan File yang Anda upload sesuai dengan format ";
				return $response;
				 // return $response;
		}
		else{
		$response['code']=404;
		$response['msg']="Anda belum mimilih format file untuk diupload !!!";
		
		return json_encode($response);
		}
	}
	
	/**
	 * 
	 */
	public function anyDeleteFile(Request $req)
	{
		// dd($req->all());
		// hapus file yang terupload !!!!
		$filename= $req->get('filename');
		$response=array();
		if (\Storage::disk('local')->exists($filename)) {
			if (\Storage::disk('local')->delete($filename)){
			$pesan="File \" $filename \" Telah Dihapus dari local Storage ";
				$file = File::find($req->get('id'));
				if ($file->delete()) {
					$pesan .=" File Telah Terhapus dari DB !!";
				}
				
			}
			$response['code']=200;
			$response['msg']=$pesan;
			// return '{"code":200,"msg":"File  bidang.xlsx Telah disimpan"}'
			return json_encode($response);
		}
			$response['code']=404;
			$response['msg']="Gagal menghapus File $filename !!";
			return json_encode($response);
		
	}
	
	/**
	 * 
	 */
	public function anyDeleteHasilImport(Request $req,$db)
	{
		
		$files_id= $req->get('files_id');
		$mod=$this->mod($db)->where('files_id', $files_id);
		$response=array();
		if ($mod->get()->count() >=1 ) {
			if ($mod->delete()){
				$pesan="File \" $files_id \" Telah Dihapus dari Import ";
				$file = File::find($req->get('id'));
				if ( Import::where('files_id',  Import::where('files_id',$files_id)->delete() )->delete()) {
					$pesan .="Hasil Import Telah Terhapus dari DB !!";
				}
				
			}
			$response['code']=200;
			$response['msg']=$pesan;
			// return '{"code":200,"msg":"File  bidang.xlsx Telah disimpan"}';
			return json_encode($response);
		}
			$response['code']=404;
			$response['msg']="Gagal menghapus File ".$files_id." !!";
			return json_encode($response);
		
	}
	
	/**
	 * 
	 */
	public function getFormImport($db,$file_id)
	{
			$koloms=$this->mod($db)->kolom;
			$anyReadExcel=route('excel.r.e').'/'.$db.'/'.$file_id;
			$routeForpostImportToTable=route('excel.i.t.t').'/'.$db.'/'.$file_id;
			$idForUnikGrid=$db.'-'.$file_id;
			return view('easyN.ImportExcelGrid')->with('re', $anyReadExcel)->with('koloms',$koloms)
			->with('itt', $routeForpostImportToTable)->with('idgrid', $idForUnikGrid);
	}
	
	/**
	 * 
	 */
	public function anyReadExcel($db, $id)
	{
		$file_read_start=2;
		$file=File::find($id);
		$model=$this->mod($db)->kolom;
		// dd($this->mod($db)->where('files_id',$id)->get()->count());
		if ($this->mod($db)->where('files_id', $id)->get()->count()) {
				$result['total']=0;
				$result['rows']=0;
				$result['error']='error_step';
				$result['msg']='File Sudah Diimport !!';
				return $result;
		}
		$ModelValidasi=$this->mod($db);
	
		if ($contents = \Storage::disk('local')->exists($file->filename))
		{
		    $ext='xlsx';
		}
		elseif($contents = \Storage::disk('local')->exists($file->filename))
		{
		    $ext='xls';
		}
		$ins=\Excel::load($reader='storage\app\/'.$file->filename);
		$ins->getSheetByName($db);
			$arr = array();
		
		if($ins->getSheetByName($db)){
			// exit('ada heet');
		
		$tmp=$ins->setActiveSheetIndexByName($db);
			$data= $tmp->toArray(null, true,true,true);
			// print_r($data);
			// dd($data);
			$arr = array();
			$checkError='';
		foreach ( $data as $key => $dataRow) {
				$baris=$key;
				if ($key >= $file_read_start) {
					$indexRow=$key;
								/*validasi data disinii => validasi perbarissss*/
									 // $ModelValidasi=$ModelValidasi;
									// dd( $mod->validate( $data));
									 // var_dump($dataRow);echo "<br>";
									 $validate=$ModelValidasi->validate($dataRow);
									 $ModelValidasi->validate( $dataRow);
									     $messages = $validate->messages();
									 if ( $validate->fails())
									 {
									 	//Modifikasi data yang error
									     // var_dump($messages);echo "<br>";
									     foreach ($messages->toArray() as $key => $errorMassage) {
									     				$error='';
									     				// dd($errorMassage);
									     			foreach ($errorMassage as  $value) {
									     				$error.=$value;
									     			}
									     		// $dataRow[$model[$key]]=$dataRow[$key].' Cell : '.$key.$indexRow.'-'.$error;
									     			// '<a href="#" title="This is the tooltip message." class="easyui-tooltip">Hover me</a>'
									     		// $dataRow[$key]='"'.$dataRow[$key].'" Cell : '.$key.$indexRow.'<a href="#" title="'.$error.'" class="easyui-tooltip">Hover me</a>';
									     			if (empty($dataRow[$key])) {
									     				$dataRow[$key]='kosong';
									     			}
									     		// $dataRow[$key]='<a href="#" title=" Error : '.$error.', Cell : '.$key.$indexRow.', dengan Nilai :'.$dataRow[$key].' " class="easyui-tooltip" >'.$dataRow[$key].' </a>';
									     		$dataRow[$key]='<a href="#" title=" Error : '.$error.', Cell : '.$key.$indexRow.', dengan Nilai :'.$dataRow[$key].' " class="easyui-tooltip" >'.$dataRow[$key].' </a>';
									     		$checkError='error';
									     }
									 // dd($dataRow);
									 }
								/*validasi data disinii*/
					foreach ($dataRow as $key => $value) {
								$indexCol=$key;
								// echo $indexCol.$indexRow.'--';
							//Tulis data ke adalam array
								if (isset($model[$key])) {
									$row[$model[$key]]=$value;
								}
							
						// $tmp->setCellValue($key.$baris, $value)	;//ini utnuk update
					}
					$arr[]=(object)$row;
				}
		}
		$result['rows']=$arr;
		$result['error']=$checkError;
	}
	else{
		$result['rows']=$arr;
		$result['error']='file_error';
	}
		// dd($arr);
        // $result['total']=30;
        // $result['rows']=$arr;
        // $result['error']=$checkError;
        
          return json_encode((object)$result);
	}
	
	/**
	 * 
	 */
	public function postImportToTable(Request $req,$db,$file_id){
		// dd($file_id);
		$db=$this->mod($db);
		$response['msg']='';
		$response['code']=200;
		$date = date('Y-m-d h:i:s');
	
		if($req->get('data')){
			$tanda_ok_for_log_import='ok';
			$jumlah_baris=0;
			$jumlah_kolom=0;
			foreach ($req->get('data') as $value) {
				$value['fileentries_id']='';
				$value['files_id']=$file_id;
				// dd($value);
				
				$row=json_encode($value);
				$jumlah_kolom=count($row);
				if(!$db->create($value)){
					$tanda_ok_for_log_import='err';
					$response['msg'].="Data ini $row Error <br>";
					return json_encode($response);
				}
				else {
					$tanda_ok_for_log_import='ok';
					$response['msg'].="Data ini $row  OK <br>";
				}
				$jumlah_baris++;
			}
			if ($tanda_ok_for_log_import=='ok') {
					$data_import['files_id']=    $file_id ;
					$data_import['status_import']=   'OK' ;
					$data_import['jumlah_baris']= $jumlah_baris ;
					$data_import['jumlah_kolom']= $jumlah_kolom ;
					$data_import['users_id' ]= \Sentry::getUser()->id;
					Import::create($data_import);
			}
		return json_encode($response);
		}
		$response['code']=404;
		$response['msg']="Gagal Import File !!!";
		return json_encode($response);
		
	}
}
