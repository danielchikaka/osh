<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model {

	public static $rules = [
		 'question_en' => 'required|',
		 'answer_en' => 'required|',
		 'answer_sw' => 'required',
		 'question_sw' => 'required',
		 'is_published' => 'required',
		 'user_id' => '',
	]; 
	protected $fillable  =  ['question_en','answer_en','answer_sw','question_sw','is_published','user_id',];
   

}
