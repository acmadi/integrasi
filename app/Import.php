<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model {

	//
	protected $fillable=[
	'files_id',
	'status_import',
	'jumlah_baris',
	'jumlah_kolom',
	'users_id'
	];

	protected $timestamp=true;



	public function user()
	{
		return $this->belongsTo('App\User', 'users_id');
	}
	public function file()
	{
		return $this->belongsTo('App\File', 'files_id');
	}
	public function export()
	{
		return $this->hasOne('App\Eksport', 'imports_id');
	}
}
