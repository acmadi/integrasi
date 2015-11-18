<?php namespace Sentinel\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class GroupUpdateRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	// public function authorize()
	// {
	// 	return true;
	// }

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	// public function rules()
	// {
	// 	return [
 //            'name' => 'required|min:4|unique:groups'
	// 	];
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
	     // Optionally, send a custom response on authorize failure 
	     // (default is to just redirect to initial page with errors)
	     // 
	     // Can return a response, a view, a redirect, or whatever else
	     return \Response::make('Permission denied foo!', 200);
	 }

}
