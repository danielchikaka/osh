<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
	 <title>Occupational Safety and Health Authority </title>
          <link rel="stylesheet" href="{{asset('site/css/master.css')}}">
          <link rel="stylesheet" href="{{asset('site/css/overrider.css')}}">
          <!--[if IE]>
          <link rel="stylesheet" href="{{asset('site/css/ie.css')}}">
        <![endif]-->

          <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

</head>
<body>
       <div class="container">

       <div id="wrap">
   

<div id="top-header">

  <div class="pull-right-link-first">


               <ul>
                      
                        <li><a href="{{URL::route('faqs.index')}}">{{trans('messages.lbl_faq_short')}}</a></li>
                        <li><a href="{{URL::route('vacancies.index')}}">{{trans('messages.lbl_vacancies')}}</a></li>
                        <li><a href="{{URL::route('workplaces.index')}}">{{ (Session::get('locale')=='en')?'Register Workplace':'Sajili Ofisi'}}</a></li>
                        <li><a href="{{URL::route('complaints.index')}}">{{ (Session::get('locale')=='en')?'Report Complaints':'Toa Malalamiko'}}</a></li>
                        <li><a href="{{URL::route('contact.contact-us')}}">{{trans('messages.lbl_contact_us')}}</a></li>
                      </ul>
           
     </div><!--/pull-right-link-first-->




     <div class="pull-right-link-last">


               <ul>

                      <li><a href="{{URL::route('change-language')}}" class="text-primary">{{ (Session::get('locale')=='en')?'KISWAHILI':'ENGLISH'}}</a></li>
              </ul>
           
     </div><!--/pull-right-link-last-->



</div>

<section   id="header" >
             <div id="logo">
                  <a href=".">
                    <img src="{{asset('site/images/coat.png')}}" alt="">
                  </a>
             </div><!--/logo-->

            <h1>
              {!! trans('messages.lbl_site') !!}

            </h1>

            <div id="presidential-logo">
                   <a href=".">
                    <img src="{{asset('site/images/logo.png')}}" alt="">
                  </a>
              
            </div>


</section>



<section >
         <div   id="main-menu">
                   <nav class="navbar navbar-default">
 <ul class="nav navbar-default navbar-nav">
            <li  ><a href="{{URL::to('/')}}"  >Home</a></li>
            {!!  App\Models\MenuItem::getMainMenu('main','_'.Session::get('locale'))  !!}
              </ul>
            </li>

          </ul>



            <form action="{{URL::route('search.search')}}" class="navbar-form navbar-right" role="search">

        <div class="form-group">
          <input type="text" name='r' class="form-control" placeholder="{{ (Session::get('locale')=='en')?'Search here...':'Tafuta hapa...'}}">
          <i class="icon icon-search"></i>
        </div>
      </form>
</nav>
 


         </div><!--/main-menu-->
</section>
