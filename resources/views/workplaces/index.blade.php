 @extends('layouts.site.right-sidebar')
        @foreach($workplaces as $press)
        
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>    
                      {{ $press->{trans('messages.title')} }}
           </h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')

    @if($press->is_published == 1)




              {!! $press->{trans('messages.content')} !!}




    <br> <a href="{{ $press->{trans('messages.file')} }}">     {{ (Session::get('locale')=='en')?'Download Form':'Chukua Form'}}</a>

    @endif


@stop
        @endforeach
