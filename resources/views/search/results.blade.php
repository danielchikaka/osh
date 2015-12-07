@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
	<div class="container" id="title-wrap-inner">
		<h1>{{trans('messages.lbl_results')}}</h1>
	</div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')

	  <div id="news-all">

	  <p>{!! trans('messages.lbl_search_msg',['count'=>$results['count'],'r'=>$r])!!}</p>

	  <ul id="search">

			@foreach($results['results'] as $result)
				@foreach($result as $data)
				  	<li><a href="{{URL::to($data->link)}}">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat quibusdam natus, commodi blanditiis asperiores amet labore a nobis et voluptatibus...</a></li>
				@endforeach

			@endforeach
	  </ul>



	  	
	  </div><!--/news-all-->

	

@stop





