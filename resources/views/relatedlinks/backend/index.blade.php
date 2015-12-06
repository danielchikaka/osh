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
      <h3 class="box-title">Related Links</h3>
 <a href="{{URL::route('relatedlinks.create')}}"><i class="fa fa-fw fa-plus"></i></a>     

    </div>
    <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="2%">#</th>
                        <th>Title</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($related as $r)
                        <tr>
                          <td></td>
                          <td><a target="_blank" href="{{$r->url}}">  {{$r->title_en}}</a></td>
                          <td class="delete-btn">
                                <a href="{{route('relatedlinks.edit',$r->id)}}"><i class="fa fa-fw fa-edit"></i></a>  
                                <a href="{{URL::route('relatedlinks.publish',$r->id)}}"><i class="fa fa-fw fa-toggle-{{($r->is_published)?'on green':'off grey'}}"></i></a>
                  
                               <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('relatedlinks.destroy',$r->id)}}"><i class="fa fa-fw fa-remove"></i></a>
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