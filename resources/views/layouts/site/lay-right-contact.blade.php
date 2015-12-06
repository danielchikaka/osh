@include('layouts.site.includes.head')

@yield('title')
<section id="main-content-wrap">
	<div class="container">

	<div class="right-sidebar-main-content  div-right-sidebar-stablelizer  contact-page" id="main-content-inner">

	@yield('content')


	</div><!--/right-sidebar-main-content main-content-inner-->
				@include('layouts.site.includes.right')
	</div><!--/container-->
</section>
@include('layouts.site.includes.footer')