@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Tender Edit</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->

			{!!  Form::model($tender,array('route' => ['tenders.update',$tender->id],'method'=>"PATCH",'enctype'=>'multipart/form-data','role'=>'form')) !!}

				@include('tenders.form',['button'=>"Update"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop