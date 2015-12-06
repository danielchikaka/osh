<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
class Search extends Model {

	public static function search($term){
		$count = 0;
		$l = Session::get('locale');
		$fields = "title_{$l},' ',content_{$l},' ',summary_{$l}";
		$results['results']['news'] = News::select(DB::raw("*,concat('news/',slug) as link"))->where(DB::raw("concat({$fields})"),'like',"%{$term}%")->get();
			$count+=count($results['results']['news']);

		$fields = "title_{$l},' ',content_{$l},' ',summary_{$l}";
		$results['results']['pages'] = Page::select(DB::raw("*,concat('pages/',slug) as link"))->where(DB::raw("concat({$fields})"),'like',"%{$term}%")->get();
		$count+=count($results['results']['pages']);


		$fields = "title_{$l}";
		$results['results']['publications'] = Publication::select(DB::raw("*,file_{$l} as link"))->where(DB::raw("concat({$fields})"),'like',"%{$term}%")->get();
			$count+=count($results['results']['publications']);


		$fields = "title_{$l},' ',content_{$l},' ',summary_{$l}";
		$results['results']['trainings'] = Training::select(DB::raw("*,concat('trainings/',slug) as link"))->where(DB::raw("concat({$fields})"),'like',"%{$term}%")->get();
			$count+=count($results['results']['trainings']);

		$fields = "title_{$l},' ',content_{$l},' ',summary_{$l}";
		$results['results']['vacancies'] = Vacancy::select(DB::raw("*,concat('vacancies/',slug) as link"))->where(DB::raw("concat({$fields})"),'like',"%{$term}%")->get();
			$count+=count($results['results']['vacancies']);

			$results['count']=$count;

		return $results;

	}

}
