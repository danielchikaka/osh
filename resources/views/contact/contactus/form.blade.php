
    <style>
    input{
        width: 98.5% !important;
    }
    </style>


      {!!  Form::open(array('route' => 'contact.send-mail')) !!}

      <p>
          {!! Form::text('name',null,['class'=>'','placeholder'=>'Enter Name']) !!}
          <span class='error'>{{ $errors->first('name') }}</span>

      </p>

      <p>          {!! Form::text('email',null,['class'=>'','placeholder'=>'Enter your email']) !!}
          <span class='error'>{{ $errors->first('email') }}</span></p>
      <p>
          {!! Form::text('subject',null,['class'=>'','placeholder'=>'Enter subject']) !!}
          <span class='error'>{{ $errors->first('subject') }}</span>

      </p>
      <p>
            {!! Form::textarea('message',null,['class'=>'']) !!}
          <span class='error'>{{ $errors->first('message') }}</span>

      </p>
      <p>
        <button type="submit"  class="btn btn-default"    style="border-radius: 2px">{{trans('messages.lbl_send')}}</button>
      </p>
    {!! Form::close() !!}
@section('js')

@stop





