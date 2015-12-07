@extends ('layouts.site.templates.pages')
 
  @section('bread')
    <li  class="active">{{ label('lbl_posts') }}</li>
  @stop

  @section('content')
    <h1>{{ label('lbl_posts') }}</h1>

    <ul class="news-home-page" id="news-page">
      @foreach($posts as $p)
        
        <li>
          <a href="{{ URL::route('posts.show', $p->slug) }}" >
            <h4>{{ $p->{label('title')} }}</h4>
          </a>
           <p>{{ $p->{label('summary')} }}</p>
        </li>
     
      @endforeach
    </ul>


    <nav>
      {{ $posts->links() }}
    </nav>
  
  @stop


