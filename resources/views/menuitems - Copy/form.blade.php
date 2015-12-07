
<div class="form-group">

	{!! Form::label('menu_name', 'Select Menu') !!}
	{!! Form::select('menu_name', array('main_nav' => 'Main menu'), null, array('class' => 'menu_name form-control')) !!}
	<span class='form_error'>{!! $errors->first('menu_name') !!}</span>
</div>


<div class="form-group">

	{!! Form::label('title_en', 'English title') !!}
	{!! Form::text('title_en',null,['class'=>'form-control']) !!}
	<span class='form_error'>{!! $errors->first('title_en') !!}</span>
</div>

<div class="form-group">
	{!! Form::label('title_sw', 'Swahili title') !!}
	{!! Form::text('title_sw',null,['class'=>'form-control']) !!}
	<span class='form_error'>{!! $errors->first('title_sw') !!}</span>
</div>


<div class="form-group">
	{!! Form::label('url', 'URL') !!}
	{!! Form::text('url',null,['class'=>'linkit form-control']) !!}
	<span class='form_error'>{!! $errors->first('url') !!}</span>
     <a data-toggle="modal" href="{{URL::route('menuitems.items')}}" data-target="#myModal"><i class="fa fa-fw fa-link"></i></a>

</div>


{!! Form::hidden('editpath', URL::to("menuitems"), array("id" => "pathedit")) !!}


