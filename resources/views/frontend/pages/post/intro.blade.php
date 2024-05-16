@extends('frontend.layouts.default')

@php
$title_detail = $detail->title ?? '';
$brief_detail = $detail->brief ?? null;
$content = $detail->content ?? null;
$image = $detail->image ?? null;
$image_thumb = $detail->image_thumb ?? null;


// For taxonomy
$taxonomy_title = $detail->taxonomy_title ?? null;

$seo_title = $detail->meta_title ?? $title_detail;
$seo_keyword = $detail->meta_keyword ?? null;
$seo_description = $detail->meta_description ?? $brief_detail;
$seo_image = $image ?? ($image_thumb ?? null);

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
                        <li class="item"><a itemprop="url" title="Trang chủ" href="{{ route('frontend.home') }}"><span itemprop="title">Trang chủ</span></a></li>
						<li class="item"><span itemprop="title"><a itemprop="url" href="#" title="{{ $taxonomy_title }}">{{ $taxonomy_title }}</a></span></li>
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
				
					@include('frontend.element.menuleft')
                    
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
							</div>
						</div>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
