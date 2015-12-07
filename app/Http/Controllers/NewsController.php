<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\News;
use Validator;
use Image;
use Redirect;

class NewsController extends Controller {
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>['index','show']]);
	}


	protected $sizes = ['small-','medium-',''];
	/**
	 * Display a listing of the resource in administration side.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$news  = News::all();
		return view('news.backend.index',compact('news'));
	}	


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$news = News::orderBy('created_at','DESC')->paginate(5);
		return view('news.index',compact('news'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('news.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$formdata = $request->all();
		$validator = Validator::make($formdata, News::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}


        $absolute_path = public_path().'/uploads/news';
        $folderPath = '/uploads/news/';
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
			$photofile->move(public_path().'/uploads/news/', $filename);

			$photo = Image::make(public_path().'/uploads/news/'.$filename);

	        // $photo = Image::make($photofile);
			$photo->backup();
			$photo->fit(150, 100, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();

			});
			 $thumb = public_path().'/uploads/news/small-'.$filename;
			$photo->save($thumb);
			$photo->reset();

			$photo->fit(550, 300, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();

			});
			$thumb = public_path().'/uploads/news/medium-'.$filename;

			$photo->save($thumb);
			$photo->reset();
			//replacing original
			$photo->fit(880, 450, function ($constraint) {
			    $constraint->aspectRatio();
			    // $constraint->upsize();

			});	
			$photo->save(public_path().'/uploads/news/'.$filename);		

	        $formdata['filename'] =  $filename;
	        $formdata['filepath']="/uploads/news/";

        }
       News::create($formdata);
        return Redirect::route('news.admin');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$news = News::findBySlug($slug);
        return view('news.show',compact('news'));		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$news = News::findBySlug($slug);
        return view('news.edit',compact('news'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug,Request $request)
	{
		$news = News::findBySlug($slug);
		$formdata = $request->all();
		$validator = Validator::make($formdata, News::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


        $absolute_path = public_path().'/uploads/news';
        $folderPath = '/uploads/news/';
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
			$photofile->move(public_path().'/uploads/news/', $filename);

			$photo = Image::make(public_path().'/uploads/news/'.$filename);

	        // $photo = Image::make($photofile);
			$photo->backup();
			$photo->fit(150, 100, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();

			});
			 $thumb = public_path().'/uploads/news/small-'.$filename;
			$photo->save($thumb);
			$photo->reset();

			$photo->fit(550, 300, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();

			});
			$thumb = public_path().'/uploads/news/medium-'.$filename;

			$photo->save($thumb);
			$photo->reset();
			//replacing original
			$photo->fit(880, 450, function ($constraint) {
			    $constraint->aspectRatio();
			    // $constraint->upsize();

			});	
			$photo->save(public_path().'/uploads/news/'.$filename);		

	        $formdata['filename'] =  $filename;
	        $formdata['filepath']="/uploads/news/";

	        foreach ($this->sizes as $value) {
	        	$f = public_path().$news->filepath.$value.$news->filename;
	        	if(file_exists($f) && is_file($f)){
	        		unlink($f);
	        	}

	        }


        }
        else {
        	unset($formdata['filename']);
        }
        $news->update($formdata);
        return Redirect::route('news.admin');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$news = News::findBySlug($id);

	        foreach ($this->sizes as $value) {
	        	$f = public_path().$news->filepath.$value.$news->filename;
	        	if(file_exists($f) && is_file($f)){
	        		unlink($f);
	        	}

	        }
		$news->delete();
        return Redirect::route('news.admin');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($slug)
	{
		$news = News::findBySlug($slug);
		$news->update(['is_published'=>($news->is_published)?0:1]);
		return Redirect::route('news.admin');

	}
}
