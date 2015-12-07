<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Models\Video;

class VideosController extends Controller {



	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>['show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$videos =Video::orderBy('created_at','DESC')->paginate(10);
		return view('videos.index',compact('videos'));
	}	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$videos =Video::orderBy('created_at','DESC')->get();
		return view('videos.backend.index',compact('videos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('videos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data,Video::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		Video::create($data);

		return Redirect::route('videos.admin');
	
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$video =Video::find($id);
		return view('videos.edit',compact('video'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug)
	{
		$video =Video::find($slug);
		
		$data = $request->all();
		$validator = Validator::make($data,Video::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $data['user_id'] = Auth::user()->id;

		$video->update($data);
		return Redirect::route('videos.admin');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$video =Video::find($id);
		$video->delete();	
		return Redirect::route('videos.admin');	
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$video =Video::find($slug);
		$video->update(['is_published'=>($video->is_published)?0:1]);
		return Redirect::route('videos.admin');	

	}
}
