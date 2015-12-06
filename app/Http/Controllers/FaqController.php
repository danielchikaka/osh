<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller {
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
	public function admin()
	{
		$faqs = Faq::orderBy('created_at', 'DESC')->paginate(15);

		return view('faqs.backend.index', compact('faqs'));		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faqs = Faq::orderBy('created_at', 'DESC')->get();
		return view('faqs.index',compact('faqs'));
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('faqs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		// $data['user_id'] = Auth::user()->id;
		$validator = Validator::make($data , Faq::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();

		}
		Faq::create($data);
		return Redirect::route('faqs.admin');
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
		$faq = Faq::find($id);
		return view('faqs.edit',compact('faq'));
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$faq = Faq::find($id);
		$data = $request->all();
		// $data['user_id'] = Auth::user()->id;
		$validator = Validator::make($data , Faq::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();

		}

		$faq->update($data);
		return Redirect::route('faqs.admin');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$faq = Faq::find($id);
		$faq->delete();
		return Redirect::route('faqs.admin');
		//
	}

}
