<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Models\QuickLink;

class QuickLinksController extends Controller {
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
		$quicklinks = QuickLink::orderBy('created_at','DESC')->get();
		return view('quicklinks.backend.index',compact('quicklinks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('quicklinks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data, QuickLink::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		QuickLink::create($data);

		return Redirect::route('quicklinks.admin');
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$quicklink = QuickLink::find($id);
		return view('quicklinks.edit',compact('quicklink'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$quicklink = QuickLink::find($id);
		
		$data = $request->all();
		$validator = Validator::make($data, QuickLink::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $data['user_id'] = Auth::user()->id;

		$quicklink->update($data);
		return Redirect::route('quicklinks.admin');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$quicklink = QuickLink::find($id);
		$quicklink->delete();	
		return Redirect::route('quicklinks.admin');	
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$quicklink = QuickLink::find($slug);
		$quicklink->update(['is_published'=>($quicklink->is_published)?0:1]);
		return Redirect::route('quicklinks.admin');	

	}
}
