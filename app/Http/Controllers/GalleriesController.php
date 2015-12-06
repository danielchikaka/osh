<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Redirect;
use Validator;
use Illuminate\Http\Request;

class GalleriesController extends Controller {
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>['index']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = Gallery::where('id','!=',1)->orderBy('created_at','DESC')->paginate(10);
		return view('galleries.index',compact('galleries'));		
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$galleries = Gallery::orderBy('created_at','DESC')->get();
		return view('galleries.backend.index',compact('galleries'));		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	return view('galleries.create');		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data, Gallery::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		Gallery::create($data);

		return Redirect::route('galleries.admin');		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Gallery::find($id);
		return view('galleries.edit',compact('category'));		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$category = Gallery::find($id);
		
		$data = $request->all();
		$validator = Validator::make($data, Gallery::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $data['user_id'] = Auth::user()->id;

		$category->update($data);
		return Redirect::route('galleries.admin');		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Gallery::find($id);
		$category->update(['is_published'=>($category->is_published)?0:1]);
		return Redirect::route('galleries.admin');			
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$gallery = Gallery::findBySlug($slug);
		$gallery->update(['is_published'=>($gallery->is_published)?0:1]);
		return Redirect::route('galleries.admin');

	}
}
