<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mymodel extends Model {

		
		//  public static function boot()
		//  {
		//     parent::boot();
		//     // static::creating(function($model)
		//     // {
		//     //     $user = Auth::user();            
		//     //     $model->created_by = $user->id;
		//     //     $model->updated_by = $user->id;
		//     // });
		//     // static::updating(function($model)
		//     // {
		//     //     $user = Auth::user();
		//     //     $model->updated_by = $user->id;
		//     // });        
		// }


 	public function validate($data)
 	{
 	    $v = \Validator::make($data, $this->rules);
 	    return $v;

 	}
    public function file($data)
    {
		return $this->belongsTo('App\File', 'files_id');
    }
}
