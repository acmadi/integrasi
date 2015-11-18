<?php namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Mymodel;

class Realisasi extends Mymodel{

// class Realisasi extends Model {

	protected $table = 'realisasi';
	 // public $incrementing  = false;
	 public $timestamps = false;
	 // protected $guarded = ['id', 'account_id'];

	 /**
	  * The attributes that are mass assignable.
	  *
	  * @var array
	  */
	
	 protected $fillable =[
	 'tahun',
	 'kd_urusan',
	 'kd_bidang',
	 'kd_program',
	 'kd_kegiatan',
	 'kd_skpd',
	 'realisasi_bulan_1',
	 'realisasi_bulan_2',
	 'realisasi_bulan_3',
	 'realisasi_bulan_4',
	 'realisasi_bulan_5',
	 'realisasi_bulan_6',
	 'realisasi_bulan_7',
	 'realisasi_bulan_8',
	 'realisasi_bulan_9',
	 'realisasi_bulan_10',
	 'realisasi_bulan_11',
	 'realisasi_bulan_12',
	 'fileentries_id',
			'files_id',
			'exports_id',
	 'created_at',
	 'updated_at',
	 'filename',
	 	];
	 public $kolom=[
	'A'=>'tahun',
	'B'=>'kd_urusan',
	'C'=>'kd_bidang',
	'D'=>'kd_program',
	'E'=>'kd_kegiatan',
	'F'=>'kd_skpd',
	'G'=>'realisasi_bulan_1',
	'H'=>'realisasi_bulan_2',
	'I'=>'realisasi_bulan_3',
	'J'=>'realisasi_bulan_4',
	'K'=>'realisasi_bulan_5',
	'L'=>'realisasi_bulan_6',
	'M'=>'realisasi_bulan_7',
	'N'=>'realisasi_bulan_8',
	'O'=>'realisasi_bulan_9',
	'P'=>'realisasi_bulan_10',
	'Q'=>'realisasi_bulan_11',
	'R'=>'realisasi_bulan_12'
	   ];

	  protected $rules = array(
	 
	     /*Sebenarnyaaa ==============================================================*/
	 	'A'=>	'required|numeric|digits:4',
	 	'B'=>	'required|numeric|digits:4',
	 	'C'=>	'required|numeric|digits_between:1,5',
	 	'D'=>	'required|numeric|digits_between:1,5',
	 	'E'=>	'required|numeric|digits_between:1,5',
	 	'F'=>	'required|numeric|digits_between:1,5',
	 	'G'=>'required|numeric|digits_between:1,20',
	 	'H'=>'required|numeric|digits_between:1,20',
	 	'I'=>'required|numeric|digits_between:1,20',
	 	'J'=>'required|numeric|digits_between:1,20',
	 	'K'=>'required|numeric|digits_between:1,20',
	 	'L'=>'required|numeric|digits_between:1,20',
	 	'M'=>'required|numeric|digits_between:1,20',
	 	'N'=>'required|numeric|digits_between:1,20',
	 	'O'=>'required|numeric|digits_between:1,20',
	 	'P'=>'required|numeric|digits_between:1,20',
	 	'Q'=>'required|numeric|digits_between:1,20',
	 	'R'=>'required|numeric|digits_between:1,20'

	     );

	 // public function validate($data)
	 // {
	 //     // make a new validator object
	 //     $v = \Validator::make($data, $this->rules);
	 //     // return the result
	 //     return $v;

	 //     // return $v->passes();
	 // }

  //    public function file($data)
  //    {
 	// 	return $this->belongsTo('App\File', 'files_id');
  //    }
	   


}
