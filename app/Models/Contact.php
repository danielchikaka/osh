<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	public static $rules = [
		 'physical_en' => 'required',
		 'physical_sw' => 'required',
		 'box_no_en' => 'required',
		 'box_no_sw' => 'required',
		 'fax' => '',
		 'org_name_en' => 'required',
		 'org_name_sw' => 'required',
		 'region' => 'required',
		 'phone_no' => 'required',
		 'email' => 'required',
		 'email_workplace' => 'required'
	];

	protected $fillable = ['physical_en', 'email_workplace', 'physical_sw', 'box_no_en', 'box_no_sw', 'phone_no', 'user_id','region','fax','is_published','email','org_name_en','org_name_sw'];




}

