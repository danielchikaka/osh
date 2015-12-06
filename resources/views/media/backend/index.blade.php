@extends('application')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/croppic.css')}}">
@stop
@section('page_header')
  <!-- Content Header (Page header) -->

@stop

@section('content')

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Media</h3>
     <a href="{{URL::route('media.create')}}"><i class="fa fa-fw fa-plus"></i></a>     

    </div>
    <div class="box-body">
                  <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Media</th>
                        <th width="30%">Title</th>
                        <th >Gallery</th>
                        <th width="8%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($media as $med)
                        <tr>
                        <td><img src="{{asset($med->filepath.$med->filename)}}" width="150" height="100"></td>
                          <td>{{$med->title_en}}</td>
                          <td >{{$med->gallery->title_en}}</td>
                          <td><a href="{{URL::route('media.edit',$med->id)}}"><i class="fa fa-fw fa-edit"></i></a>  <a href="{{URL::route('media.publish',$med->id)}}"><i class="fa fa-fw fa-toggle-{{($med->is_published)?'on green':'off grey'}}"></i></a> <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('media.destroy',$med->id)}}"><i class="fa fa-fw fa-remove"></i></a></td>
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
@stop