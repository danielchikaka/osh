<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <title>OSHA | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('admin/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">

    @yield('css')

<style type="text/css">
    .error{
      color:red;
    }
    .green{
      color:green;
    }
    .grey{
      color: grey;
    }

</style>

    <!-- Summernote -->
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote.css')}}">    
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">



   <link rel="stylesheet" href="{{asset('admin/dist/css/master-overrider.css')}}">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="asset('admin/html5shiv.min.js')}}"></script>
        <script src="asset('admin/respond.min.js')}}"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini no-js  menu-max-depth-1 nav-menus-php">
    <div class="wrapper">


      <header class="main-header">
        <!-- Logo -->
        <a href="." class="logo"  target="_blank">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>OSHA</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>OSHA</b>CMS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
           
          </div>
              <div class="info  admin-badge">
              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                @if (Auth::guest())

          @else

                        <a href="{{ url('/auth/logout') }}" class="red"><i class="fa fa-power-off text-failed"></i> Logout ({{Auth::user()->name}})</a>
          @endif
  
            </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-files-o"></i>
                <span>Content</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::route('faqs.admin')}}"><i class="fa fa-circle-o"></i>FAQs</a></li>
                <li><a href="{{URL::route('vacancies.admin')}}"><i class="fa fa-circle-o"></i>Vacancies</a></li>
                <li><a href="{{URL::route('trainings.admin')}}"><i class="fa fa-circle-o"></i>Trainings</a></li>
                <li><a href="{{URL::route('tenders.admin')}}"><i class="fa fa-circle-o"></i>Tenders</a></li>
                <li><a href="{{URL::route('pressreleases.admin')}}"><i class="fa fa-circle-o"></i>Press Releases</a></li>
                <li><a href="{{URL::route('workplaces.admin')}}"><i class="fa fa-circle-o"></i>Register Workplace</a></li>
                <li><a href="{{URL::route('privacies.admin')}}"><i class="fa fa-circle-o"></i>Privacy Policy</a></li>
                <li><a href="{{URL::route('disclamers.admin')}}"><i class="fa fa-circle-o"></i>Disclamer</a></li>
                <li><a href="{{URL::route('biographies.admin')}}"><i class="fa fa-circle-o"></i>Biography</a></li>
                <li><a href="{{URL::route('contact.index')}}"><i class="fa fa-circle-o"></i>Contacts</a></li>
                <li><a href="{{URL::route('socials.index')}}"><i class="fa fa-circle-o"></i>Social Media</a></li>
              </ul>
            </li>            

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Publications</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::route('publications-categories.admin')}}"><i class="fa fa-circle-o"></i>Publications Categories</a></li>
                <li><a href="{{URL::route('publications.admin')}}"><i class="fa fa-circle-o"></i>Publications</a></li>
       
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Pages</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::route('categories.admin')}}"><i class="fa fa-circle-o"></i>Pages Categories</a></li>
                <li><a href="{{URL::route('pages.index')}}"><i class="fa fa-circle-o"></i>Pages</a></li>
       
              </ul>
            </li>


            <li>
              <a href="{{URL::route('news.admin')}}">
                <i class="fa fa-th"></i> <span>News</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Media</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::route('galleries.admin')}}"><i class="fa fa-circle-o"></i>Gallery</a></li>
                <li><a href="{{URL::route('media.admin')}}"><i class="fa fa-circle-o"></i>Photos</a></li>
                <li><a href="{{URL::route('videos.admin')}}"><i class="fa fa-circle-o"></i>Videos</a></li>
              </ul>
            </li>

            
            <li>
              <a href="{{URL::route('menuitems.index')}}">
                <i class="fa fa-table"></i> <span>Menu</span>
              </a>
            </li>            
            <li>
              <a href="{{URL::route('quicklinks.admin')}}">
                <i class="fa fa-fw fa-link"></i> <span>Quick Links</span>
              </a>
            </li>            
            <li>
              <a href="{{URL::route('relatedlinks.admin')}}">
                <i class="fa fa-fw fa-link"></i> <span>Related Links</span>
              </a>
            </li>            
 
<!-- 

            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">Settings</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    
    
        <!-- Content Header (Page header) -->
        @yield('page_header')


        <!-- Main content -->
        <section class="content">

        @yield('content')

        </section><!-- /.content -->
    
    
    
    
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
         
        </div>
        <strong>Copyright &copy;  <?php echo date('Y'); ?> <a href=".">OSHA</a>.</strong> All rights reserved.
      </footer>


    </div><!-- ./wrapper -->






    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('js')
    <!-- daterangepicker -->
    <script src="{{ asset('admin/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/app.min.js') }}"></script>

  </body>
</html>
