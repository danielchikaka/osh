<div class="box  box-no-line">

      <h3 class="box-title">Related Links</h3>

    <div class="box-body">
        <div class="form-group">
          {!! Form::label('title_en','Related Link Title in English') !!}
          {!! Form::text('title_en',null,['class'=>'form-control','placeholder'=>'Enter Related Link Title in English']) !!}
          <span class='error'>{{ $errors->first('title_en') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('title_sw','Related Link Title in Swahili') !!}
          {!! Form::text('title_sw',null,['class'=>'form-control','placeholder'=>'Enter Related Link Title in Swahili']) !!}
          <span class='error'>{{ $errors->first('title_sw') }}</span>
        </div>

        <div class="form-group">
          {!! Form::label('url','Url') !!}
          {!! Form::text('url',null,['class'=>'form-control','placeholder'=>'Enter Url']) !!}
          <span class='error'>{{ $errors->first('url') }}</span>
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







