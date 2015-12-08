

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
            {!! Form::label('content_en','Body in English') !!}
            {!! Form::textarea('content_en',null,['class'=>'form-control ck_text']) !!}
            <span class='error'>{{ $errors->first('content_en') }}</span>
          </div>
        </div><!-- /.box -->   
         
    <div class="box box-info">
      <div class="box-body pad">
        {!! Form::label('content_sw','Body in Swahili') !!}
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

    <script src="{{ asset('admin/plugins/summernote/summernote.min.js') }}"></script>
 
 <script>
     $(document).ready(function() {
      $('.ck_text').summernote({
        // height: 300,                 // set editor height

  minHeight: 300,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
      });
    });
 </script>

@stop








