@extends('application')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/croppic.css')}}">
    	<link rel="stylesheet" href="{!! asset('admin/menu.css') !!}" >

    <script type="text/javascript">

        var ajaxurl = '/gcm/wp-admin/admin-ajax.php';
        var menus;
            // adminpage = 'nav-menus-php';
    </script>


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
      <li class="active">Menu items List</li>
    </ol>
  </section>
@stop

@section('content')




  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Menu items</h3>
    </div>
    <div class="box-body">
    <script type="text/javascript">
        document.body.className = document.body.className.replace('no-js', 'js');
    </script>
                

                                    {!!  Form::open(array('route' => 'menuitems.ajaxupdate','method'=>'POST','role'=>'','id'=>"update-nav-menu")) !!}

                                        <div class="menu-edit ">
                                                    <ul class="menu" id="menu-to-edit">
                                                          {{App\Models\MenuItem::menuitems()}}

                                                    </ul>
                            
                         
                                            <!-- /#nav-menu-footer -->
                                        </div>
                                        <!-- /.menu-edit -->
                                        {!!Form::submit()!!}
                                    {!!Form::close()!!}                                    <!-- /#update-nav-menu -->
                                <!-- /#menu-management -->
                            <!-- /#menu-management-liquid -->
                        <!-- /#nav-menus-frame -->
                    <!-- /.wrap-->

                    <div class="clear"></div>
                <!-- wpbody-content -->
                <div class="clear"></div>
            <!-- wpbody -->
            <div class="clear"></div>
        <!-- wpcontent -->



        <div class="clear"></div>
    <!-- wpwrap -->



    </div><!-- /.box-body -->    

    <div class="box-body">
  @include('menuitems.create')
    </div><!-- /.box-body -->

  </div><!-- /.box -->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modal title</h4>

            </div>
            <div class="modal-body"><div class="te"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



  
@stop
@section('js')
    <script type="text/javascript">
        document.body.className = document.body.className.replace('no-js', 'js');
    </script>
    <script src="{{asset('admin/ajremove.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<script src="{!! asset('admin/jquery.nestable.js') !!}"></script>
	<script src="{!! asset('admin/movable_menu.js') !!}"></script>
    <script src="{{ asset('admin/menu.js') }}"></script>

  <script type="text/javascript">
      $('#myModal').on('click','.linkable a',function () {
        console.log($(this).html())
        $('.linkit').val($(this).attr('href')).removeClass('linkit');
        $('#myModal').modal('hide');
        return false;
      });

  </script>

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal',function(e){
     $(e.relatedTarget).parent().find('input').addClass('linkit');
    });
    
    $('#myModal').on('hide.bs.modal',function(){
     $('.linkit').removeClass('linkit');
    });

</script>


@stop


