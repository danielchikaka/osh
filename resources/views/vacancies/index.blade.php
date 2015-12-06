@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
  <div class="container" id="title-wrap-inner">
    <h1>{{trans('messages.lbl_vacancies')}}</h1>
  </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')


      <div id="news-all"  class="trainings">


      @foreach($vacancies as $vacancy )
        <div class="single-news-all">
                 
          <h4>{{$vacancy->{trans('messages.summary')} }}</h4>


          <div >
            

          <span class="pull-left">{{trans('messages.lbl_posted')}}: {{ date('M d , Y', strtotime($vacancy->created_at)) }}</span>
       
          </div>


          <a href="{{URL::route('vacancies.show',$vacancy->slug)}}">{{trans('messages.lbl_continue')}}  &rarr; </a>
          
        </div><!--/single-news-all-->     

        <hr>
    @endforeach
         



      <div id="pagination">
        <nav>
          {!! $vacancies->render() !!}
</nav>
      </div>

      </div><!--/news-all-->
  

@stop





