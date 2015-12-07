@extends ('layouts.site.news')

@section('title')
{{label('lbl_news')}}
@stop 

@section('news')
      
  <div class="news-wrapper">
    
    <div class="news-thumb-title">

      <h2>{{ $news->{langdb('title')} }}</h2>
      
        @if($news->photo_url)
          <img src="{{ URL::to($news->photo_url) }}" class="no-margin" alt="">
        @endif

        <div class="news-content-wrapper">
          <p>{{ $news->{langdb('content')} }}</p>
        </div> <!--/news-content-wrapper-->

      <div class="news-date-single">
        <p>Posted on {{ date("d<\s\u\p>S</\s\u\p> F, Y ", strtotime($news->created_at)) }}</p>
      </div><!--/news-date-single-->


  
    </div><!--/news-thumb-title-->


    </div> <!--/news-wrapper-->

@stop                            
       