@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Quicklinks</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->

                   {!!  Form::model($quicklink,['method' => 'PATCH', 'route'=> ['quicklinks.update', $quicklink->id]])!!}

				@include('quicklinks.form',['button'=>"Update"])

			{!! Form::close() !!}


    </div><!-- /.box-body -->
  </div><!-- /.box -->
@stop