<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Fileentry;

// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;;


class FileEntryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Fileentry::all();

		return view('fileentries.index', compact('entries'));
	}
	
	public function add(Request $req) {
		// dd($req->all());
		$file = $req->file('filefield');
		$extension = $file->getClientOriginalExtension();
		\Storage::disk('local')->put($file->getFilename().'.'.$extension,  \File::get($file));
		$entry = new Fileentry();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;

		$entry->save();

		return redirect('fileentry');
		
	}

	public function get($filename){

		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = \Storage::disk('local')->get($entry->filename);
		return $file;
		// dd($file);
		// dd(get_class_methods(new Response($file, 200)));
		// return (new Response($file, 200))
		//          ->header('Content-Type', $entry->mime);
	}

}
