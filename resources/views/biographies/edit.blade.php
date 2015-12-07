@extends('layouts.admin.application')
@section('content')

<div class="large-12 medium-12 small-12 columns">
	<div class="page-title">
		<a href="{{ URL::to('admin/news')}}"><i class="back-icon"></i></a>
		Edit News page
	</div>
</div>

<div class="row">
	<div class="large-11 medium-12 small-12 columns">

		
			{{ Form::model($news, array('route' => array('news.update', $news->id), 'enctype'=>'multipart/form-data', 'method' => 'PATCH')) }}

				@include('news._form')

			<div class="large-12 columns">
				{{ Form::submit('Save', array('class' => 'tiny button')) }}
			</div>

			{{ Form::close() }}
	</div>

</div>

@stop