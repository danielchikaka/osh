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

		return Redirect::route('biographies.index');
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
		$biography =  Biography::findOrFail($id);
		if(file_exists(public_path().$biography->photo_url) && is_file(public_path().$biography->photo_url)){
			unlink(public_path().$biography->photo_url);
		}

/*		echo '{
				"status":"success",
				"url":"path/croppedImg.jpg"
			}
			';*/

		/*
		*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
		*/
		$imgUrl =$request->imgUrl;
		// original sizes
		$imgInitW =$request->imgInitW;
		$imgInitH =$request->imgInitH;
		// resized sizes
		$imgW =$request->imgW;
		$imgH =$request->imgH;
		// offsets
		$imgY1 =$request->imgY1;
		$imgX1 =$request->imgX1;
		// crop box
		$cropW =$request->cropW;
		$cropH =$request->cropH;
		// rotation angle
		$angle =$request->rotation;

		$jpeg_quality = 100;

		$fname = rand().time();
		$output_filename = public_path().'/uploads/bio/bio_'.$fname;

		// uncomment line below to save the cropped image in the same location as the original image.
		//$output_filename = dirname($imgUrl). "/croppedImg_".rand();

		$what = getimagesize($imgUrl);

		switch(strtolower($what['mime']))
		{
		    case 'image/png':
		        $img_r = imagecreatefrompng($imgUrl);
				$source_image = imagecreatefrompng($imgUrl);
				$type = '.png';
		        break;
		    case 'image/jpeg':
		        $img_r = imagecreatefromjpeg($imgUrl);
				$source_image = imagecreatefromjpeg($imgUrl);
				error_log("jpg");
				$type = '.jpeg';
		        break;
		    case 'image/gif':
		        $img_r = imagecreatefromgif($imgUrl);
				$source_image = imagecreatefromgif($imgUrl);
				$type = '.gif';
		        break;
		    default: die('image type not supported');
		}
		$fname = '/uploads/bio/bio_'.$fname.$type;
		$biography->update(['photo_url'=>$fname]);
		//Check write Access to Directory

		if(!is_writable(dirname($output_filename))){
			$response = Array(
			    "status" => 'error',
			    "message" => 'Can`t write cropped File'
		    );	
		}else{

		    // resize the original image to size of editor
		    $resizedImage = imagecreatetruecolor($imgW, $imgH);
			imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
		    // rotate the rezized image
		    $rotated_image = imagerotate($resizedImage, -$angle, 0);
		    // find new width & height of rotated image
		    $rotated_width = imagesx($rotated_image);
		    $rotated_height = imagesy($rotated_image);
		    // diff between rotated & original sizes
		    $dx = $rotated_width - $imgW;
		    $dy = $rotated_height - $imgH;
		    // crop rotated image to fit into original rezized rectangle
			$cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
			imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
			imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
			// crop image into selected area
			$final_image = imagecreatetruecolor($cropW, $cropH);
			imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
			imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
			// finally output png image
			//imagepng($final_image, $output_filename.$type, $png_quality);
			imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
			$response = Array(
			    "status" => 'success',
			    "url" => url($fname)
		    );
		}
		print json_encode($response);


	}
}
