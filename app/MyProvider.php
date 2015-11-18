<?php namespace App;

use Cartalyst\Sentry\Groups\Eloquent\Provider;

// use Illuminate\Database\Eloquent\Model;

class MyProvider extends Provider {

	public function findAll()
	{
		$model = $this->createModel();
		// dd(get_class($model));//"App\Group"
		// dd(get_class($model->newQuery()->get())); //"Illuminate\Database\Eloquent\Collection"
		// dd($model->newQuery()->get()->toArray()); //"Illuminate\Database\Eloquent\Collection"

		
		// return $model->newQuery()->get()->toArray();
		return $model->newQuery()->get()->all();
		// $model->akses;
            // $akses = Group::find($group_id)->akses()->get()->toArray();

		// dd($model->with('akses'));
		// dd($model->with('akses')->get()->toArray());
		dd($model->with('akses')->paginate()->toArray());
		return 'achmadi';
	}


}
