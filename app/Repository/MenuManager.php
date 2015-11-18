<?php namespace App\Repository;
// use Repository\MenuManager
/**
 Class MenuManager
	Handling Global Menu Manager 
*/
class MenuManager
{
	public $menu = array();


	
	function createMenu($id='', $text='', $children= array())
	{
		$addMenu['id']=$id;
		$addMenu['text']=$text;
		$addMenu['children']=$children;
		$this->menu[]=$addMenu;
		return $this->menu;
		
	}
	function subMenu($id='', $text='', $children= array())
	{
		$addMenu['id']=$id;
		$addMenu['text']=$text;
		$addMenu['children']=$children;
		// $this->menu[]=$addMenu;
		return $addMenu;
		
	}
	public function textLink( $text='', $route='',$title='default')
	{
		return '<a href="#" style="width:250px; display:block;" data-title="'.$title.'" data-link="'.route($route).'" >'.$text.'</a>';
	}
	public function render()
	{
		return json_encode($this->menu);
	}
	function arrayCastRecursive($array)
	{
	    if (is_array($array)) {
	        foreach ($array as $key => $value) {
	            if (is_array($value)) {
	                $array[$key] = arrayCastRecursive($value);
	            }
	            if ($value instanceof stdClass) {
	                $array[$key] = arrayCastRecursive((array)$value);
	            }
	        }
	    }
	    if ($array instanceof stdClass) {
	        return arrayCastRecursive((array)$array);
	    }
	    return $array;
	}

}



// Array
// (
//     [0] => Array
//         (
//             [id] => 1
//             [text] => Upload
//             [children] => Array
//                 (
//                 )

//         )

//     [1] => Array
//         (
//             [id] => 2
//             [text] => Excel 
//             [state] => closed
//             [children] => Array
//                 (
//                     [0] => Array
//                         (
//                             [id] => 21
//                             [text] => Excel 1
//                         )

//                     [1] => Array
//                         (
//                             [id] => 23
//                             [text] => Excel 2
//                         )

//                     [2] => Array
//                         (
//                             [id] => 24
//                             [text] => Excel 3
//                         )

//                     [3] => Array
//                         (
//                             [id] => 25
//                             [text] => Excel 4
//                         )

//                 )

//         )

//     [2] => Array
//         (
//             [id] => 3
//             [text] => Results
//             [state] => closed
//             [children] => Array
//                 (
//                     [0] => Array
//                         (
//                             [id] => 33
//                             [text] => Result Excel 1
//                         )

//                     [1] => Array
//                         (
//                             [id] => 34
//                             [text] => Result Excel 2
//                         )

//                     [2] => Array
//                         (
//                             [id] => 35
//                             [text] => Result Excel 3
//                         )

//                 )

//         )

// )