 @extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>{{ trans('messages.lbl_publications')}}: {{ $cat->{trans('messages.title')} }}</h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
    <div id="news-all"  class="tenders">


        @foreach($publications as $pub)

            <div class="single-news-all">
        
              <p><a href="{{URL::to($pub->{trans('messages.file')} )}}">
              <img src="{{asset('site/images/pdf.png')}}" alt="">
              {{ $pub->{trans('messages.title')} }}</a>  - <small>{{trans('messages.lbl_posted')}} {{ date('M d , Y', strtotime($pub->created_at)) }} </small></p>

            </div><!--/single-news-all-->       

            <hr>
        @endforeach
            <div id="pagination">
                <nav>
                    {!! $publications !!}
                </nav>
            </div>

    </div><!--/news-all-->
@stop
