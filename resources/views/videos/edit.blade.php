@extends('application')

@section('content')

    <div class="box-body">
        <!-- text input -->

			{!!  Form::model($video,array('route' => ['videos.update',$video->id],'method'=>'PATCH')) !!}

				@include('videos.form',['button'=>"Update"])

			{!! Form::close() !!}


    </div><!-- /.box-body -->

@stop