<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Categories</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    
        <div class="form-group">
          {!! Form::label('org_name_en','Organization Name in English') !!}
          {!! Form::text('org_name_en',null,['class'=>'form-control','placeholder'=>'Enter Organization Name in English']) !!}
          <span class='error'>{{ $errors->first('org_name_en') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('org_name_sw','Organization Name in Swahili') !!}
          {!! Form::text('org_name_sw',null,['class'=>'form-control','placeholder'=>'Enter Organization Name in Swahili']) !!}
          <span class='error'>{{ $errors->first('org_name_sw') }}</span>
        </div>           
        <div class="form-group">
          {!! Form::label('physical_en','Physical Address in English') !!}
          {!! Form::text('physical_en',null,['class'=>'form-control','placeholder'=>'Enter Physical Address in English']) !!}
          <span class='error'>{{ $errors->first('physical_en') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('physical_sw','Physical Address in Swahili') !!}
          {!! Form::text('physical_sw',null,['class'=>'form-control','placeholder'=>'Enter Physical Address in Swahili']) !!}
          <span class='error'>{{ $errors->first('physical_sw') }}</span>
        </div>   


        <div class="form-group">
          {!! Form::label('box_no_en','Po Box in English') !!}
          {!! Form::text('box_no_en',null,['class'=>'form-control','placeholder'=>'Enter Po Box in English']) !!}
          <span class='error'>{{ $errors->first('box_no_en') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('box_no_sw','Po Box in Swahili') !!}
          {!! Form::text('box_no_sw',null,['class'=>'form-control','placeholder'=>'Enter Po Box in Swahili']) !!}
          <span class='error'>{{ $errors->first('box_no_sw') }}</span>
        </div>    


        <div class="form-group">
          {!! Form::label('phone_no','Phone Number') !!}
          {!! Form::text('phone_no',null,['class'=>'form-control','placeholder'=>'Enter Phone Number']) !!}
          <span class='error'>{{ $errors->first('phone_no') }}</span>
        </div>  

        <div class="form-group">
          {!! Form::label('email','Email') !!}
          {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Email']) !!}
          <span class='error'>{{ $errors->first('email') }}</span>
        </div> 

           
        <div class="form-group">
          {!! Form::label('fax','Fax') !!}
          {!! Form::text('fax',null,['class'=>'form-control','placeholder'=>'Enter Fax']) !!}
          <span class='error'>{{ $errors->first('fax') }}</span>
        </div> 
           
        <div class="form-group">
          {!! Form::label('region','Region') !!}
          {!! Form::text('region',null,['class'=>'form-control','placeholder'=>'Enter Region']) !!}
          <span class='error'>{{ $errors->first('region') }}</span>
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







