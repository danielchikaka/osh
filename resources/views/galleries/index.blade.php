@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
  <div class="container" id="title-wrap-inner">
    <h1>{{trans('messages.lbl_photo_gallery')}}</h1>
  </div><!--/container title-wrap-inner-->
</section>
@stop



@section('content')
<div id="news-all">
@foreach($galleries as $gallery)
    <div class="single-news-all  gallery-gallery">
        <h4>{{$gallery->{trans('messages.title')} }}</h4>
        @foreach($gallery->media as $i=>$image)
          <a href="{{URL::to($image->imageURL())}}" data-lightbox="00{{$gallery->id}}" data-title="{{$image{trans('messages.title')} }}">
              @if(!$i)
                <img src="{{URL::to($image->imageURL())}}" height="300" width="550" alt="">
              @endif
          </a>
        @endforeach
        <span> {{trans('messages.lbl_posted')}}: {{ date('M d , Y', strtotime($gallery->created_at)) }} - {{trans('messages.lbl_image_count',['count'=>$gallery->media->count()])}}</span>
          <p>{!! $gallery->{trans('messages.content')} !!}</p>
    </div>
    <!--/single-news-all-->
    <hr>
    
@endforeach
    <div id="pagination">
        <nav>
            {{$galleries->render()}}
        </nav>
    </div>
    <!--/pagination-->
</div>
<!--/news-all-->

@stop


