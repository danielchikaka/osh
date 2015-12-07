{!! Form::model($menu, array('route' => array('menuitems.update', $menu->id), 'method' => 'PATCH')) !!}

			@include('menuitems.form') 

	
			{!! Form::submit('Save', array('class' => 'tiny button')) !!}
		

{!! Form::close() !!}

