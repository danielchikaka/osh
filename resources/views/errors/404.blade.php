 @extends('layouts.site.right-sidebar')
     
        
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>    
    {{ (Session::get('locale')=='en')?'404 Error!':'Kosa namba 404!'}}       
           </h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')

   <h1 class="text-center" style="font-size: 50px">Ooops!</h1>
     <p style="font-size: 24px; padding: 0 180px; text-align: center;">  {{ (Session::get('locale')=='en')?'We cannot find what you are looking for. Please Try again':'Unachokitafuta tumekikosa, tafadhali jaribu tena'}}   </p>

@stop
     
