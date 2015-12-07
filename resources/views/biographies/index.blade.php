@extends('application')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/croppic.css')}}">
@stop
@section('page_header')

@stop

@section('content')




  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Biography</h3>
    </div>
    <div class="box-body">
    @if($biography)
                  <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
                <div class="col-lg-6 cropHeaderWrapper  img-responsive img-box">
                  <div id="croppic"></div>
                  <span class="btn" id="cropContainerHeaderButton">Edit Picture</span>
            <h3 class="profile-username text-center">{{ $biography->fullname}}</h3>
            <p class="text-muted text-center">{{ $biography->title_en }}</p>
                </div>
             <!-- <img class="profile-user-img img-responsive img-box" width="300" height="340" src="{{asset('admin/dist/img/user4-128x128.jpg')}}" alt="User profile picture"> -->


          </div><!-- /.box-body -->
        </div><!-- /.box -->
        {!! $biography->content_en !!}
      @else
        No Records

      @endif
    </div><!-- /.box-body -->

  </div><!-- /.box -->
@stop
@section('js')
    <script src="{{ asset('admin/croppic.min.js') }}"></script>

    <script>
    var csrf = '{{ csrf_token() }}';
    var croppicHeaderOptions = {
        //uploadUrl:'img_save_to_file.php',
        cropData:{
          "_token":'{{csrf_token()}}'
        },
        cropUrl:'{{URL::route('biographies.img-edit',$biography->id)}}',
        customUploadButtonId:'cropContainerHeaderButton',
        loadPicture:'{{URL::to($biography->photo_url)}}',
        modal:false,
        processInline:true,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    } 
    var croppic = new Croppic('croppic', croppicHeaderOptions);
    
  
  </script>
@stop