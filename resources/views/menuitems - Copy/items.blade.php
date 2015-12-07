
<div class="row linkable">
<div class="col-md-4">
<div class="box">
                <div class="box-header with-border">
                </div><!-- /.box-header -->
                <div class="box-body">
                    @foreach($pages_categories as $category)
                        <li>{{$category->title_en}}</li>
                        <ul>
                        @foreach($category->pages as $page)
                            <li><a href="{{URL::route('pages.show',$page->slug)}}">{{$page->title_en}}</a></li>
                          
                        @endforeach
                        </ul>
    
                    @endforeach
                </div><!-- /.box-body -->

</div>

</div>
<div class="col-md-4">
<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">PUblications Types</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @foreach($publication_categories as $category)
            
                            <li><a href="{{URL::route('publications-categories.show',$category->slug)}}">{{$category->title_en}}</a></li>
    
                    @endforeach
                </div><!-- /.box-body -->

</div>

</div>
</div>

<div class="row linkable">
<div class="col-md-4">
<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Modules</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <ul>
                    @foreach($modules as $module)
                        <li><a href="{{URL::route($module.'.index')}}">{{$module}}</a></li>
                    @endforeach
                </ul>
                </div><!-- /.box-body -->

</div>

</div>

</div>


  



