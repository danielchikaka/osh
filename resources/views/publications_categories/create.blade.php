@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Publications Categories</h3>
    </div><!-- /.box-header -->
    <div class="box-body">

			{!!  Form::open(array('route' => 'publications-categories.store','role'=>'form')) !!}

				@include('publications_categories.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop