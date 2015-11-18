<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

	//
	protected $fillable=[
	'description',
	'filename',
	'mime',
	'original_filename',
	'db_table',
	'users_id'
	];

	protected $timestamp=true;
	

	public function user()
	{
		return $this->belongsTo('App\User', 'users_id');
	}

	public function import()
	   {
	       return $this->hasOne('App\Import', 'files_id');
	   }

	public function eksport()
	   {
	       return $this->hasOne('App\Eksport', 'files_id');
	   }



	public function bidangs()
	   {
	       return $this->hasMany('App\Bidang', 'files_id');
	   }
	public function dpas()
	   {
	       return $this->hasMany('App\Dpa', 'files_id');
	   }
	public function jenissppds()
	   {
	       return $this->hasMany('App\Jenissppd', 'files_id');
	   }
	public function kegiatans()
	   {
	       return $this->hasMany('App\Kegiatan', 'files_id');
	   }
	public function organisasiskpds()
	   {
	       return $this->hasMany('App\organisasiskpds', 'files_id');
	   }
	public function programs()
	   {
	       return $this->hasMany('App\Program', 'files_id');
	   }
	   
	public function realisasis()
	   {
	       return $this->hasMany('App\Realisasi', 'files_id');
	   }
	public function rkpd()
	   {
	       return $this->hasMany('App\Rkpds', 'files_id');
	   }
	public function skpds()
	   {
	       return $this->hasMany('App\Skpds', 'files_id');
	   }
	public function unitkerjas()
	   {
	       return $this->hasMany('App\Unitkerja', 'files_id');
	   }
	public function urusans()
	   {
	       return $this->hasMany('App\Urusan', 'files_id');
	   }
	   
	

}
