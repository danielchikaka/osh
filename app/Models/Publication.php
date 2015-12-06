<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Publication extends Model {

	public static $rules = [
		 'title_en' => 'required|max:120',
		 'title_sw' => 'required|max:120',
		 'file_en' => 'required|mimes:pdf',
		 'file_sw' => 'required|mimes:pdf',
		 'publication_category_id' => 'required',
		 'user_id' => '',
	]; 
	protected $fillable  =  ['title_sw','title_en','file_en','is_published','file_sw','user_id','publication_category_id'];
   
    public static function latest($n=6){
    	return Publication::orderBy('created_at','DESC')->limit($n)->get();
    }

}
