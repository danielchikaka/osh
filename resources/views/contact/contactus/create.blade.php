 @extends('layouts.site.lay-right-contact')
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>{{trans('messages.lbl_contact_us')}}</h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')
      {!!  Form::open(array('route' => 'contact.send-mail')) !!}

        @include('contact.contactus.form',['button'=>"{{trans('messages.lbl_send')}}"])

      {!! Form::close() !!}
@stop
