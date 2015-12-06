<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Training;
use Validator;
use Redirect;

class TrainingsController extends Controller {
			/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>['index','show']]);
	}

	/**
	 * Display a listing of the resource in administration side.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$trainings  = Training::all();
		return view('trainings.backend.index',compact('trainings'));
	}	


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$trainings = Training::orderBy('created_at','DESC')->paginate(2);
		return view('trainings.index',compact('trainings'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('trainings.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$formdata = $request->all();
		$validator = Validator::make($formdata, Training::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}


       Training::create($formdata);
        return Redirect::route('trainings.admin');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$training = Training::findBySlug($slug);
        return view('trainings.show',compact('training'));		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$training = Training::findBySlug($slug);
        return view('trainings.edit',compact('training'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug,Request $request)
	{
		$training = Training::findBySlug($slug);
		$formdata = $request->all();
		$validator = Validator::make($formdata, Training::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


 
        $training->update($formdata);
        return Redirect::route('trainings.admin');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$training = Training::findBySlug($id);
		$training->delete();
        return Redirect::route('trainings.admin');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$training = Training::findBySlug($slug);
		$training->update(['is_published'=>($training->is_published)?0:1]);
		return Redirect::route('trainings.admin');

	}
}
