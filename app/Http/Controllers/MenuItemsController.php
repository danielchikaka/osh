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
		return View('menuitems.index');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data= $request->all();
		MenuItem::create($data);
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
		MenuItem::where('parent','=',$id)->update(['parent'=>0]);
		$menuitem->delete();
		return Redirect('menuitems');
	}

	public function menu_update(Request $request)
	{
		$mnuDAta = $request->all();
		$position = 1;
		$parent = '';
		foreach ($mnuDAta['menu-item-db-id'] as $key => $mnu) {
			$data = [];
			$data['title_sw']=$mnuDAta['menu-item-title_sw'][$mnuDAta['menu-item-db-id'][$key]];
			$data['title_en']=$mnuDAta['menu-item-title_en'][$mnuDAta['menu-item-db-id'][$key]];
			$data['url']=$mnuDAta['menu-item-url'][$mnuDAta['menu-item-db-id'][$key]];
			$data['parent']=$mnuDAta['menu-item-parent-id'][$key];
			if($parent != $data['parent']){
				$parent = $data['parent'];
				$position = 1;
			}
			else {
				$position++;
			}
			$data['position']=$position;
			MenuItem::where('id',$mnuDAta['menu-item-db-id'][$key])->update($data);
		}

		return Redirect('menuitems');
	}




	


	public function items(){

		$pages_categories = Category::all();
		$publication_categories = PublicationCategory::all();
		$modules =  ['tenders','trainings','news','faqs','videos','galleries'];
		return view('menuitems.items',compact('pages_categories','publication_categories','modules'));

	}



}
