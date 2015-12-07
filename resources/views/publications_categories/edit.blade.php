@extends('application')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Categories</h3>
    </div><!-- /.box-header -->
    <div class="box-body">

			{!!  Form::model($category,array('method'=>"PATCH",'route' => ['publications-categories.update',$category->id])) !!}
  				@include('publications_categories.form',['button'=>"Update"])
			{!! Form::close() !!}


    </div><!-- /.box-body -->
</div><!-- /.box -->
@stop