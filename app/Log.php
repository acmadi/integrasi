<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {

	protected $table = 'log';
	 // public $incrementing  = false;
	 // public $timestamps = false;
	 // protected $guarded = ['id', 'account_id'];

	 /**
	  * The attributes that are mass assignable.
	  *
	  * @var array
	  */
	
	 protected $fillable =[
	 'users_id',
	 'groups_id',
	 'arr_id',
	 'table',
	 'table_id',
	 'action_name',
	 'catatan'
	 
	];
	public $kolom =[
	 'users_email'=>'Pengguna ',
	 'groups_name'=>'Group ',
	 // 'arr_id',
	 'table'=>'Tabel ',
	 // 'table_id',
	 // 'action_name',
	 'catatan'=> 'Catatan ',
	 'created_at'=> 'Waktu Akses '
	 
	];
	// public $kolom;
	//  public $kolom=[
	// // 'A'=>	'required',
	// // 'B'=>	'required|digits:4',
	// // 'C'=>	'required|digits_between:1,5',
	// // 'D'=>	'required|digits_between:1,5',
	// // 'E'=>	'required|digits_between:1,255'
	// ];

    private $rulesXX = array(
    'color' => 'required|alpha|min:3',
    'size'  => 'required',
        // .. more rules here ..
    );
    private $rules = array(
	
    /*Sebenarnyaaa ==============================================================*/
    'users_id'=>	'required',
    'groups_id'=>	'required',
    'arr_id'=>	'required',
    'table'=>	'required',
    'action_name'=>	'required',
    'catatan'=>	'required'
    );
    public function __Construct()
    {
    	// $this->kolom=$this->fillable;
    	parent::__Construct();

    }
    public function users()
    {
    	return $this->belongsTo('App\user');
    }
    public function groups()
    {
    	return $this->belongsTo('App\Group');
    }
    // public function validate($data)
    // {
    //     // make a new validator object
    //     $v = \Validator::make($data, $this->rules);
    //     // return the result
    //     return $v;

    //     // return $v->passes();
    // }

}
