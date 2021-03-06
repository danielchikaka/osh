        <div class="form-group">
        	{!! Form::label('title_en','Training Title') !!}
        	{!! Form::text('title_en',null,['class'=>'form-control','placeholder'=>'Enter Training Title in english']) !!}
    			<span class='error'>{{ $errors->first('title_en') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('title_sw','Training Title') !!}
          {!! Form::text('title_sw',null,['class'=>'form-control','placeholder'=>'Enter Training Title in swahili']) !!}
          <span class='error'>{{ $errors->first('title_sw') }}</span>
        </div>
        <div class="form-group">
          {!! Form::label('fees','Fees') !!}
          {!! Form::text('fees',null,['class'=>'form-control','placeholder'=>'Enter Fees']) !!}
          <span class='error'>{{ $errors->first('fees') }}</span>
        </div>
        <div class="form-group">
          {!! Form::label('duration','Duration') !!}
          {!! Form::text('duration',null,['class'=>'form-control','placeholder'=>'Enter Duration']) !!}
          <span class='error'>{{ $errors->first('duration') }}</span>
        </div>
        <div class="form-group">
          {!! Form::label('location','Location') !!}
          {!! Form::text('location',null,['class'=>'form-control','placeholder'=>'Enter Location']) !!}
          <span class='error'>{{ $errors->first('location') }}</span>
        </div>

        <div class="form-group">
          {!! Form::label('start_date','Start Date: ') !!}
          {!! Form::text('start_date',null,['class'=>'form-control datepicker','placeholder'=>'Start Date']) !!}
      
          <span class='error'>{{ $errors->first('start_date') }}</span>
        </div>
        <div class="form-group">
          {!! Form::label('end_date','End Date: ') !!}
          {!! Form::text('end_date',null,['class'=>'form-control datepicker' ,'placeholder'=>'End Date']) !!}
          <span class='error'>{{ $errors->first('end_date') }}</span>
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
          {!! Form::label('content_en','Training Description in English') !!}
          {!! Form::textarea('content_en',null,['class'=>'form-control ck_text']) !!}
          <span class='error'>{{ $errors->first('content_en') }}</span>


        </div>
      </div><!-- /.box -->

      <div class="box box-info">
        <div class="box-body pad">
          {!! Form::label('content_sw','Training Description in Swahili') !!}
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

  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 
 <script>
     $(document).ready(function() {
      $('.ck_text').summernote({
        // height: 300,                 // set editor height

  minHeight: 300,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
      });
    });
 </script>


 <script type="text/javascript">
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
  </script>

@stop





