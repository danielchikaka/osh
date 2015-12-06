<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use App\Models\Page;
use App\Models\Category;
use Redirect;

class PagesController extends Controller {

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
		$pages = Page::orderBy('created_at','DESC')->get();
		return view('pages.index',compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all()->lists('title_en','id');

		return view('pages.create',compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$formdata = $request->all();
		$validator = Validator::make($formdata, Page::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $formdata['user_id'] = Auth::user()->id;
		Page::create($formdata);
		return Redirect::route('pages.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$page = Page::findBySlug($slug);
		return view('pages.show',compact('page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$page = Page::find($slug);
		$categories = Category::all()->lists('title_en','id');

		return view('pages.edit',compact('page','categories'));
	}	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$page = Page::find($slug);
		$page->update(['is_published'=>($page->is_published)?0:1]);
		return Redirect::route('pages.index');

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$page = Page::find($id);
		
		$formdata = $request->all();
		$validator = Validator::make($formdata, Page::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $formdata['user_id'] = Auth::user()->id;

		$page->update($formdata);
		return Redirect::route('pages.index');		

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = Page::find($id);
		$page->delete();	
		return Redirect::route('pages.index');		
		
	}

}
