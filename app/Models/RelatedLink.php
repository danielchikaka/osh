<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class RelatedLink extends Model {


	// Add your validation rules here
	public static $rules = [
		'title_en' => 'required',
        'title_sw' => 'required',
		'url' => 'required'
	];
	protected $fillable = ['title_en','title_sw','url','user_id','is_published'];
    public static function latest($n=4){
    	return RelatedLink::orderBy('created_at','DESC')->limit($n)->get();
    }
}
