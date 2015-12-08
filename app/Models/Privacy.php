<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Privacy extends Model {

	public static $rules = [
		 'title_en' => 'required|max:120',
		 'title_sw' => 'required|max:120',
		 'content_sw' => 'required',
		 'content_en' => 'required',
		 'user_id' => '',
	]; 
	protected $fillable  =  ['title_sw','title_en','is_published','content_sw', 'content_en','user_id'];

	protected $table = "privaces";


}
