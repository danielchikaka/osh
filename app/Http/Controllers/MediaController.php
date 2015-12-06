<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Gallery;
use Redirect;
use Validator;
use Image;

class MediaController extends Controller {
	
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>[]]);
	}



	protected $sizes = ['small-','medium-',''];
	/**
	 * Display a listing of the resource in administration side.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$media  = Media::all();
		return view('media.backend.index',compact('media'));
	}	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$media = Media::orderBy('created_at','DESC')->paginate(5);
		return view('media.index',compact('media'));		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$galleries = Gallery::all()->lists('title_en','id');

		return view('media.create',compact('galleries'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$formdata = $request->all();
		$validator = Validator::make($formdata, Media::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}


        $absolute_path = public_path().'/uploads/media';
        $folderPath = '/uploads/media/';
        if(!file_exists($absolute_path)){
            try {
                if(!mkdir($absolute_path)){
                    die('could not create folder');
                }
            } catch (Exception $e) {
                die('could not create folder');
            }
        }



		if(!is_null($request->file('filename'))){
			$photofile = $request->file('filename');
			$filename = time(). '-' .$photofile->getClientOriginalName();
			$photofile->move(public_path().'/uploads/media/', $filename);

			$photo = Image::make(public_path().'/uploads/media/'.$filename);

	        // $photo = Image::make($photofile);
			$photo->backup();
			$photo->fit(150, 100, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();

			});
			 $thumb = public_path().'/uploads/media/small-'.$filename;
			$photo->save($thumb);
			$photo->reset();

			$photo->fit(550, 300, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();

			});
			$thumb = public_path().'/uploads/media/medium-'.$filename;

			$photo->save($thumb);
			$photo->reset();
			//replacing original
			$photo->fit(880, 450, function ($constraint) {
			    $constraint->aspectRatio();
			    // $constraint->upsize();

			});	
			$photo->save(public_path().'/uploads/media/'.$filename);		

	        $formdata['filename'] =  $filename;
	        $formdata['filepath']="/uploads/media/";

        }
       Media::create($formdata);
        return Redirect::route('media.admin');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$media = Media::find($id);
		$galleries = Gallery::all()->lists('title_en','id');

        return view('media.edit',compact('media','galleries'));		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
         public function update($id, Request $request)
         {
		
		$formdata = $request->all();
		$validator = Validator::make($formdata, Media::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}


		$media = Media::find($id);

		$media->update($formdata);
		
		 return Redirect::route('media.admin');	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$news = Media::find($id);

	        foreach ($this->sizes as $value) {
	        	$f = public_path().$news->filepath.$value.$news->filename;
	        	if(file_exists($f) && is_file($f)){
	        		unlink($f);
	        	}

	        }
		$news->delete();
        return Redirect::route('media.admin');		
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$news = Media::findBySlug($slug);
		$news->update(['is_published'=>($news->is_published)?0:1]);
		return Redirect::route('media.admin');

	}

}
