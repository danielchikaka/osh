@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">News Edit</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->

			{!!  Form::model($news,array('route' => ['news.update',$news->slug],'method'=>"PATCH",'enctype'=>'multipart/form-data','role'=>'form')) !!}

				@include('news.form',['button'=>"Update"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop