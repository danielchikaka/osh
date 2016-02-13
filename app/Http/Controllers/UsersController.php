<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Hash;
use Auth;
class UsersController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>['show']]);
	}



	public function changePasswordForm(){
		return view('auth.changepassword');
	}

	public function changePassword(Request $request){
		$data = $request->all();
		$rules= [
			'password'=>'required',
			'confirm_password'=>'required|same:password',
			// 'old_password'=>'exists:users,password,'.Hash::make($data['old_password']),
		];
		$validator = Validator::make($data,$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}
		if(Hash::check($request->old_password, Auth::user()->getAuthPassword())){
			$user= Auth::user();
			$user->password = Hash::make($request->password);
			  $validator->getMessageBag()->add('old_password', 'oldPassword not valid');
		$validator = Validator::make($data,$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}
			// save the new password
			if($user->save()) {
				return Redirect::to('home')
						->with('global', 'Your password has been changed.');
			}
		} else {
			return Redirect::back();
		}
				


	}

}
