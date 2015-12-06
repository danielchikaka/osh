<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class MenuItem extends Model {


	public static function active(){

		return MenuItem::where('active','=',1);

	}


	protected $fillable = [
		'title_en'
		, 'active'
		, 'name'
		, 'url'
		, 'title_sw'
		, 'parent'
		,'link'
		, 'position'
		, 'user_id'
	];


static function openOrderedList($child){
	if($child->hasChildren()){
			echo '<ol class="dd-list">';
	}
}

static function closeOrderedList($child){
	if($child->hasChildren()){
			echo '</ol>';
	}
}


public static function  recursiveMenu($parent=0,$name='main'){

	static $flag = true;

	if($flag){
		$menu_items = MenuItem::where('name', '=', $name)->where('parent', '=', $parent)->orderBy('position', 'ASC')->get();
		$flag = false;
	}
	else{
		$menu_items = MenuItem::where('parent','=',$parent)->orderBy('position','ASC')->get();
	}

	foreach ($menu_items as $key => $child) {
		echo '<li class="dd-item" data-id="'.$child->id.'"><div class="dd-handle">'.$child->title_en.'</div>';

		echo '<span class="dropd"><a href="'.route('menuitems.edit',$child->id).'" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-edit"></i></i></a></span>
               <div class="render-forms">
							
               </div>';

               
		self::openOrderedList($child);

		self::recursiveMenu($child->id);

		self::closeOrderedList($child);
		echo '</li>';
	}
	return;
}


	public static function getMainMenu($name="main", $lang)
	{
		$menu = MenuItem::where('name','=',$name);
		$mnu = "";

		$title = 'title'.$lang;
		if($menu == null){
			return "";
		}

		$parent_items = MenuItem::where('name', '=', $name)->where('parent', '=', 0)->orderBy('position', 'ASC')->get();

	   foreach ($parent_items as $parent) {
		   	
		   	$child_items = MenuItem::where('parent','=',$parent->id)->get();
		   	
	   		if($child_items->count() > 0){
	   			$mnu .= "<li><a href='#'>".$parent->$title."</a>";
	   			$mnu.='<ul  class="dropdown-menu">';

			   	foreach ($child_items as $child) 
				{

				   	$grands = MenuItem::where('parent','=',$child->id)->get();

				   	if($grands->count()){
			   			$mnu .= "<li><a href='#'>".$child->$title."</a>";
			   			$mnu.='<ul  class="dropdown-menu">';
				   		foreach ($grands as  $grand) {
				   			$mnu.='<li>'."<a href='{$grand->url}'>".$grand->$title.'</a></li>';

				   		}
				   		$mnu.='</ul>';
				   	}
				   	else{

					$mnu .= "<li><a href= ".url($child->url).">".$child->$title."</a></li>";
				   		
				   	}






				}
				
				$mnu .= '</ul>';
	   		}else{
	   			$mnu.= "<li><a href=".url($parent->url).">".$parent->$title."</a>";
	   		}
	 
	   		$mnu .= "</li>";
	   	}
	   	return $mnu;
   	}


	public function hasChildren(){
		$count = $this::where('parent','=',$this->id)->count();
		if($count){
			return true;
		}

		return false;
	}


   	public static function getOtherMenu($name = '', $lang){
		$data = '';
		$title = 'title'.$lang;

		$menu_items = MenuItem::where('name', '=', $name)->where('parent', '=', 0)->get();

		foreach ($menu_items as $menu_item) {
			$data .= "<li><a href='".URL::to($menu_item->url)."' >".$menu_item->$title."</a></li>";
		}

		return $data;
	}

	

}
