<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Search; 

use Illuminate\Http\Request;

class SearchController extends Controller {

	public function searchResults(Request $request){
		$results = Search::search($request->r);
		return view('search.results',compact('results'))->with(['r'=>$request->r]);
	}

}
