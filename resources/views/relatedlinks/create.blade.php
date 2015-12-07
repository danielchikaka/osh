@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-body">
        <!-- text input -->


			{!!  Form::open(array('route' => 'relatedlinks.store','role'=>'form')) !!}

				@include('relatedlinks.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop