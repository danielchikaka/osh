<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Biography;
use Validator;
use Redirect;

class BiographiesController extends Controller {
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>['show']]);
	}


	public function admin()
	{
		$bios = Biography::orderBy('created_at','DESC')->first();
		if(!file_exists(public_path().'/'.$bios->photo_url)){
			$bios->photo_url=url('/admin/img/person.png');
		}
		return view('biographies.index',compact('bios'));
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$biography = Biography::find(1);
		return view('biographies.index',compact('biography'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$biography = new Biography();
		$biography = Biography::all()->first();
		$biography = ($biography)?$biography:new Biography;
		return view('biographies.create',compact('biography'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$validator = Validator::make($data = $request->all(), Biography::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		$biography = Biography::all()->first();
		$biography = ($biography)?$biography:new Biography;
		$biography->fill($data);
		$biography->save();

		return Redirect::route('biographies.admin');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{

		$biographies = Biography::findBySlug($slug);
        return view('biographies.show',compact('biographies'));	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function editPhoto($id,Request $request){
		$biography =  Biography::find($id);
		if(file_exists(public_path().$biography->photo_url) && is_file(public_path().$biography->photo_url)){
			unlink(public_path().$biography->photo_url);
		}


		$imgUrl =$request->photo_url;

		$fname = rand().time();
		$output_filename = public_path().'/uploads/bio/bio_'.$fname.'.png';

	    $ifp = fopen($output_filename, "wb"); 
	    $data = explode(',', $imgUrl);
	    fwrite($ifp, base64_decode($data[1])); 
	    fclose($ifp); 
		$fname = '/uploads/bio/bio_'.$fname.'.png';
		$biography->update(['photo_url'=>$fname]);

	


	}
}
