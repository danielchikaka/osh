<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Hash;
use Auth;
class UsersController extends Controller {

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
			$user->password = Hash::make($request->password);
			  $validation->getMessageBag()->add('old_password', 'oldPassword not valid');
		$validator = Validator::make($data,$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}
			// save the new password
			if($user->save()) {
				return Redirect::route('home')
						->with('global', 'Your password has been changed.');
			}
		} else {
			return Redirect::back();
		}
				


	}

}
