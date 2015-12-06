<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Models\PublicationCategory;

class PublicationsCategoriesController extends Controller {
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>['contactUs']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($slug)
	{
		$categories = PublicationCategory::findBySlug($slug);
		$categories->publications;
		return view('publications_categories.index',compact('categories'));
	}	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$categories = PublicationCategory::orderBy('created_at','DESC')->get();
		return view('publications_categories.backend.index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('publications_categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data, PublicationCategory::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		PublicationCategory::create($data);

		return Redirect::route('publications-categories.admin');
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$cat = PublicationCategory::findBySlug($slug);
		$publications = $cat->publications()->paginate(10);
		return view('publications.show',compact('cat','publications'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$category = PublicationCategory::findBySlug($slug);
		return view('publications_categories.edit',compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug,Request $request)
	{
		$category = PublicationCategory::find($slug);
		
		$data = $request->all();
		$validator = Validator::make($data, PublicationCategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $data['user_id'] = Auth::user()->id;

		$category->update($data);
		return Redirect::route('publications-categories.admin');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = PublicationCategory::find($id);
		$category->delete();	
		return Redirect::route('publications-categories.admin');	
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$category = PublicationCategory::find($slug);
		$category->update(['is_published'=>($category->is_published)?0:1]);
		return Redirect::route('publications-categories.admin');	
		

	}
}
