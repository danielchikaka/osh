<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Biography extends Model implements SluggableInterface {

	use SluggableTrait;

	public static $rules = [
		 'title_en' => 'required|max:120',
		 'title_sw' => 'required|max:120',
		 'content_en' => 'required',
		 'content_sw' => 'required',
		 'user_id' => '',
		 'photo_url' => 'mimes:jpg,png,jpeg,bmp|max:2000'
	]; 
	protected $fillable  =  ['title_sw','title_en','content_sw','fullname','content_en','user_id','photo_url'];
    protected $sluggable = array(
        'build_from' => 'title_en',
        'save_to'    => 'slug',
    );


}
