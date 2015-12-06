@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">News</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->


			{!!  Form::open(array('route' => 'news.store','enctype'=>'multipart/form-data','role'=>'form')) !!}

				@include('news.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop