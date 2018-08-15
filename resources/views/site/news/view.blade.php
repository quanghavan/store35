@extends('site.layout')
	@section('content')
	<section class="blog_post">
    <div class="container">
      	<div class="row">
        <div class="col-xs-12 col-sm-9">
          	<div class="entry-detail">
                <div class="entry-photo">
              		<figure><img src="{{ url(config('app.newsUrl')) }}/{{ $news->avatar }}" alt="Tin"></figure>
            	</div>
            	<div class="entry-meta-data"> 
	            	<div class="blog-top-desc">
	                    <div class="blog-date">{{ $news->created_at }}</div>
	                    <h1>{{ $news->title }}</h1>
	                    <div class="jtv-entry-meta"> 
	                    	<i class="fa fa-user-o"></i> <strong>{{ __('Admin') }}</strong>
	                    </div>
	                </div>
            	</div>
	            <div class="content-text clearfix">
	            	{!! $news->content !!}
	            </div>
	        </div>
        </div>
        <!-- right colunm -->
        <aside class="sidebar col-xs-12 col-sm-3">
			<div class="search">
				{!! Form::open(['route' => 'site.news.search', 'method' => 'get', 'class' => 'form']) !!}
					{!! Form::search('key', null, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
					<button type="submit"><i class="fa fa-search"></i></button>
				{!! Form::close() !!}
			</div>
          <!-- Popular Posts -->
          	<div class="block blog-module">
	            <div class="block-title">
	              <h3>{{ __('Tin tức mới nhất') }}</h3>
	            </div>
	            <div class="block_content">
					<div class="layered">
						<div class="layered-content">
							<ul class="blog-list-sidebar">
								@foreach($news_new as $row)
								<li>
									<div class="post-thumb">
										<a href="{{ route('site.news.view', ['id' => $row->id]) }}">
											<img src="{{ url(config('app.newsUrl')) }}/{{ $row->avatar }}" alt="Tin">
										</a>
									</div>
									<div class="post-info">
									<h5 class="entry_title">
										<a href="{{ route('site.news.view', ['id' => $row->id]) }}">{{ $row->title }}</a>
									</h5>
									<div class="post-meta">
										<span class="date"><i class="fa fa-calendar"></i> {{ $row->created_at }}</span>
									</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
	            </div>
          	</div>
        </aside>
        <!-- ./right colunm --> 
      </div>
    </div>
  </section>
	@endsection