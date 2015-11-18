<?php namespace App\FormRequests;

use Illuminate\Foundation\Http\FormRequest;
use Sentinel\FormRequests\UserCreateRequest as SentinelUserCreateRequest;

class UserCreateRequest extends SentinelUserCreateRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	// public function authorize()
	// {
	// 	return true;
	// }

	// /**
	//  * Get the validation rules that apply to the request.
	//  *
	//  * @return array
	//  */
	// public function rules()
	// {
	// 	$rules =  [
 //            'email' => 'required|min:4|max:254|email',
 //            'password' => 'required|min:6|confirmed',
 //            'password_confirmation' => 'required'
	// 	];

 //        // If Usernames are enabled, add username validation rules
 //        if (config('sentinel.allow_usernames')) {
 //            $rules['username'] = 'required|unique:users,username';
 //        }

 //        return $rules;
	// }
	public function response(array $errors)
	   {
		   	$data['msg']='Gagal';
		   	// $data['errors']=$errors;
		   	$data['errors']=array_flatten($errors);
		   	$data['code']=403;
		   	// echo json_encode($data);
		   	return \Response::make(json_encode($data), 403);
	   }
	 public function forbiddenResponse()
	 {
	    
	     return \Response::make('Permission denied foo!', 200);
	 }

}
