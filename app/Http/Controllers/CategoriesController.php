<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Models\Category;

class CategoriesController extends Controller {



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
		$categories = Category::orderBy('created_at','DESC')->get();
		return view('categories.index',compact('categories'));
	}	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$categories = Category::orderBy('created_at','DESC')->get();
		return view('categories.backend.index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data, Category::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		Category::create($data);

		return Redirect::route('categories.admin');
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$cat = Category::findBySlug($slug);
		$pages = $cat->pages()->paginate(10);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($slug);
		return view('categories.edit',compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug)
	{
		$category = Category::find($slug);
		
		$data = $request->all();
		$validator = Validator::make($data, Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $data['user_id'] = Auth::user()->id;

		$category->update($data);
		return Redirect::route('categories.admin');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::find($id);
		$category->delete();	
		return Redirect::route('categories.admin');	
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$category = Category::find($slug);
		$category->update(['is_published'=>($category->is_published)?0:1]);
		return Redirect::route('categories.admin');	

	}
}
