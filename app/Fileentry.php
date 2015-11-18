<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model {

	//
	protected $fillable=[
		'description',
		'filename',
		'mime',
		'original_filename',
		'db',
		'users_id'

	];
	public function users()
	{
		return $this->belongsTo('App\user');
	}
}
