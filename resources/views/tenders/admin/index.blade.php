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
      <h3 class="box-title">Tenders</h3>
    </div>
    <div class="box-body">
<table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th >File En</th>
                        <th >File Sw</th>
                        <th width="8%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tenders as $tender)
                        <tr>
                          <td>{{$tender->title_en}}</td>
                          <td ><a href="{{URL::to($tender->file_en) }}">{{$tender->title_en}}</a></td>
                          <td ><a href="{{URL::to($tender->file_sw)}}">{{$tender->title_sw}}</a></td>
                          <td><a href="{{URL::route('publications.edit',$tender->id)}}"><i class="fa fa-fw fa-edit"></i></a>  <a href="{{URL::route('publications.publish',$tender->id)}}"><i class="fa fa-fw fa-toggle-{{($tender->is_published)?'on green':'off grey'}}"></i></a> <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('publications.destroy',$tender->id)}}"><i class="fa fa-fw fa-remove"></i></a></td>
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