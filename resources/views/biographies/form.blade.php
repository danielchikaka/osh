

        <!-- text input -->
        <div class="form-group">
        	{!! Form::label('fullname','Enter Full Name') !!}
        	{!! Form::text('fullname',null,['class'=>'form-control','placeholder'=>'Enter Full Name']) !!}
    			<span class='error'>{{ $errors->first('fullname') }}</span>
        </div> 



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
        
		<div class="box box-info">
		<div class="box-body pad">
			{!! Form::textarea('content_en',null,['class'=>'form-control ck_text']) !!}

		</div>
		</div><!-- /.box -->   
		     
		<div class="box box-info">
		<div class="box-body pad">
			{!! Form::textarea('content_sw',null,['class'=>'form-control ck_text']) !!}

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




