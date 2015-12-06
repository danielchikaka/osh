<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

	public static $rules = [
		 'title_en' => 'required|max:120',
		 'title_sw' => 'required|max:120',
		 'gallery_id' => 'required',
		 'user_id' => '',
		 'filename' => 'mimes:jpg,png,jpeg,bmp|max:2000'
	]; 
	protected $fillable  =  ['title_sw','title_en','gallery_id','is_published','user_id','filepath','filename'];
 	public function gallery(){
 		return $this->belongsTo('App\Models\Gallery');
 	}   
     public function imageURL($size=null){
    	$url =$this->filepath.$this->filename;
    	if(!is_null($size)){
    		$url =$this->filepath.$size.'-'.$this->filename;
    	}
    	return $url;
    }

}
