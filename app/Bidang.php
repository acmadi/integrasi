<?php namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Mymodel;

class Bidang extends Mymodel{
// class Bidang extends Model {

	protected $table = 'bidang';
	 // public $incrementing  = false;
	 public $timestamps = true; 
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
	 'nm_bidang',
	 'files_id',
	 'exports_id',
	 // 'created_at',
	 // 'updated_at',
	 'filename',
	 	];
	 public $kolom=[
	'A'=>	'id',
	'B'=>	'tahun',
	'C'=>	'kd_urusan',
	'D'=>	'kd_bidang',
	'E'=>	'nm_bidang'
	// 'A'=>	'required',
	// 'B'=>	'required|digits:4',
	// 'C'=>	'required|digits_between:1,5',
	// 'D'=>	'required|digits_between:1,5',
	// 'E'=>	'required|digits_between:1,255'
	];

   
    protected $rules = array(
	// 'A'=>	'id',
	// 'B'=>	'tahun',
	// 'C'=>	'kd_urusan',
	// 'D'=>	'kd_bidang',
	// 'E'=>	'nm_bidang'
    /*demoo mode==============================================================*/
	// 'A'=>	'required',
	// 'B'=>	'required|alpha|digits:4',
	// 'C'=>	'required|alpha|digits_between:1,5',
	// 'D'=>	'required|alpha|digits_between:1,5',
	// 'E'=>	'required|max:255'

    /*Sebenarnyaaa ==============================================================*/
	'A'=>	'required',
	'B'=>	'required|numeric|digits:4',
	'C'=>	'required|numeric|digits_between:1,5',
	'D'=>	'required|numeric|digits_between:1,5',
	'E'=>	'required|max:255'
    );


  //   public function validate($data)
  //   {

  //       // make a new validator object
  //       $v = \Validator::make($data, $this->rules);
  //       // return the result
  //       return $v;

  //       // return $v->passes();
  //   }
  //   public function file($data)
  //   {
		// return $this->belongsTo('App\File', 'files_id');
  //   }

}
