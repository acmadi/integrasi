<?php namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Mymodel;

class Program extends Mymodel{

// class Program extends Model {

	protected $table = 'program';
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
	'nm_program',
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
	'E'=>'nm_program'

	  ];
	protected $rules = array(
	
	    /*Sebenarnyaaa ==============================================================*/
		'A'=>	'required|numeric|digits:4',
		'B'=>	'required|numeric|digits:4',
		'C'=>	'required|numeric|digits_between:1,5',
		'D'=>	'required|numeric|digits_between:1,5',
		'E'=>	'required|max:255'
	    );

	// public function validate($data)
	// {
	//     // make a new validator object
	//     $v = \Validator::make($data, $this->rules);
	//     // return the result
	//     return $v;

	//     // return $v->passes();
	// }

	//     public function file($data)
	//     {
	// 		return $this->belongsTo('App\File', 'files_id');
	//     }

}
