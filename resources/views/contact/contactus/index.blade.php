@extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
  <div class="container" id="title-wrap-inner">
    <h1>{{trans('messages.lbl_faq')}}</h1>
  </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
	
    <div class="accordion">
    <dl>
     @foreach($faqs as $i=>$f)
      <dt class="{{(!$i)?'active':''}}"><a href="#"><span class="arrow"></span>{{ $f->{trans('messages.question')} }}</a></dt>
      <dd class="{{(!$i)?'active':''}}">
       {!! $f->{trans('messages.answer')} !!}
      </dd>
     @endforeach
    </dl>
  </div><!--/accordion-->


@stop





