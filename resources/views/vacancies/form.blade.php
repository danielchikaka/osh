        <div class="form-group">
        	{!! Form::label('title_en','Position In English') !!}
        	{!! Form::text('title_en',null,['class'=>'form-control','placeholder'=>'Enter Position In English']) !!}
    			<span class='error'>{{ $errors->first('title_en') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('title_sw','Position in Swahili') !!}
          {!! Form::text('title_sw',null,['class'=>'form-control','placeholder'=>'Enter Position In Swahili']) !!}
          <span class='error'>{{ $errors->first('title_sw') }}</span>
        </div>
        <div class="form-group">
          {!! Form::label('summary_en','Summary in English') !!}
          {!! Form::textarea('summary_en',null,['class'=>'form-control','placeholder'=>'Enter Summary in English']) !!}
          <span class='error'>{{ $errors->first('summary_en') }}</span>
        </div>          

        <div class="form-group">
          {!! Form::label('summary_sw','Summary in Swahili') !!}
          {!! Form::textarea('summary_sw',null,['class'=>'form-control','placeholder'=>'Enter Summary in Swahili']) !!}
          <span class='error'>{{ $errors->first('summary_sw') }}</span>
        </div> 
        
      <div class="box box-info">
        <div class="box-body pad">
          {!! Form::label('content_en','Position Description in English') !!}
          {!! Form::textarea('content_en',null,['class'=>'form-control ck_text']) !!}
          <span class='error'>{{ $errors->first('content_en') }}</span>


        </div>
      </div><!-- /.box -->

      <div class="box box-info">
        <div class="box-body pad">
          {!! Form::label('content_sw','Position Description in Swahili') !!}
          {!! Form::textarea('content_sw',null,['class'=>'form-control ck_text']) !!}
          <span class='error'>{{ $errors->first('content_sw') }}</span>


        </div>
      </div><!-- /.box -->




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
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('content_en');
        CKEDITOR.replace('content_sw');
      });
</script>

@stop





