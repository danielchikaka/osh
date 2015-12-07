 @extends('layouts.site.lay-right')
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>{{$page->{trans('messages.title')} }}</h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
 {!! $page->{trans('messages.content')} !!}
@stop
