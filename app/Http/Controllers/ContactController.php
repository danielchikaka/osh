<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Contact;
use Validator;
use Redirect;
use Mail;
class ContactController extends Controller {
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>['contactUs','sendMail']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contact = Contact::first();
		return view('contact.backend.index',compact('contact'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$contact = new Contact();
		$contact = Contact::all()->first();
		$contact = ($contact)?$contact:new Contact;
		return view('contact.create',compact('contact'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$validator = Validator::make($data = $request->all(), Contact::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		$contact = Contact::all()->first();
		$contact = ($contact)?$contact:new Contact;
		$contact->fill($data);
		$contact->save();

		return Redirect::route('contact.index');
	}

	/**
	 * display contact form
	 */
	public function contactUs()
	{
		return view('contact.contactus.create');
	}


	/**
	 * display contact form
	 */
	public function sendMail(Request $request)
	{
		
		$data = $request->all();
		$rules = array(
		 'name' => 'required',
		 'email' => 'required',
		 'subject' => 'required',
		 'message' => 'required',
		);
		$validator = Validator::make($data,$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}
		$contact = Contact::first();
		if($contact){

			$formdata = array(
				'name' => $data['name'],
				'email' => $data['email'],
				'subject' => $data['subject'],
				'text' => $data['message'],
				'receiver' => $contact->email
				);

			Mail::send('contact.contactus.show', $formdata, function($email) use ($formdata){
				$email->to($formdata['email'])->subject($formdata['subject']);
			});
		}
		return view('contact.contactus.success');
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

}
