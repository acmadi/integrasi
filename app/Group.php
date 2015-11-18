<?php namespace App;

// use Illuminate\Database\Eloquent\Model;
use Sentinel\Models\Group as SenGroup;
use App\Akses;

class Group extends SenGroup {

	protected $table = 'groups';
	 // public $incrementing  = false;
	 public $timestamps = false;
	 // protected $guarded = ['id', 'account_id'];

	 /**
	  * The attributes that are mass assignable.
	  *
	  * @var array
	  */
	
	//  protected $fillable =[
	//  'tahun',
	//  'kd_urusan',
	//  'kd_bidang',
	//  'nm_bidang'
	//  	];
	//  public $kolom=[
	// 'A'=>	'id',
	// 'B'=>	'tahun',
	// 'C'=>	'kd_urusan',
	// 'D'=>	'kd_bidang',
	// 'E'=>'nm_bidang'
	// ];
	 function akses()
	 {
	 	// return $this->belongsToMany('App\Akses');
	 	// return $this->belongsToMany('App\Akses', 'group_akses', 'groups_id', 'akses_id');


	 	return $this->hasMany('App\Akses');
	 }
	 function log()
	 {
	  	return $this->hasMany('App\Log');
	 	
	 }
	 //  static function  all()
	 // {
	 // 	return 'achmadi';
	 // }

}
