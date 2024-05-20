@extends('frontend.layouts.default')

@php
$page_title = 'Tìm kiếm sản phẩm';
$title = 'Tìm thấy '.count($posts).' kết quả';
$image = '';

@endphp

@section('content')
  
	<section id="content">

		<div class="breadcrumb full-width">
			<div class="background-breadcrumb"></div>
			<div class="background">
				<div class="shadow"></div>
				<div class="pattern">
					<div class="container">
						<div class="clearfix">
							<ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							   <li class="item"><a itemprop="url" title="Trang chủ" href="{{ route('frontend.home') }}">
							   <span itemprop="title">Trang chủ</span></a></li>
							   <li class="item" itemprop="title"><a itemprop="url">{{ $page_title }}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="main-content full-width inner-page">
			<div class="background-content"></div>
			<div class="background">
				<div class="shadow"></div>
				<div class="pattern">
					<div class="container">
						<div class="row">
							@include('frontend.element.menuleft')
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-12 center-column " id="content">
										<div id="mfilter-content-container">
											<div class="posts ">
												<h1 class="title_cat"><span>{{ $title }}</span></h1>
											</div>
											<div class="product-grid active">
												<div class="row">
													
													@foreach ($posts as $item)
													@php
													$title = $item->title;
													$mota = $item->mota ?? $item->mota;
													$image = $item->image ?? ($item->image ?? null);
													// Viet ham xu ly lay alias bai viet
													$url_link = route('frontend.cms.product', ['alias_detail'=>$item->alias]) . '.html';
													@endphp
													<div class="block col-sm-3 col-xs-6 col-mobile-12  ">
														<!-- Product -->
														<div id="idpr_{{ $item->id }}" class="product product_wg clearfix product-hover">
															<div class="left">
																<div class="image ">
																	<a class="sss" href="{{ $url_link }}" title="{{ $title }}">
																		<img src="{{ $image }}" title="{{ $title }}" alt="{{ $title }}" class="">
																	</a>
																</div>
															</div>
															
															<div class="right">
																<div class="name product-name" style="height: 48px;">
																	<div class="label-discount green saleclear"></div>
																	<a href="{{ $url_link }}" title="{{ $item->title }}">{{ $item->title }}</a>
																</div>
																<p style="width: 100%;">
																	<?php if($item->giakm > 0){ ?>
																	<span class="product-price"><?php echo number_format($item->giakm, 0, ',', '.'); ?> </span>
																	<span class="money">đ</span>
																	<?php }else{ ?>
																	<span class="product-price"> Liên hệ </span>
																	<?php } ?>
																	<?php if($item->gia > 0){ ?>
																	<span class="product-price-km"><?php echo number_format($item->gia, 0, ',', '.'); ?> </span>
																	<span class="money">đ</span>
																	<?php } ?>
																</p>
																
																
																
																<div class="edu-rating rating-default" style="width: 100%; float: left; ">
																	<div class="eduvibe-course-review-wrapper">
																		<div class="review-stars-rated" title="5 out of 5 stars">
																			<div class="review-star">
																				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
																					<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
																				</svg>
																				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
																					<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
																				</svg>
																				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
																					<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
																				</svg>
																				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
																					<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
																				</svg>
																				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
																					<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
																				</svg>
																			</div>
											
																		</div>
																		
																	</div>
																</div>
																
															</div>
														</div>
														
													</div>
													@endforeach
												</div>
											</div>
											{{ $posts->withQueryString()->links('frontend.pagination.default') }}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
@endsection
