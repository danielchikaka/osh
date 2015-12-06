<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Quick Links</h3>
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

        <div class="form-group">
          {!! Form::label('url','Url') !!}
          {!! Form::text('url',null,['class'=>'form-control linkit','placeholder'=>'Enter Url']) !!}
          <a data-toggle="modal" href="{{URL::route('menuitems.items')}}" data-target="#myModal"><i class="fa fa-fw fa-link"></i></a>

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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modal title</h4>

            </div>
            <div class="modal-body"><div class="te"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



@section('js')
  <script type="text/javascript">
      $('#myModal').on('click','.linkable a',function () {
        $('.linkit').val($(this).attr('href'));
        $('#myModal').modal('hide');
        return false;
      });

  </script>

@stop



