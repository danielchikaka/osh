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
      <li class="active">Contact</li>
    </ol>
  </section>

@stop

@section('content')




  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Contacts Details</h3>
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
                          <td>Organization Fax</td>
                          <td>{{$contact->fax}}</td>
                        </tr>   
                        <tr>
                          <td>Organization Region</td>
                          <td>{{$contact->fax}}</td>
                        </tr>                    
                    </tbody>
                  </table>
          @endif
    </div><!-- /.box-body -->

  </div><!-- /.box -->















@stop
@section('js')

@stop