<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Session;
class MenuItem extends Model {


	protected $fillable = array(
		'title_en', 'name', 'url', 'title_sw', 'parent'	,'link'	, 'position', 'user_id'
	);
	public static $rules =[
		'title_en'=>'required',
		'title_sw'=>'required',
		'url'=>'',
		'parent'=>'integer',
		'position'=>'integer'


	];

public static function  menuitems($par=0,$name='main'){

	static $first = 1;
	static $depth = 0;



	if($first){
		$menus = MenuItem::where('name', '=', $name)->where('parent', '=', $par)->orderBy('position', 'ASC')->get();
		$first = 0;
	}
	else{
		$menus = MenuItem::where('parent','=',$par)->orderBy('position','ASC')->get();
	}

	foreach ($menus as $key => $child) {

                echo ' <li id="menu-item-'.$child->id.'" class="menu-item menu-item-depth-'.$depth.' menu-item-custom menu-item-edit-inactive">
                      <dl class="menu-item-bar">
                          <dt class="menu-item-handle">
                            <span class="item-title"><span class="menu-item-title">'.$child->title_en.'</span> <span class="is-submenu" style="display: none;">sub item</span></span>
                            <span class="item-controls">
                              <span class="item-type">Custom Link</span>
                              <span class="item-order hide-if-js">
                                <a href="http://localhost/gcm/wp-admin/nav-menus.php?action=move-up-menu-item&amp;menu-item='.$child->id.'&amp;_wpnonce=305567ec4f" class="item-move-up"><abbr title="Move up">&#8593;</abbr></a>
                                |
                                <a href="http://localhost/gcm/wp-admin/nav-menus.php?action=move-down-menu-item&amp;menu-item='.$child->id.'&amp;_wpnonce=305567ec4f" class="item-move-down"><abbr title="Move down">&#8595;</abbr></a>
                              </span>
                              <a class="item-edit" id="edit-'.$child->id.'" title="Edit Menu Item" href="http://localhost/gcm/wp-admin/nav-menus.php?edit-menu-item='.$child->id.'#menu-item-settings-'.$child->id.'">Edit Menu Item</a>
                            </span>
                          </dt>
                      </dl>

                      <div class="menu-item-settings" id="menu-item-settings-'.$child->id.'">
                          <p class="field-url description description-wide">
                              <label for="edit-menu-item-url-'.$child->id.'">
                                  URL
                                  <br />
                                  <input type="text" id="edit-menu-item-url-'.$child->id.'" class="widefat code edit-menu-item-url" name="menu-item-url['.$child->id.']" value="'.$child->url.'" />
							     <a data-toggle="modal" href="'.route('menuitems.items').'" data-target="#myModal"><i class="fa fa-fw fa-link"></i></a>

                              </label>
                          </p>
                          <p class="description description-thin">
                              <label for="edit-menu-item-title-'.$child->id.'">
                                  Tile Sw
                                  <br />
                                  <input type="text" id="edit-menu-item-title-'.$child->id.'" class="widefat edit-menu-item-title" name="menu-item-title_en['.$child->id.']" value="'.$child->title_en.'" />
                              </label>
                          </p>
                          <p class="description description-thin">
                              <label for="edit-menu-item-title-'.$child->id.'">
                                  Title Sw
                                  <br />
                                  <input type="text" id="edit-menu-item-title-'.$child->id.'" class="widefat edit-menu-item-title" name="menu-item-title_sw['.$child->id.']" value="'.$child->title_sw.'" />
                              </label>
                          </p>

                          <div class="menu-item-actions description-wide submitbox">
                              <a data-confirm="Are you Sure?" data-method="delete"  id="delete-'.$child->id.'" href="'.route("menuitems.destroy",$child->id).'">Remove</a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-'.$child->id.'" href="http://localhost/gcm/wp-admin/nav-menus.php?edit-menu-item='.$child->id.'&#038;cancel=1448766936#menu-item-settings-'.$child->id.'">Cancel</a>
                          </div>

                          <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id['.$child->id.']" value="'.$child->id.'" />
                          <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id['.$child->id.']" value="'.$child->id.'" />
                          <input class="menu-item-data-object" type="hidden" name="menu-item-object['.$child->id.']" value="custom" />
                          <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id['.$child->id.']" value="'.$child->parent.'" />
                          <input class="menu-item-data-position" type="hidden" name="menu-item-position['.$child->id.']" value="'.$child->position.'" />
                          <input class="menu-item-data-type" type="hidden" name="menu-item-type['.$child->id.']" value="custom" />
                      </div>
                      <!-- .menu-item-settings-->
                      <ul class="menu-item-transport"></ul>
                  </li>';


		$depth++;
		self::menuitems($child->id);
		$depth--;

	}
	return;
}


	public static function getMainMenu($name="main")
	{
		$menu = MenuItem::where('name','=',$name);
		$mnu = "";

		$title = 'title_'.Session::get('locale');
		if($menu == null){
			return "";
		}

		$par_items = MenuItem::where('name', '=', $name)->where('parent', '=', 0)->orderBy('position', 'ASC')->get();

	   foreach ($par_items as $par) {
		   	
		   	$child_items = MenuItem::where('parent','=',$par->id)->get();
		   	
	   		if($child_items->count() > 0){
	   			$mnu .= "<li><a href='#'>".$par->$title."</a>";
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
	   			$mnu.= "<li><a href=".url($par->url).">".$par->$title."</a>";
	   		}
	 
	   		$mnu .= "</li>";
	   	}

	   	return $mnu;
   	}


	

}
