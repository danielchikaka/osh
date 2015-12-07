@extends('layouts.admin.application')

@section('content')

<div class="row">

	<div class="large-12 medium-12 small-12 columns">


	@if($news->count() != 0)

		<div class="large-12 medium-12 small-12 columns">
			<div class="page-title">
				<a href="{{ URL::route('news.create')}}"><i class="add-icon"></i></a>
				News
			</div>
		</div>

		@foreach($news as $n)

			<ul class="posts">
				<li>

					<div class="row">
						<div class="large-2 columns">
							<div class="post_meta">
								<div class="post_date">
									<span class="month">{{ date('d', strtotime($n->created_at)) }}</span><br />
									{{ date('M Y', strtotime($n->created_at)) }}<br />
								</div>
								<!-- .post_date ends -->
								{{ link_to_route('news.edit', "Edit", array($n->id)) }} |
								{{ link_to_route('news.destroy', "Delete", array($n->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'delete')) }}
								
							</div>
							<!-- .post_metaedns -->
						</div>

						<div class="large-2 columns">
							<div class="post_img">
								@if($n->thum_url)
									<img src="{{ URL::to($n->thumb_url) }}">
								@endif
							</div>
						</div>

						<div class="large-8 columns">
							<h3>{{ link_to_route('news.show', $n->title_en, array($n->slug) ) }}</h3>
							<div class="post">{{ Str::limit($n->summary_en, 160) }}</div>
						</div>
					</div>

				</li>
			</ul>
		@endforeach

		@else

			<div class="empty-content">
				<i class="fa fa-save"></i>
				<h4> <strong>No any news posted yet please click the button below to create one</strong> </h4>
				
					<a href="{{ URL::route('news.create') }}">Add New</a>
				
			</div>

		@endif


				
	</div>

</div>

{{ $news->links() }}

@stop