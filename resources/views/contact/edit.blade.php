@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Categories</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->

			{!!  Form::model($page,array('route' => ['pages.store',$page->id])) !!}

				@include('pages.form',['button'=>"Update"])

			{!! Form::close() !!}


    </div><!-- /.box-body -->
  </div><!-- /.box -->
@stop