@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
  <div class="container" id="title-wrap-inner">
    <h1>{{trans('messages.lbl_videos')}}</h1>
  </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')



<div id="news-all">

  @foreach($videos as $video)
      <div class="single-news-all  video">
        <h4>{{$video->{trans('messages.title')} }}</h4>

        <video width="545" height="300"  preload="none">
        <source type="video/youtube" src="{{$video->url}}" />
    </video>

    <span> {{trans('messages.lbl_posted')}} {{ date('M d , Y', strtotime($video->created_at)) }}</span>

      
        <p>{{$video->{trans('messages.content')} }}</p>
      </div><!--/single-news-all-->     

      <hr>
@endforeach

      <div id="pagination">
        <nav>
            {!!$videos->render()!!}
        </nav>
      </div> <!--/pagination-->

      </div><!--/news-all-->
@stop
