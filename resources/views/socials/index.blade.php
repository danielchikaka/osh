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
      <h3 class="box-title">Categories</h3>
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
                      @foreach($categories as $category)
                        <tr>
                          <td>{{$category->title_en}}</td>
                          <td><a href=""><i class="fa fa-fw fa-edit"></i></a>  <a href="{{URL::route('categories.publish',$category->id)}}"><i class="fa fa-fw fa-toggle-{{($category->is_published)?'on green':'off grey'}}"></i></a></td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Title</th>
                        <th>Action(s)</th>
                      </tr>
                    </tfoot>
                  </table>
    </div><!-- /.box-body -->

  </div><!-- /.box -->
@stop
@section('js')
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