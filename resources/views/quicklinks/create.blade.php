@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Quick Links</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->


			{!!  Form::open(array('route' => 'quicklinks.store','role'=>'form')) !!}

				@include('quicklinks.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop