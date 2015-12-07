@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Galleries</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->


                   {!!  Form::model($category,['method' => 'PATCH', 'route'=> ['galleries.update', $category->id]])!!}

				@include('galleries.form',['button'=>"Update"])

			{!! Form::close() !!}


    </div><!-- /.box-body -->
  </div><!-- /.box -->
@stop