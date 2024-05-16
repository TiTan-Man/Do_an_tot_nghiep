@extends('frontend.layouts.default')
@php
$page_title = $taxonomy->title;
$title = $taxonomy->title;
$image = $taxonomy->image;
$seo_title = $title;
$seo_keyword = $taxonomy->seo_keyword;
$seo_description = $taxonomy->seo_description;
$seo_image = $image ?? null;

$url_category = '/'.$taxonomy->taxonomy.'/'.$taxonomy->url_part.'.html';

@endphp

@section('content')
  
<div class="breadcrumb full-width">
    <div class="background-breadcrumb"></div>
    <div class="background">
        <div class="shadow"></div>
        <div class="pattern">
            <div class="container">
                <div class="clearfix">
                    <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <li class="item">
							<a itemprop="url" title="Trang chủ" href="/"><span itemprop="title">Trang chủ</span></a>
						</li>
						<li class="item">
							<span itemprop="title">
								<a itemprop="url" href="{{ $url_category }}" title="{{ $title }}">{{ $title }}</a>
							</span>
						</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content full-width inner-page">
    <div class="background">
        <div class="pattern">
            <div class="container">
                <div class="row">
					@include('frontend.element.menuleft2')
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12 center-column " id="content">
								<div class="posts ">
									<h1 class="title_cat"><span>{{ $title }}</span></h1>
								</div>
								@foreach ($posts as $item)
								@php
								  $title = $item->title;
								  $brief = $item->brief;
								  $image = $item->image;
								  $date = date('H:i d/m/Y', strtotime($item->created_at));
								  // Viet ham xu ly lay alias bai viet
								  $alias_category = Str::slug($item->taxonomy_title);
								  $url_link = route('frontend.cms.post', ['alias_detail' => $item->url_part]) . '.html';
							   @endphp
								<div class="post-content">
									<div class="post_box row">
										<div class="col-xs-12 col-sm-4">
											<a href="{{ $url_link }}" class="title" title="{{ $title }}">
												<img alt="{{ $title }}" title="{{ $title }}" src="{{ $image }}">
											</a>
										</div>
										<div class="col-xs-12 col-sm-8">
											<h2 class="post-title">
												<a href="{{ $url_link }}" class="title" title="{{ $title }}">{{ $title }}</a>
											</h2>
											<div class="post-description">
												{{ $brief }}
											</div>
											<a href="{{ $url_link }}" title="{{ $title }}" class=" more">Xem tiếp </a>
										</div>
										<div class="line_n"><span></span></div>
									</div>
								</div>
								@endforeach
							</div>
							<ul class="pagination">
								<p class="d_page">
								</p>
							</ul>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
