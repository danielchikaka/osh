 @extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>{{trans('messages.lbl_news')}}</h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
  <div id="news-head">
    <img src="{{$news->imageURL()}}" alt="">
    <span>{{$news->{trans('messages.title')} }}</span>
    
  </div><!--/news-head-->

    <div id="news-all"  class="single-news">

    <span>Posted on: August 20, 2015</span>
        {!! $news->{trans('messages.content')} !!}
    </div><!--/news-all-->
@stop
