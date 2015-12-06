@extends('application')

@section('content')

    <div class="box-body">
        <!-- text input -->

			{!!  Form::model($category,array('method'=>"PATCH",'route' => ['publications-categories.update',$category->id])) !!}

				@include('publications_categories.form',['button'=>"Update"])

			{!! Form::close() !!}


    </div><!-- /.box-body -->

@stop