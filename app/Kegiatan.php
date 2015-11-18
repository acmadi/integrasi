<?php namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Mymodel;

class Kegiatan extends Mymodel{

// class Kegiatan extends Model {

	protected $table = 'kegiatan';
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
	'nm_kegiatan',
	'fileentries_id',
		 'files_id',
		 'exports_id',
	'created_at',
	'updated_at',
	'filename'
	 	];
	 public $kolom=[
	 'A'=>'tahun',
	 'B'=>'kd_urusan',
	 'C'=>'kd_bidang',
	 'D'=>'kd_program',
	 'E'=>'kd_kegiatan',
	 'F'=>'nm_kegiatan'

	 ];
	     protected $rules = array(
	 
	     /*Sebenarnyaaa ==============================================================*/
	 	'A'=>	'required|numeric|digits:4',
	 	'B'=>	'required|numeric|digits:4',
	 	'C'=>	'required|numeric|digits_between:1,5',
	 	'D'=>	'required|numeric|digits_between:1,5',
	 	'E'=>	'required|numeric|digits:4',
	 	'F'=>	'required|max:255'
	     );

	 //     public function validate($data)
	 //     {
	 //         // make a new validator object
	 //         $v = \Validator::make($data, $this->rules);
	 //         // return the result
	 //         return $v;
	 //     }


  //   public function file($data)
  //   {
		// return $this->belongsTo('App\File', 'files_id');
  //   }
 //    'files_id',
	// 'exports_id',

 //    public function file($data)
 //    {
	// 	return $this->belongsTo('App\File', 'files_id');
 //    }


}
