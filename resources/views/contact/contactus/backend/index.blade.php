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
      <li class="active">Faqs List</li>
    </ol>
  </section>
@stop

@section('content')




  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Faqs</h3>
    </div>
    <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th >Answer</th>
                        <th width="8%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($faqs as $f)
                        <tr>
                          <td></td>
                          <td>{{$f->question_sw}}</td>
                          <td>{{$f->question_en}}</td>
                          <td><a href="{{URL::route('faqs.edit',$f->id)}}"><i class="fa fa-fw fa-edit"></i></a>  <a href="{{URL::route('faqs.publish',$f->id)}}"><i class="fa fa-fw fa-toggle-{{($f->is_published)?'on green':'off grey'}}"></i></a> <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('faqs.destroy',$f->id)}}"><i class="fa fa-fw fa-remove"></i></a></td>
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