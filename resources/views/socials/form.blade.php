<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Categories</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="form-group">
          {!! Form::label('facebook','Facebook') !!}
          {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Enter Facebook']) !!}
          <span class='error'>{{ $errors->first('facebook') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('twitter','Facebook Address') !!}
          {!! Form::text('twitter',null,['class'=>'form-control','placeholder'=>'Enter Facebook Address']) !!}
          <span class='error'>{{ $errors->first('twitter') }}</span>
        </div>


        <div class="form-group">
          {!! Form::label('youtube','Youtube Address') !!}
          {!! Form::text('youtube',null,['class'=>'form-control','placeholder'=>'Enter Youtube Address']) !!}
          <span class='error'>{{ $errors->first('youtube') }}</span>
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
  </div><!-- /.box -->

{!! Form::submit($button, array('class' => 'tiny button')) !!}







