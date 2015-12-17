@extends('application')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/croppic.css')}}">
    <link rel="stylesheet" href="{{asset('site/bower_components/mediaelement/build/mediaelementplayer.min.css')}}">
@stop
@section('page_header')
  <!-- Content Header (Page header) -->

@stop

@section('content')

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Videos</h3>
     <a href="{{URL::route('videos.create')}}"><i class="fa fa-fw fa-plus"></i></a>     

    </div>
    <div class="box-body">
                  <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Video</th>
                        <th width="60%">Title</th>
               
                        <th width="8%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($videos as $video)

                     <tr>
                     
                        <td>        
                          <video width="220" height="150"  preload="none">
                              <source type="video/youtube" src="{{$video->url}}" />
                          </video>
                        </td>
                          <td>{{$video->title_en}}</td>
                   
                          <td><a href="{{URL::route('videos.edit',$video->id)}}"><i class="fa fa-fw fa-edit"></i></a>  <a href="{{URL::route('videos.publish',$video->id)}}"><i class="fa fa-fw fa-toggle-{{($video->is_published)?'on green':'off grey'}}"></i></a> <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('videos.destroy',$video->id)}}"><i class="fa fa-fw fa-remove"></i></a></td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>
    </div><!-- /.box-body -->

  </div><!-- /.box -->
@stop
@section('js')
    <script src="{{asset('admin/ajremove.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('site/bower_components/mediaelement/build/mediaelement-and-player.min.js')}}"></script>

      <script>
      $(function () {
          // $("#example2").DataTable();
        $('#datatable').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script> 

    <script>
    $('video,audio').mediaelementplayer();
    </script>
@stop