@extends('application')
@section('content')

    <div class="box-body">
        <!-- text input -->


			{!!  Form::open(array('route' => 'publications-categories.store','role'=>'form')) !!}

				@include('publications_categories.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->


@stop