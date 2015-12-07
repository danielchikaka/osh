 @extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>{{ trans('messages.lbl_training')}}: {{ $training->{trans('messages.title')} }}</h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')

	  <div id="news-all" >

	  <ul class="trainings-details">
	  	<li>Duration:  {{$training->duration }}</li>
	  	<li>{{trans('messages.lbl_start')}}: {{ date('M d , Y', strtotime($training->created_at)) }}</li>
	  	<li>Location: {{$training->location}}</li>
	  	<li>Fees: {{$training->fees}} </li>
	  	<li><a href="#">Apply Now</a></li>
	  </ul>


			{!! $training->{trans('messages.content')} !!}
	  	
	  </div><!--/news-all-->

@stop
