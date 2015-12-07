 @extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>{{trans('messages.lbl_bio')}}</h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')

<div class="bio-page">

<img src="{{$biographies->photo_url}}" alt=""  width="300px"  height="340px">
<p>{{$biographies->fullname}}</p>
<p><strong>{{$biographies->{trans('messages.title')} }}</strong></p>
    
</div><!--/bio-page-->


   {!! $biographies->{trans('messages.content')} !!}


@stop
