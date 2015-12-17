
    <div class="box-body">
        <div class="form-group">
          {!! Form::label('facebook','Facebook Url') !!}
          {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Enter Facebook']) !!}
          <span class='error'>{{ $errors->first('facebook') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('twitter','Twitter  Url') !!}
          {!! Form::text('twitter',null,['class'=>'form-control','placeholder'=>'Enter Facebook  Url']) !!}
          <span class='error'>{{ $errors->first('twitter') }}</span>
        </div>


        <div class="form-group">
          {!! Form::label('youtube','Youtube  Url') !!}
          {!! Form::text('youtube',null,['class'=>'form-control','placeholder'=>'Enter Youtube  Url']) !!}
          <span class='error'>{{ $errors->first('youtube') }}</span>
        </div>


        <div class="form-group">
          {!! Form::label('youtube','Blog Url') !!}
          {!! Form::text('blogger',null,['class'=>'form-control','placeholder'=>'Enter Blog  Url']) !!}
          <span class='error'>{{ $errors->first('blogger') }}</span>
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

    </div><!-- /.box-body -->


{!! Form::submit($button, array('class' => 'tiny button')) !!}







