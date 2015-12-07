

        <div class="form-group">
        	{!! Form::label('title_en','Title in English') !!}
        	{!! Form::text('title_en',null,['class'=>'form-control','placeholder'=>'Enter Title in English']) !!}
    			<span class='error'>{{ $errors->first('title_en') }}</span>
        </div>  

        <div class="form-group">
        	{!! Form::label('title_sw','Title in Swahili') !!}
        	{!! Form::text('title_sw',null,['class'=>'form-control','placeholder'=>'Enter Title in Swahili']) !!}
          <span class='error'>{{ $errors->first('title_sw') }}</span>
        </div>


   <div class="form-group">
        {!! Form::label('gallery_id','Select Gallery') !!}
        {!! Form::select('gallery_id',$galleries,null,['class'=>'form-control']) !!}
    			<span class='error'>{{ $errors->first('gallery_id') }}</span>

   </div>



    <div class="form-group">
    	{!! Form::label('filename','News filename') !!}
    	{!! Form::file('filename',null,['class'=>'form-control']) !!}
			<span class='error'>{{ $errors->first('filename') }}</span>
    </div>

        <!-- radio -->
        <div class="form-group">
          <div class="radio">
            <label>
          {!! Form::radio('is_published',1)!!}  	
              	Published
            </label>
          </div>
          <div class="radio">
            <label>
          	{!! Form::radio('is_published',0,['checked'])!!}  	
              	Un Published
            </label>
          </div>
        </div>


{!! Form::submit($button, array('class' => 'tiny button')) !!}


@section('js')


@stop








