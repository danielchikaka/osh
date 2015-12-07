@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Categories</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->


			{!!  Form::open(array('route' => 'categories.store','role'=>'form')) !!}

				@include('categories.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop