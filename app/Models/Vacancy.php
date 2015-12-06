<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class Vacancy extends Model implements SluggableInterface {

	use SluggableTrait;
	public static $rules = [
		 'title_en' => 'required|max:120',
		 'title_sw' => 'required|max:120',
		 'content_en' => 'required',
		 'content_sw' => 'required',
		 'summary_en' => 'required',
		 'summary_sw' => 'required',
		 'is_published' => 'required',
		 'user_id' => '',
	]; 
    protected $sluggable = array(
        'build_from' => 'title_en',
        'save_to'    => 'slug',
        'on_update'  => true, //update slug field
    );
	protected $fillable  =  ['title_sw','title_en','content_sw','summary_en','is_published','summary_sw','content_en','user_id','slug'];
    


    public static function latest($n=4){
    	return Vacancy::orderBy('created_at','DESC')->limit($n)->get();
    }

}