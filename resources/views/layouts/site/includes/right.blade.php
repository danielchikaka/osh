            <div id="sidebar" class="div-right-sidebar-stablelizer">
                    <h3>{{trans('messages.lbl_latest_news')}}</h3>
                    <ul class="sidebar-news">
                      @foreach(App\Models\News::latest() as $d)
                          <li><a href="{{URL::route('news.show',$d->slug)}}"> 
                             <img width='90' height='70' src="{{URL::to($d->imageURL('small'))}}" alt="">
                                <h5>{{  $d->{trans('messages.title')} }}</h5>

                          </a></li>
                      @endforeach
                    </ul>
                    <br>
                   <h3>{{trans('messages.lbl_quick')}}</h3>
                    <ul class="lists">
                        @foreach(App\Models\QuickLink::latest() as $q)
                           <li><a href="{{URL::to($q->url)}}"><i class="icon-square"></i>{{$q->{trans('messages.title')} }}</a></li>
                        @endforeach

                    </ul>
                    
    
                    
                  </div><!-- /sidebar-->