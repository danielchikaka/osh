@extends('application')
@section('content')


    <div class="box-body">
        <!-- text input -->


			{!!  Form::open(array('route' => 'quicklinks.store','role'=>'form')) !!}

				@include('quicklinks.form',['button'=>"Save"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->


@stop