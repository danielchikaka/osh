<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Models\Workplace;
use Redirect;
use Validator;
use Illuminate\Http\Request;

class ComplaintsController extends Controller {
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
		return view('complaints.index');
	}	

	
}
