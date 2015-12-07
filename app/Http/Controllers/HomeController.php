<?php namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Biography;
use App\Models\Training;
use App\Models\Publication;
use App\Models\Search;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$images = Gallery::slide();
		$news = News::latest(4);
		$pubs = Publication::latest();
		$trainings = Training::latest();
		$bio = Biography::orderBy('created_at','DESC')->first();
		

		return view('index',compact('images','news','pubs','bio','trainings'));
	}	

	public function admin()
	{


		return view('dashboard',compact('images','news','pubs','bio'));
	}	



}
