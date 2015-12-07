@extends('application')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/croppic.css')}}">
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
      <li class="active">News List</li>
    </ol>
  </section>

@stop

@section('content')




  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Publications</h3>
   <a href="{{URL::route('publications.create')}}"><i class="fa fa-fw fa-plus"></i></a>     

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
                      @foreach($pubs as $data)
                        <tr>
                          <td>{{$data->title_en}}</td>
                          <td ><a href="{{URL::to($data->file_en) }}">{{$data->title_en}}</a></td>
                          <td ><a href="{{URL::to($data->file_sw)}}">{{$data->title_sw}}</a></td>
                          <td><a href="{{URL::route('publications.edit',$data->id)}}"><i class="fa fa-fw fa-edit"></i></a>  <a href="{{URL::route('publications.publish',$data->id)}}"><i class="fa fa-fw fa-toggle-{{($data->is_published)?'on green':'off grey'}}"></i></a> <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('publications.destroy',$data->id)}}"><i class="fa fa-fw fa-remove"></i></a></td>
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