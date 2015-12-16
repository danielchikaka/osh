<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class Video extends Model implements SluggableInterface {

	use SluggableTrait;

/*	public static function boot()
    {
        parent::boot();


        static::deleting(function($category)
        {
            if($category->id==1)
            	return false;
        });
    }*/

    protected $sluggable = array(
        'build_from' => 'title_en',
        'save_to'    => 'slug',
    );

	// Add your validation rules here
	public static $rules = [
        'title_en' => 'required',
        'title_sw' => 'required',
        'url'=>'required',
	];
	protected $fillable = ['title_en','title_sw','user_id','is_published','slug','url'];

}
