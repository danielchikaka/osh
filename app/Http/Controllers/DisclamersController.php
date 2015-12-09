<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Disclamer;
use Redirect;
use Validator;
use Illuminate\Http\Request;

class DisclamersController extends Controller {
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
		$workplaces = Disclamer::take(1)->get();
		return view('disclamers.index',compact('workplaces'));
	}	
	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$disclamers = Disclamer::all();
		return view('disclamers.admin.index',compact('disclamers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('disclamers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$formdata = $request->all();
		$validator = Validator::make($formdata, Disclamer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $formdata['user_id'] = Auth->user()->id;

		Disclamer::create($formdata);
		return Redirect::route('disclamers.admin');
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
		
		$press= Disclamer::find($id);
		return view('disclamers.edit',compact('press'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		

		$formdata = $request->all();


		$validator = Validator::make($formdata,Disclamer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$press = Disclamer::find($id);
		


		$press->update($formdata);
		return Redirect::route('disclamers.admin');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$press = Disclamer::find($id);


		$press->delete();
		return Redirect::route('disclamers.admin');

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($id)
	{
		$press = Disclamer::find($id);
		$press->update(['is_published'=>($press->is_published)?0:1]);
		return Redirect::route('disclamers.admin');

	}
}
