<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class QuickLink extends Model {


	// Add your validation rules here
	public static $rules = [
		'title_en' => 'required',
        'title_sw' => 'required',
		'url' => 'required'
	];
	protected $fillable = ['title_en','title_sw','url','user_id','is_published','slug'];
    public static function latest($n=4){
    	return QuickLink::orderBy('created_at','DESC')->limit($n)->get();
    }
}
