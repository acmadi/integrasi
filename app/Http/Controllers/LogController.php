<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Fileentry;

use App\Bidang;
use App\Dpa;
use App\Kegiatan;
use App\OrganisasiSkpd;
use App\Program;
use App\Realisasi;
use App\Rkpd;
use App\User;
use App\Urusan;
use App\Log;


// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;;


class LogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	function __Construct()
	{
	    $this->middleware('sentry.admin');
		
	}

	public function getListGrid($db='bidang')
	{
		$mod=$this->mod('log')->kolom;
		$url['log.l.g.d']=route('log.l.g.d').'/'.$db;
		$UnikId=$db;
		return  view('easyN.LogGrid')->with('title',$db)->with('url',$url)->with('koloms',$mod);
		// ->with('UnikId',$UnikId);
	}
	public function postListGridData(Request $req,$db='bidang')
	{

		/* paging biasa ======================================   select * from `dokumen` limit 0,10  */
		// if ($req->get('page')) {
		//     if ($req->get('page')==1) {
		//         $offset=$req->get('page')-1;
		//     }
		//     else{
		//          $offset=($req->get('page')-1)*$req->get('rows');
		//     }

		//     $data->skip($offset);
		// }
		// if ($req->get('rows')) {
		//     $data->take($req->get('rows'));
		    
		// }
		// if ($req->get('sort') && $req->get('order')) {
		//     $data->orderBy($req->get('sort'), $req->get('order'));
		    
		// }
		// $datax['rows']=$this->show_relasi_kolom($data->get());
		// $total['total'] = \DB::table('dokumen')->count();
		/**  ,=== snippet ===============================================================================
		*/

		$offset=1;
		if ($req->get('page')) {
			if ($req->get('page')==1) {
			    $offset=$req->get('page')-1;
			}
			else{
			     $offset=($req->get('page')-1)*$req->get('rows');
			}
		}
		$rows=10;
		if ($req->get('rows')) {
			$rows=$req->get('rows');
		}
		
		// $log = Log::where('table','=',$db)->skip($page)->take($rows)->paginate();
		$log = Log::with('users','groups')->where('table',$db)->skip($offset)->take($rows)->paginate();
		// dd($rows);
		// dd($log->toArray());
		$newdata=[];
		$i=0;
		foreach ($log->toArray()['data'] as  $data) {
			$newdata[$i]=$data;
			$newdata[$i]['users_email']=$data['users']['email'];
			$newdata[$i]['groups_name']=$data['groups']['name'];
			$i++;
		}

		// $result['total']=$log->toArray()['total'];
		$result['total']=count($log->toArray()['data']);

		// $result['rows']=$log->toArray()['data'];
		$result['rows']=$newdata;
		return json_encode($result);


	}
	
	private function mod($db)
	{
		switch($db) {
		   case "bidang":
		        $model= new Bidang();
		        break;
		   case "dpa":
		        $model= new Dpa();
		        break;
		   case "kegiatan":
		        $model= new Kegiatan();
		        break;
		   case "organisasi_skpd":
		        $model= new OrganisasiSkpd();
		        break;
			case "program":
		        $model= new Program();
		        break;
		    case "realisasi":
		        $model= new Realisasi();
		        break;
		    case "rkpd":
		        $model= new Rkpd();
		        break;
		    case "urusan":
		        $model= new Urusan();
		        break;
		    case "log":
		        $model= new Log();
		        break;
			}
			return $model;
	}

	

}
