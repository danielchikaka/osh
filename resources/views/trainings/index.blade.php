@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
  <div class="container" id="title-wrap-inner">
    <h1>{{trans('messages.lbl_training')}}</h1>
  </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')


      <div id="news-all"  class="trainings">


      @foreach($trainings as $training )



      <div class="single-news-all">
               
        <h4>{{$training->{trans('messages.summary')} }}</h4>


        <div >
          

          <span class="pull-left">{{trans('messages.lbl_start')}}: {{ date('M d , Y', strtotime($training->created_at)) }}</span>

          <span class="pull-right"><a href="#">{{trans('messages.lbl_apply') }}</a></span>

        </div>

          <a href="{{URL::route('trainings.show',$training->slug)}}">{{ trans('messages.lbl_continue') }}  &rarr; </a>


      </div><!--/single-news-all-->     

      <hr>


    @endforeach
         



      <div id="pagination">
        <nav>
          {!! $trainings->render() !!}
</nav>
      </div>

      </div><!--/news-all-->
  

@stop





