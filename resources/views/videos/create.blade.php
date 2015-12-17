@extends('application')
@section('content')

    <div class="box-body">
        <!-- text input -->


			{!!  Form::open(array('route' => 'videos.store','role'=>'form')) !!}

				@include('videos.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->


@stop