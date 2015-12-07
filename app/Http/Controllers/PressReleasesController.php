<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\PressRelease;
use Redirect;
use Validator;
use Illuminate\Http\Request;

class PressReleasesController extends Controller {
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
	public function index()
	{
/*		$pressreleases = PressRelease::orderBy('created_at','DESC')->paginate(15);
		return view('pressreleases.index',compact('pubs'));*/
	}	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$pressreleases = PressRelease::orderBy('created_at','DESC')->get();
		return view('pressreleases.admin.index',compact('pressreleases'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('pressreleases.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$formdata = $request->all();
		$validator = Validator::make($formdata, PressRelease::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$file_sw = $request->file('file_sw');
		$file_en = $request->file('file_en');

		$sw = time() . '-' .$file_sw->getClientOriginalName();

		$en = time() . '-' .$file_en->getClientOriginalName();


        $absolute_path = public_path().'/uploads/files/en';
        if(!file_exists($absolute_path)){
            try {
                if(!mkdir($absolute_path)){
                    die('could not create folder');
                }
            } catch (Exception $e) {
                die('could not create folder');
            }
        }        

        $absolute_path = public_path().'/uploads/files/sw';
        if(!file_exists($absolute_path)){
            try {
                if(!mkdir($absolute_path)){
                    die('could not create folder');
                }
            } catch (Exception $e) {
                die('could not create folder');
            }
        }

        $file_en->move(public_path().'/uploads/files/en', $en);
        $file_sw->move(public_path().'/uploads/files/sw', $sw);





        $file_en = '/uploads/files/en/'. $en;
        $file_sw = '/uploads/files/sw/'. $sw;

        $formdata['file_en'] = '/uploads/files/en/'. $en;
		$formdata['file_sw'] = '/uploads/files/sw/'. $sw;



		// $formdata['user_id'] = Auth->user()->id;

		PressRelease::create($formdata);
		return Redirect::route('pressreleases.admin');
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
		
		$press= PressRelease::find($id);
		return view('pressreleases.edit',compact('press'));

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
		PressRelease::$rules['file_en']='mimes:pdf';
		PressRelease::$rules['file_sw']='mimes:pdf';

		$validator = Validator::make($formdata,PressRelease::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$press = PressRelease::find($id);
		

		//en
		$file_en = $request->file('file_en');
		if(!is_null($file_en))
		{
			$en = time() . '-' .$file_en->getClientOriginalName();
	        $absolute_path = public_path().'/uploads/files/en';
	        if(!file_exists($absolute_path)){
	            try {
	                if(!mkdir($absolute_path)){
	                    die('could not create folder');
	                }
	            } catch (Exception $e) {
	                die('could not create folder');
	            }
	        } 
	        $file_en->move(public_path().'/uploads/files/en', $en);
	       $formdata['file_en'] = '/uploads/files/en/'. $en;
	    $f = public_path().$press->file_en;
    	if(file_exists($f) && is_file($f)){
    		unlink($f);
    	}

    	$f = public_path().$press->file_sw;
    	if(file_exists($f) && is_file($f)){
    		unlink($f);
    	}
	   }
	   else {
	   		unset($formdata['file_en']);
	   }


		//sw

		$file_sw = $request->file('file_sw');
		if(!is_null($file_sw))
		{		
			$sw = time() . '-' .$file_sw->getClientOriginalName();
	
	        $absolute_path = public_path().'/uploads/files/sw';
	        if(!file_exists($absolute_path)){
	            try {
	                if(!mkdir($absolute_path)){
	                    die('could not create folder');
	                }
	            } catch (Exception $e) {
	                die('could not create folder');
	            }
	        }
	        $file_sw->move(public_path().'/uploads/files/sw', $sw);
	
	 
			$formdata['file_sw'] = '/uploads/files/sw/'. $sw;
			$f = public_path().$press->file_sw;
	    	if(file_exists($f) && is_file($f)){
	    		unlink($f);
	    	}
		}
		else {
			unset($formdata['file_sw']);
		}
		$press->update($formdata);
		return Redirect::route('pressreleases.admin');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$press = PressRelease::find($id);
		
    	$f = public_path().$press->file_en;
    	if(file_exists($f) && is_file($f)){
    		unlink($f);
    	}

    	$f = public_path().$press->file_sw;
    	if(file_exists($f) && is_file($f)){
    		unlink($f);
    	}

		$press->delete();
		return Redirect::route('pressreleases.admin');

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($id)
	{
		$press = PressRelease::find($id);
		$press->update(['is_published'=>($press->is_published)?0:1]);
		return Redirect::route('pressreleases.admin');

	}
}
