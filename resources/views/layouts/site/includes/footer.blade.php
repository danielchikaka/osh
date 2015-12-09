<div id="complaints-report">

<div class="report-title">
       <!-- <img src="images/usalama-sw.png" alt="">  image available in images folder for swahili version-->

       @if(Session::get('locale')=='en')
           <img src="{{asset('site/images/usalama-en.png')}}" alt="">
        @else
           <img src="{{asset('site/images/usalama-sw.png')}}" alt="">
        @endif

       

       <h4  class="h3"> {{trans('messages.lbl_having_complaints_alfa')}}<br>  {{trans('messages.lbl_having_complaints_omega')}}</h4>

       <i class="icon icon-angle-right"></i>
       
</div><!--/report-title-->

<div class="report-button">
       <a href="{{URL::route('complaints.index')}}" class="btn btn-primary  btn-report">{{trans('messages.lbl_having_complaints_btn')}}</a>
</div><!--/report-button-->



  
</div><!--/complaints-report-->



<section id="min-footer-wrapper">

    <div id="about-us">

    <?php $contact = App\Models\Contact::first();  ?>
      <p>
    @if($contact)
      {{$contact->{trans('messages.org_name')} }}, <br>
      {{$contact->{trans('messages.physical')} }}, <br>
      {{$contact->{trans('messages.box_no')} }}, <br>
      {{$contact->region}} <br>
      {{trans('messages.lbl_fax')}} : {{$contact->fax}} <br>
      {{trans('messages.lbl_phone')}} : {{ $contact->phone_no }}  <br>
    @endif
    </p>
    </div><!--/about-us-->

    <div id="related-links">
        <h4>{{trans('messages.lbl_related')}}</h4>
        <ul>
          @foreach(App\Models\RelatedLink::latest() as $rel)
            <li><a href="{{$rel->url}}"  target="_blank">{{$rel->{trans('messages.title')} }}</a></li>
          @endforeach
        </ul>
    </div> <!--/related-links-->



        <div id="social-media">
        <h4>{{trans('messages.lbl_social_media_title')}}</h4>
        <?php $socials = json_decode(File::get(app_path().'/'.'socials.json'));  ?>
        <ul>
          <li><a href="{{url($socials->facebook)}}"><i class="icon-facebook"></i></a></li>
          <li><a href="{{$socials->twitter}}"><i class="icon-twitter"></i></a></li>
          <li><a href="{{$socials->youtube}}"><i class="icon-youtube"></i></a></li>
        </ul>
         
    </div> <!--/social-media-->
</section>



</div> <!--/wrap-->

<section id="main-footer-wrapper">
        <div id="copy">
          <p>&copy;  2015  <a href=".">OSHA</a>. {{ (Session::get('locale')=='en')?'All Rights Reserved.':'Haki zote zimehifadhiwa.'}}</p>
        </div><!--/copy-->


        <div id="developer">
              <ul>
                <li><a href="{{URL::route('disclamers.index')}}">Disclamer</a></li>
                <li><a href="{{URL::route('privaces.index')}}">Privacy and Policy</a></li>
                <li><a href="{{URL::route('faqs.index')}}">{{trans('messages.lbl_faq_short')}}</a></li>

              </ul>
        </div>
</section>

  </div><!--/container-->



<script src="{{ asset('site/bower_components/jquery-legacy/jquery.min.js')}}"></script>
<script src="{{ asset('site/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js')}}"></script>
<script src="{{ asset('site/bower_components/smartmenus/src/jquery.smartmenus.js')}}"></script>
<script src="{{ asset('site/bower_components/smartmenus/src/addons/bootstrap/jquery.smartmenus.bootstrap.js')}}"></script>
<script src="{{ asset('site/bower_components/flexslider/jquery.flexslider-min.js')}}"></script>
<script src="{{ asset('site/bower_components/matchHeight/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{ asset('site/bower_components/jquery-placeholder/jquery.placeholder.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('site/bower_components/lightbox2/dist/js/lightbox.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('site/bower_components/jquery-cycle2/build/jquery.cycle2.min.js')}}"></script>
<script src="{{ asset('site/bower_components/jquery-cycle2/build/plugin/jquery.cycle2.caption2.min.js')}}"></script>
<script src="{{ asset('site/bower_components/jquery-cycle2/src/jquery.cycle2.carousel.js')}}"></script>
<script src="{{ asset('site/bower_components/mediaelement/build/mediaelement-and-player.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('site/bower_components/jquery_lazyload/jquery.lazyload.js')}}" type="text/javascript"></script>

<script src="{{ asset('site/js/custom.js')}}"></script>

  
</body>
</html>
