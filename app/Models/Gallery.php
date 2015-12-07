<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class Gallery extends Model implements SluggableInterface {

	use SluggableTrait;
	public static $rules = [
		 'title_en' => 'required|max:120',
		 'title_sw' => 'required|max:120',
		 'is_published' => 'required',
		 'user_id' => '',
	]; 
    protected $sluggable = array(
        'build_from' => 'title_en',
        'save_to'    => 'slug',
        'on_update'  => true, //update slug field
    );
	protected $fillable  =  ['title_sw','title_en','is_published','user_id','slug'];
    public function media(){
    	return $this->hasMany('App\Models\Media');
    }

    public static function slide($n=5){
    	$gal = Gallery::find(3);
        if(!$gal)
            return [];
    	return  $gal->media()->orderBy('created_at','DESC')->limit($n)->get();

    }
}
