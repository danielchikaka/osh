        <div class="form-group">
        	{!! Form::label('question_en','Question in English') !!}
        	{!! Form::text('question_en',null,['class'=>'form-control','placeholder'=>'Enter Question in English']) !!}
    			<span class='error'>{{ $errors->first('question_en') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('question_sw','Question in Swahili') !!}
          {!! Form::text('question_sw',null,['class'=>'form-control','placeholder'=>'Enter Question in Swahili']) !!}
          <span class='error'>{{ $errors->first('question_sw') }}</span>
        </div>
        <div class="box box-info">
          <div class="box-body pad">
            {!! Form::label('answer_en','Answer in English') !!}
            {!! Form::textarea('answer_en',null,['class'=>'form-control ck_text']) !!}
            <span class='error'>{{ $errors->first('answer_en') }}</span>
          </div>
        </div><!-- /.box -->   
        <div class="box box-info">
          <div class="box-body pad">
            {!! Form::label('answer_sw','Answer in Swahili') !!}
            {!! Form::textarea('answer_sw',null,['class'=>'form-control ck_text']) !!}
            <span class='error'>{{ $errors->first('answer_sw') }}</span>
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




