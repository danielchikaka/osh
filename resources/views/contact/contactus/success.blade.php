@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
  <div class="container" id="title-wrap-inner">
      <h1>{{ (Session::get('locale')=='en')?'Success':'Mafanikio'}}</h1>
  </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
	<h3>{{trans('messages.lbl_success')}} </h3>	

@stop





