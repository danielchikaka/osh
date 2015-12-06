 @extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>{{ trans('messages.lbl_vacancies')}}: {{ $vacancy->{trans('messages.title')} }}</h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
      <div id="news-all" >



      <h4>{{trans('messages.lbl_pos_desc')}}: </h4>

        {!! $vacancy->{trans('messages.content')} !!}
      </div><!--/news-all-->

@stop
