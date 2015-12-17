@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Contacts</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->

			{!!  Form::model($press,array('route' => ['contact.update',$press->id],'method'=>"PATCH",'enctype'=>'multipart/form-data','role'=>'form')) !!}

				@include('contact.form',['button'=>"Update"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop