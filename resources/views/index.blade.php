@include('layouts.site.includes.head')

<section id="slider-wrapper">


    <div class="cycle-slideshow  " 
        data-cycle-fx="fade" 
        data-cycle-timeout="7000" 
        data-cycle-caption-plugin="caption2" 
        data-cycle-carousel-visible="1" 
         data-cycle-pager="#pager" 
           data-cycle-pause-on-hover="true"
        data-cycle-carousel-fluid="true" >
                        
            <!-- <div class="cycle-pager"></div> -->
      <div class="cycle-overlay"></div>

          <div class="cycle-prev"><i class="icon-slider icon-angle-left"></i></div>
    <div class="cycle-next"><i class="icon-slider icon-angle-right"></i></div>

      @foreach($images as $image)
      <img   class="lazy"  height="450px" data-original="{{URL::to($image->imageURL())}}" data-cycle-desc="{{ $image->{trans('messages.title')} }}">
      @endforeach
  </div><!--/cycle-slideshow-->



</section>



<div class="bio-profile  "> 
	<div id="the-bio" >
	        <img  class="lazy" data-original="{{URL::to($bio->photo_url)}}">

	        <p>{{$bio->fullname}}</p>
	        <p><strong>{{$bio->{trans('messages.title')}  }}</strong></p>
	        <p><a href="{{URL::route('biographies.show',$bio->slug)}}">{{trans('messages.lbl_bio')}}</a></p>
			
	</div>
</div> <!--/bio-profile-->

<div id="home-sep"></div>




<div class="home-news  ">
<h1 class="h2">{{trans('messages.lbl_latest_news')}}</h1>
<hr>
     <ul>
      @foreach($news as $data)
       <li>
           <a href="{{URL::route('news.show',$data->slug)}}">
               <img  class="lazy" data-original="{{URL::to($data->imageURL('small'))}}">
               </a>
                 <h2 class="h4">{{$data->{trans('messages.title')} }}</h2>
               <span> {{date('d, F, Y',strtotime($data->created_at))}}</span>
               <p>{{str_limit($data->{trans('messages.summary')}, $limit = 145, $end = '...')  }}<a href="{{URL::route('news.show',$data->slug)}}"> {{trans('messages.lbl_read_more')}}</a></p>
               
       </li>
       @endforeach

     </ul>
   
</div><!--/home-news-->


<div class="home-time-table  ">

       <ol  class="custom-counter">
       <h1 class="h2">{{trans('messages.lbl_training_timetable')}}</h1>
       @foreach($trainings as $training)
         <li>
               <h4  ><a href="{{URL::route('trainings.show',$training->slug)}}">{{$training->{trans('messages.title')} }}</a></h4>
               <span class="pull-left">{{trans('messages.lbl_start')}}: {{ date('M d , Y', strtotime($training->created_at)) }}</span>


         </li>
      @endforeach

         
                <div class="text-center">
              <a href="{{URL::route('trainings.index')}}" class="btn btn-default">{{trans('messages.lbl_more_trainings')}}</a>
       </div>
         
     

       </ol>

       
       
       <div class="home-register-workplace">
      <a href="{{URL::route('workplaces.index')}}" class="btn btn-primary  btn-report">{{ (Session::get('locale')=='en')?'register workplace':'sajili ofisi'}}</a>
</div><!-- /home-register-workplace-->

</div><!--/home-time-table-->



<div class="home-mini-sidebar">
        <h3 class="h3">{{ (Session::get('locale')=='en')?'Recent Documents':'Machapisho Mapya'}}</h3>
<hr>

        <ul  class="home-docs">
          @foreach($pubs as $pub)
            <li><a href="{{URL::to($pub->{trans('messages.file')} )}}">{{$pub->{trans('messages.title')}  }}</a></li>
          @endforeach

        </ul>
        <h3 class="h3">{{trans('messages.lbl_quick')}}</h3>
<hr>

        <ul>
        @foreach(App\Models\QuickLink::latest(6) as $q)
          <li><a href="{{$q->url}}">{{$q->{trans('messages.title')} }}</a></li>
        @endforeach
        </ul>
</div><!--/home-min-sidebar-->


<div style="clear: both"></div>

@include('layouts.site.includes.footer')


