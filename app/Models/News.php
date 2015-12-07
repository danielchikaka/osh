<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class News extends Model implements SluggableInterface {

	use SluggableTrait;
	public static $rules = [
		 'title_en' => 'required|max:120',
		 'title_sw' => 'required|max:120',
		 'content_en' => 'required',
		 'content_sw' => 'required',
		 'summary_en' => 'required',
		 'summary_sw' => 'required',
		 'user_id' => '',
		 'filename' => 'mimes:jpg,png,jpeg,bmp|max:2000'
	]; 
    protected $sluggable = array(
        'build_from' => 'title_en',
        'save_to'    => 'slug',
        'on_update'  => true, //update slug field
    );
	protected $fillable  =  ['title_sw','title_en','content_sw','summary_en','is_published','url','summary_sw','content_en','user_id','slug','filepath','filename'];
    
    public function imageURL($size=null){
    	$url =$this->filepath.$this->filename;
    	if(!is_null($size)){
    		$url =$this->filepath.$size.'-'.$this->filename;
    	}
    	return $url;
    }

    public static function latest($n=6){
    	return News::orderBy('created_at','DESC')->limit($n)->get();
    }

}