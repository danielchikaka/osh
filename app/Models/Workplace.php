<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Workplace extends Model {

	public static $rules = [
		 'title_en' => 'required|max:120',
		 'title_sw' => 'required|max:120',
		 'file_en' => 'required|mimes:pdf',
		 'file_sw' => 'required|mimes:pdf',
		 'content_sw' => '',
		 'content_en' => '',
		 'user_id' => '',
	]; 
	protected $fillable  =  ['title_sw','title_en','file_en','is_published','file_sw','content_sw', 'content_en','user_id'];


}
