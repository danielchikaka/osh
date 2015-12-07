@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Person Biography</h3>
    </div><!-- /.box-header -->
    <div class="box-body">


			{!!  Form::model($biography,array('route' => 'biographies.store', 'enctype'=>'multipart/form-data','role'=>'form')) !!}

				@include('biographies.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop