@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Publication Edit</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->

			{!!  Form::model($pub,array('route' => ['publications.update',$pub->id],'method'=>"PATCH",'enctype'=>'multipart/form-data','role'=>'form')) !!}

				@include('publications.form',['button'=>"Update"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop