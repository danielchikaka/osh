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
      <h3 class="box-title">Quick Links</h3>
 <a href="{{URL::route('quicklinks.create')}}"><i class="fa fa-fw fa-plus"></i></a>     

    </div>
    <div class="box-body">
<table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($quicklinks as $quick)
                        <tr>
                          <td><a target="_blank" href="{{$quick->url}}">  {{$quick->title_en}}</a></td>
                          <td>
                          <a href="{{route('quicklinks.edit',$quick->id)}}"><i class="fa fa-fw fa-edit"></i></a>  
                          <a href="{{URL::route('quicklinks.publish',$quick->id)}}"><i class="fa fa-fw fa-toggle-{{($quick->is_published)?'on green':'off grey'}}"></i></a>
                            <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('quicklinks.destroy',$quick->id)}}"><i class="fa fa-fw fa-remove"></i></a>

                          </td>
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