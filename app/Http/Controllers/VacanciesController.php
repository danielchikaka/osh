<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use Validator;
use Redirect;

class VacanciesController extends Controller {
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
		$vacancies  = Vacancy::all();
		return view('vacancies.backend.index',compact('vacancies'));
	}	


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$vacancies = Vacancy::orderBy('created_at','DESC')->paginate(15);
		return view('vacancies.index',compact('vacancies'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('vacancies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$formdata = $request->all();
		$validator = Validator::make($formdata, Vacancy::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}


       Vacancy::create($formdata);
        return Redirect::route('vacancies.admin');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$vacancy = Vacancy::findBySlug($slug);
        return view('vacancies.show',compact('vacancy'));		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$vacancy = Vacancy::findBySlug($slug);
        return view('vacancies.edit',compact('vacancy'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug,Request $request)
	{
		$vacancy = Vacancy::findBySlug($slug);
		$formdata = $request->all();
		$validator = Validator::make($formdata, Vacancy::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


 
        $vacancy->update($formdata);
        return Redirect::route('vacancies.admin');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$vacancy = Vacancy::findBySlug($id);
		$vacancy->delete();
        return Redirect::route('vacancies.admin');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$vacancy = Vacancy::findBySlug($slug);
		$vacancy->update(['is_published'=>($vacancy->is_published)?0:1]);
		return Redirect::route('vacancies.admin');

	}
}
