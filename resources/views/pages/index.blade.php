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
      <h3 class="box-title">Pages</h3>
 <a href="{{URL::route('pages.create')}}"><i class="fa fa-fw fa-plus"></i></a>     

    </div>
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="30%">Title</th>
              <th>Category</th>
              <th >Summary</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pages as $page)
              <tr>
                <td>{{$page->title_en}}</td>
                <td>{{$page->category->title_en}}</td>
                <td >{{$page->summary_en}}</td>
                <td><a href="{{URL::route('pages.edit',$page->id)}}"><i class="fa fa-fw fa-edit"></i></a>  <a href="{{URL::route('pages.publish',$page->id)}}"><i class="fa fa-fw fa-toggle-{{($page->is_published)?'on green':'off grey'}}"></i></a> <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('pages.destroy',$page->id)}}"><i class="fa fa-fw fa-remove"></i></td>
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