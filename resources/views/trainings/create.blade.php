@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Trainings</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->


			{!!  Form::open(array('route' => 'trainings.store','role'=>'form')) !!}

				@include('trainings.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop