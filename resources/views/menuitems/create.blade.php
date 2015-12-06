
			
		{!! Form::open(array('route' => 'menuitems.store')) !!}

			@include('menuitems.form') 

	
			{!! Form::submit('Save', array('class' => 'tiny button')) !!}
		

		{!! Form::close() !!}

