<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Models\RelatedLink;

class RelatedLinksController extends Controller {

		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>[]]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$related = RelatedLink::orderBy('created_at','DESC')->get();
		return view('relatedlinks.backend.index',compact('related'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('relatedlinks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data, RelatedLink::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		RelatedLink::create($data);

		return Redirect::route('relatedlinks.admin');
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$related = RelatedLink::find($id);
		return view('relatedlinks.edit',compact('related'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{


		$related = RelatedLink::find($id);

		$this->validate($request, RelatedLink::$rules);

	
		$relatedUpdate = $request->all();
		// $data['user_id'] = Auth::user()->id;

		$related->fill($relatedUpdate)->save();

		return Redirect::route('relatedlinks.admin');	
	}




	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$related = RelatedLink::find($id);
		$related->delete();	
		return Redirect::route('relatedlinks.admin');	
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$related = RelatedLink::find($slug);
		$related->update(['is_published'=>($related->is_published)?0:1]);
		return Redirect::route('relatedlinks.admin');	

	}
}
