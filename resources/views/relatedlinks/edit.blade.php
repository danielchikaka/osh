@extends('application')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Related Links</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- text input -->

      <!-- {!!  Form::model($related,array('route' => ['relatedlinks.store',$related->id])) !!} -->
			{!!  Form::model($related,['method' => 'PATCH', 'route'=> ['relatedlinks.update', $related->id]])!!}

				@include('relatedlinks.form',['button'=>"Update"])

			{!! Form::close() !!}


    </div><!-- /.box-body -->
  </div><!-- /.box -->
@stop


