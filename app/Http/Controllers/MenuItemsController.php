<?php namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Category;
use App\Models\PublicationCategory;

class MenuItemsController extends Controller {
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except'=>[]]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menuitems = MenuItem::all();

		$pages = array();
		foreach ( Page::all()->groupBy('category_id') as $categories) {
			foreach ($categories as $key => $page) {
				$pages[$page->category->title_en]['pages/'.$page->slug]=$page->title_en;

			}
		}
	
		$parents = array('0' => 'None');

		foreach(MenuItem::where('parent','=',0)->get() as $menu){
			$parents[$menu->id] =$menu->title_en;
        }
		// if(!is_null(Input::get('type'))){
		// 	$type = Input::get('type');
		// }
		$categories = array();
		foreach(Category::all() as $cat){
			$categories["tenders/{$cat->slug}"]=$cat->title_en;
		}

		// return View('menuitems.index', compact( array('menuitems', 'parents','pages','type','categories')));
		return View('menuitems.index', compact( array('menuitems', 'parents','pages','categories')));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data['title_en'] = $request->get('title_en');
		$data['title_sw'] = $request->get('title_sw');
		$data['url'] = $request->get('url');
		$data['menu_name'] = $request->get('menu_name');

		//check if activecheckbox is checked
		if(!isset($data['is_published'])){
           $data['is_published'] = 0;
		}
	
		$position = $request->get('position');
		$parent = $request->get('parent');
		// $data['user_id'] = Confide::user()->id;
		
		//MenuItem::dragMenuInsert($position);

		$data['position'] = MenuItem::where('parent','=',0)->max('position')+1;
	
		if(MenuItem::create($data)){
			// Notification::success('Menu Item <strong>created</strong> successfully');
		}

		return Redirect('menuitems');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menu = MenuItem::find($id);
		return View('menuitems.edit', compact(array('menu')));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateMenuItemsRequest $request)
	{
		$menuitem = MenuItem::findOrFail($id);

		$data['title_en'] = $request->get('title_en');
		$data['title_sw'] = $request->get('title_sw');
		$data['url'] = $request->get('url');
		$data['menu_name'] = $request->get('menu_name');

		//check if activecheckbox is checked
		if(!isset($data['active'])){
           $data['active'] = 0;
		}
	
		$position = $request->get('position');
		$parent = $request->get('parent');
		// $data['user_id'] = Confide::user()->id;
		
		//MenuItem::dragMenuInsert($position);

		$data['position'] = MenuItem::where('parent','=',0)->max('position')+1;

		if($menuitem->update($data)) {
			// Notification::success('Menu Item <strong>Updated</strong> successfully');
		}

		return Redirect('menuitems');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$menuitem = MenuItem::find($id);
		if(MenuItem::destroy($id)) {
			// MenuItem::menuPositionDelete($menuitem->position, $menuitem->parent);
			// Notification::success('Menu Item <strong>Deleted</strong> successfully');
		}

		return Redirect('menuitems');
	}


	//Meu update functions
	public function ajx_menu_update(Request $request)
	{
		
		global $family;

		$family =  array();

		function getchildren($parent){
			global $family;

			if(isset($parent->children)){
		
				foreach($parent->children as $child){

					$family[]=array('p'=>$parent->id,'c'=>$child->id);

					if(isset($child->children)){
						getchildren($child);
					}
				}

			}
			else {
				
			}
		}


		$menuitems =  $request->all();
		$parent_pos= json_decode($menuitems['positions']);

		$menuitems = json_decode($menuitems['data']);

		foreach($menuitems as $m){
				getchildren($m);
			
		}

		$i=1;
		foreach($parent_pos as $p){
			MenuItem::where('id','=',$p)->update(array('position'=>$i,'parent'=>0));
			$i++;	
		}


		$change_parent ='';
		$position = 1;

		foreach($family as $member){
			if($change_parent != $member['p']){
				$position =1;
				$change_parent=$member['p'];
				
			}
			else {
				$position++;

			}
		
			MenuItem::where('id','=',$member['c'])->update(array('position'=>$position,'parent'=>$member['p']));

		}

		return Response::json($menuitems);
	}

	
	#ajax called function below
	public function home_menu(){

		$menuitems = MenuItem::select('id','title_en')->where('menu_name','=',Input::get('type'))->where('parent','=',0)->get();
		$menu='<option value="0">None</option>';
		foreach($menuitems as $item){
			$selected =  ($item->id==Input::get('selected'))?'selected':'';
			$menu=$menu."<option value='{$item->id}' {$selected}>{$item->title_en}</option>";
		}
		echo $menu;


	}


	public function items(){

		$pages_categories = Category::all();
		$publication_categories = PublicationCategory::all();
		$modules =  ['tenders','trainings','news','faqs'];
		return view('menuitems.items',compact('pages_categories','publication_categories','modules'));

	}



}
