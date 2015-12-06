<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App;
use Redirect;
class TranslationController extends Controller {

	public function langChange(){

		$lang = 'sw';
		if(Session::get('locale')=='sw'){
			$lang = 'en';
		}

		Session::put('locale',$lang);
		App::setLocale($lang);
		return Redirect::back();
	}

}
