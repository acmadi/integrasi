<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Eksport extends Model {

	//
	protected $fillable=[
	'files_id',
	'imports_id',
	'users_id',
	'nama_file',
	'link_file',
	'status_eksport'
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
	public function import()
	{
		return $this->belongsTo('App\Import', 'imports_id');
	}
}
