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
      <h3 class="box-title">Contacts Details</h3>
            @if(count($contact) == 0)
   <a href="{{URL::route('contact.create')}}"><i class="fa fa-fw fa-plus"></i></a>     
   @else

             
             
                          <a href="{{URL::route('contact.edit',$contact->id)}}"><i class="fa fa-fw fa-edit"></i></a>  |  <a data-method="DELETE" data-confirm="Confirm Delete?" href="{{URL::route('contact.destroy',$contact->id)}}"><i class="fa fa-fw fa-remove"></i></a>
                   
@endif


    </div>
    <div class="box-body">
  @if($contact)
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="15%"></th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>Organization Name</td>
                          <td>{{$contact->org_name_en}}</td>
                        </tr>  
                        <tr>
                          <td>Physical Address</td>
                          <td>{{$contact->physical_en}}</td>
                        </tr>  
                        <tr>
                          <td>Address</td>
                          <td>{{$contact->box_no_en}}</td>
                        </tr>  
                        <tr>
                          <td>Organization Email</td>
                          <td>{{$contact->email}}</td>
                        </tr>  
                                <tr>
                          <td>Workplace Registration Email</td>
                          <td>{{$contact->email_workplace}}</td>
                        </tr>  
                        <tr>
                          <td>Organization Fax</td>
                          <td>{{$contact->fax}}</td>
                        </tr>   
                        <tr>
                          <td>Organization Region</td>
                          <td>{{$contact->region}}</td>
                        </tr>                    
                    </tbody>
                  </table>
          @endif
    </div><!-- /.box-body -->

  </div><!-- /.box -->















@stop
@section('js')

    <script src="{{asset('admin/ajremove.js')}}"></script>

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