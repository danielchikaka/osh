<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use File;
use Redirect;

class SocialsController extends Controller {
	protected $file;

	function __construct() {
		$this->file = app_path().'/socials.json';
		if(!file_exists($this->file)){
			$fl = fopen($this->file, 'w');
			fclose($fl);
		}
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$settings = File::get($this->file);
		$settings = json_decode($settings);

		return view('socials.create',compact('settings'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$settings = File::get($this->file);
		$settings = json_decode($settings);

		return view('socials.create',compact('settings'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		unset($data['_token']);
		$settings = File::put($this->file,json_encode($data));

		return Redirect::route('socials.index');
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$settings = File::get($this->file);
		$settings = json_decode($settings);	
		return view('socials.edit',compact('settings'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$data = $request->all();
		$settings = File::put($this->file,json_encode($data));


		return Redirect::route('socials.index');
	}


}
