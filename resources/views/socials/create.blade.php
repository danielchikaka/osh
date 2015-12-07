@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Socials</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->


  {!!  Form::model($settings,array('route' => ['socials.store',''])) !!}

				@include('socials.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop