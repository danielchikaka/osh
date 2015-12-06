@extends('application')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/croppic.css')}}">
    	<link rel="stylesheet" href="{!! asset('admin/movable_menu.css') !!}" >
@stop
@section('page_header')
  <!-- Content Header (Page header) -->

@stop

@section('content')




  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Menu items</h3>
    </div>
    <div class="box-body">
		    <div class="cf nestable-lists">

		        <div class="dd" id="nestable">
		            <ol class="dd-list">
						 {!! App\Models\MenuItem::recursiveMenu() !!}
		            </ol>
		        </div>

		    </div>
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
    <script src="{{asset('admin/ajremove.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<script src="{!! asset('admin/jquery.nestable.js') !!}"></script>
	<script src="{!! asset('admin/movable_menu.js') !!}"></script>
  <script type="text/javascript">
      $('#myModal').on('click','.linkable a',function () {
        $('.linkit').val($(this).attr('href'));
        $('#myModal').modal('hide');
        return false;
      });

  </script>

@stop


