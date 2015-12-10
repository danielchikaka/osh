@extends('application')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/cropper/dist/cropper.min.css')}}">
@stop
@section('page_header')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blank page
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

@stop

@section('content')



  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Biography</h3>
    </div>
    <div class="box-body">
    @if($bios)
                  <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
                <div class="col-lg-6 cropHeaderWrapper  img-responsive img-box">
                  <div ><img src="{{url($bios->photo_url)}}" id="img" /></div>
                  <span class="btn" id="upload">Edit Picture</span>
<label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Import image with Blob URLs">
              <span class="fa fa-upload"></span>
            </span>
          </label>

            <h3 class="profile-username text-center">{{ $bios->fullname}} <a href="{{URL::route('biographies.create',$bios->id)}}"><i class="fa fa-fw fa-edit"></i></a></h3>
            <p class="text-muted text-center">{{ $bios->title_en }}</p>
            <img src="" id="testnow" />
                </div>
             <!-- <img class="profile-user-img img-responsive img-box" width="300" height="340" src="{{asset('admin/dist/img/user4-128x128.jpg')}}" alt="User profile picture"> -->

          </div><!-- /.box-body -->
        </div><!-- /.box -->
        {!! $bios->content_en !!}
      @else
        No Records

      @endif
    </div><!-- /.box-body -->

  </div><!-- /.box -->
@stop
@section('js')
    <script src="{{ asset('admin/cropper/dist/cropper.min.js') }}"></script>

    <script>

     $('#img').cropper({
        // aspectRatio: 16 / 9,
        cropBoxResizable:false,
        minContainerWidth:400,
        minContainerHeight:440,
        minCropBoxWidth:300,
        minCropBoxHeight:340,
        crop: function(e) {
        }

      });






    $('#upload').click(function(){

// Upload cropped image to server


  var formData = new FormData();

  formData.append('photo_url', $('#img').cropper('getCroppedCanvas').toDataURL());
  formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

  $.ajax("{{ URL::route('biographies.img-edit',$bios->id)}}", {
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function () {
     location.reload();
    },
    error: function () {
      console.log('Upload error');
    }
  });



    });
function readURL(input) {

        var reader = new FileReader();
        reader.onload = function (e) {
console.log(input)          
            // $('#img').attr('src', e.target.result);
   
          $('#img').cropper('replace',  e.target.result);

  
        }

        reader.readAsDataURL(input.files[0]);
}


$(function(){   
    $("#inputImage").change(function () { //set up a common class
        readURL(this);
    });
});
  </script>
@stop