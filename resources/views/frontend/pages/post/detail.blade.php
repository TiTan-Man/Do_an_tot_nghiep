@extends('frontend.layouts.default')
@php
$title_detail = $detail->title;
$brief_detail = $detail->brief;
$content = $detail->content;
$image = $detail->image != '' ? $detail->image : null;

// For taxonomy
$taxonomy_title = $detail->taxonomy_title ?? $detail->taxonomy_title;

$url_link_category = route('frontend.cms.post_category', ['alias' => $detail->taxonomy_url_part]) . '.html';

$seo_title = $detail->meta_title ?? $title_detail;
$seo_keyword = $detail->meta_keyword ?? null;
$seo_description = $detail->meta_description ?? $brief_detail;
$seo_image = $image ?? ($image_thumb ?? null);
//echo "AAAAAAAAAAAA".$content;die;

@endphp

@section('content')

{{-- session('successMessage') ?? 'aaaa' --}}

@if (session('successMessage'))
<div id="snackbar">{{ session('successMessage') }}</div>
<script>
    $(document).ready(function() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    });
</script>
@endif

<div class="breadcrumb full-width">
    <div class="background-breadcrumb"></div>
    <div class="background">
        <div class="shadow"></div>
        <div class="pattern">
            <div class="container">
                <div class="clearfix">
                    <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <li class="item"><a itemprop="url" title="Trang chủ" href="{{ route('frontend.home') }}"><span itemprop="title">Trang chủ</span></a></li>
						<li class="item"><span itemprop="title"><a itemprop="url" href="{{ $url_link_category  }}" title="{{ $taxonomy_title }}">{{ $taxonomy_title }}</a></span></li>
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
								<div class="post">
									<div class="post-entry">
										<h1 class="post-title">{{ $title_detail }}</h1>
										<div class="post-content">
											{!! $content !!}
										</div>
									</div>
								</div>
								<section class="news clearfix" id="news">
									<div class="itemnews">
										<h2><span>Tin tức liên quan</span>
										</h2>
										<nav class="listnew">
											<ul>
												@foreach ($posts as $item)
												@php
												  $title = $item->title;
												  $url_link = route('frontend.cms.post', ['alias_detail' => $item->url_part]) . '.html';
												  @endphp
												<li>
													<a class="nw_other" href="{{ $url_link }}" title="{{ $title }}">{{ $title }}</a>
												</li>
												@endforeach
											</ul>
										</nav>
									</div>
								</section>
							</div>
						</div>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>

  {{-- End content --}}
@endsection
