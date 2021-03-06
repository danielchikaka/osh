@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
	<div class="container" id="title-wrap-inner">
		<h1>{{trans('messages.lbl_news')}}</h1>
	</div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
<div id="news-all">
	@foreach($news as $data)
	    <div class="single-news-all">
	        <h4>{{$data->{trans('messages.title')} }} </h4>
	        <a href="single-news.php"><img src="{{URL::to($data->imageURL('medium'))}}" alt=""></a>
	        <span>Posted on Nov 15, 2015</span>
	        <p>{{$data->{trans('messages.summary')} }}</p>
	        <a href="{{URL::route('news.show',$data->slug)}}">{{trans('messages.lbl_continue')}}  &rarr; </a>
	    </div>
	    <!--/single-news-all-->
	    <hr>
	@endforeach

    <div id="pagination">
        <nav>
			{!! $news->render() !!}

        </nav>
    </div>
</div>
<!--/news-all-->

@stop





