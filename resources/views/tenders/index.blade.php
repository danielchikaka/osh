@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
	<div class="container" id="title-wrap-inner">
		<h1>{{trans('messages.lbl_tenders')}}</h1>
	</div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
    <div id="news-all"  class="tenders">


        @foreach($tenders as $tender)

            <div class="single-news-all">
        
              <p><a href="{{URL::to($tender->{trans('messages.file')} )}}">
              <img src="{{asset('site/images/pdf.png')}}" alt="">
              {{ $tender->{trans('messages.title')} }}</a>  - <small>{{trans('messages.lbl_posted')}} {{ date('M d , Y', strtotime($tender->created_at)) }} </small></p>

            </div><!--/single-news-all-->       

            <hr>
        @endforeach
            <div id="pagination">
                <nav>
                    {!! $tenders !!}
                </nav>
            </div>

    </div><!--/news-all-->

@stop





