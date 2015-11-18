<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	public static $response=array();

	 function _missing()
	{
		return 'Route tidak ada ';
		
	}
	function view()
	{
		return view('home');
	}
	public function FunctionName($value='')
	{
		# code...
	}


    /**
     * Gets the value of response.
     *
     * @return mixed
     */
    public function getRes()
    {
        return json_encode(self::$response);
    }

    /**
     * Sets the value of response.
     *
     * @param mixed $response the response
     *
     * @return self
     */
    public function setRes($response)
    {
        self::$response= $response;

        return $this;
    }

}

