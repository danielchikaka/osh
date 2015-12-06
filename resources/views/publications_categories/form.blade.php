<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Categories</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="form-group">
          {!! Form::label('title_en','Category Title in English') !!}
          {!! Form::text('title_en',null,['class'=>'form-control','placeholder'=>'Enter Category Title in English']) !!}
          <span class='error'>{{ $errors->first('title_en') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('title_sw','Category Title in Swahili') !!}
          {!! Form::text('title_sw',null,['class'=>'form-control','placeholder'=>'Enter Category Title in Swahili']) !!}
          <span class='error'>{{ $errors->first('title_sw') }}</span>
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







