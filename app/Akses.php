<?php namespace App;

use Illuminate\Database\Eloquent\Model;
// use Sentinel\Models\Group as SenGroup;
use App\Group;

class Akses extends Model {

	protected $table = 'akses';
	 // public $incrementing  = false;
	 public $timestamps = false;
	 // protected $guarded = ['id', 'account_id'];

	 /**
	  * The attributes that are mass assignable.
	  *
	  * @var array
	  */
	
	 protected $fillable =[
	 'controller',
	 'controller_method',
	 'group_id',
	 'akses',
	 'arr_id',
	 'table_id',
	 'route_name'
	 	];
	//  public $kolom=[
	// 'A'=>	'id',
	// 'B'=>	'tahun',
	// 'C'=>	'kd_urusan',
	// 'D'=>	'kd_bidang',
	// 'E'=>'nm_bidang'
	// ];
	 function groups()
	 {
	 	// return $this->belongsToMany('App\Group', 'group_akses', 'groups_id', 'akses_id');

	 	// return $this->belongsToMany('App\Groups');
	 	return $this->belongsTo('App\Group');
	 }

}
