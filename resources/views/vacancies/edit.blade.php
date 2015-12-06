@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Vacancy Edit</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->

			{!!  Form::model($vacancy,array('route' => ['vacancies.update',$vacancy->slug],'method'=>"PATCH",'role'=>'form')) !!}

				@include('vacancies.form',['button'=>"Update"])

			{!! Form::close() !!}

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@stop