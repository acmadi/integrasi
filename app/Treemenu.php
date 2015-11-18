<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Treemenu extends Model {

	protected $table = 'tree_menu';
	 // public $incrementing  = false;
	 public $timestamps = false;
	 // protected $guarded = ['id', 'account_id'];

	 /**
	  * The attributes that are mass assignable.
	  *
	  * @var array
	  */
	// 'id',
	// 'parentid',
	// 'text',
	// 'instansi',
	// 'link'
	protected $fillable =[
	'id',
	'parentid',
	'text',
	'instansi',
	'link'
	 	];

	// Get instance new Object
	public function ReturnO($value='')
	{
		$tree= New Treemenu;
		return  $tree;

	}
	 // Get From Parent -> to Bottom


	public function parent($value='')
	{
		// return New Treemenu;
		// return $this->ReturnO();
		return $this->belongsTo('App\Treemenu', 'parentid');
	}
	public function recursiveParent()
	{
		// return New Treemenu;
		// return $this->ReturnO();
		return $this->parent()->with('recursiveParent');

	}


	 // Get From CHildren-> to UP
	public function child()
	{
		return $this->hasMany('App\Treemenu', 'parentid');
	}

	public function children()
	{
		return $this->child()->with('children');
	}

}
