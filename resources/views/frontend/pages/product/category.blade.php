@extends('frontend.layouts.default')

@php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$title = $taxonomy->title ?? ($taxonomy->title ?? null);
$image = $taxonomy->image ?? null;
$seo_title = $taxonomy->meta_title ?? $title;
$seo_keyword = $taxonomy->meta_keyword ?? null;
$seo_description = $taxonomy->meta_description ?? null;
$seo_image = $image ?? null;
$taxonomy_id = $taxonomy->id ?? null;
$listSearch = App\Http\Services\ContentService::getSearch(['status'=>'true'])->get();
$searchDetail = App\Http\Services\ContentService::getSearchDetail(['status'=>'true'])->get();
@endphp

@section('content')
<style>
	.list-group.panelvmenu { max-height: 650px!important;}
	.padding-left-0{ padding-left: 0;}
	.phantrang{text-align: center}
</style>
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
							<div class="col-md-3 hidden-xs hidden-sm" id="column_left">
								<div class="hst fadeIn">
									<section class="box-category">
										<div class="heading">
											<span>Danh mục</span>
										</div>
										<div class="list-group panelvmenu">
											<?php foreach($taxonomy_all as $taxonomy){
												$hienthi = trim($taxonomy->hienthi,';');
												$vitrihienthi = explode(';',$hienthi); // chuyển về mảng
												if(in_array(1,$vitrihienthi)){?>
												<a href="/{{ $taxonomy->taxonomy }}/{{ $taxonomy->url_part }}.html" class="list-group-item-vmenu" title="{{ $taxonomy->title }}" >{{ $taxonomy->title }}</a>
											<?php } } ?>
										</div>
									</section>
									
								</div>
								
								<div class="panel-group" id="accordion">
									
									<div class="panel panel-default">
										<div class="panel-heading">
										  <h4 class="panel-title">
											Mức giá
										  </h4>
										</div>
										<div >
										  	<div class="panel-body">
												<form action="{{ route('products.filter') }}" method="GET">
													<div style="margin-bottom:20px">
														<input type="hidden" name="category" value="{{ $taxonomy_id }}" id="category">
														<label for="min_price">Giá nhỏ nhất:</label>
														<select name="min_price" id="min_price">
															<option value="0">0</option>
															<option value="100000">100.000đ</option>
															<option value="300000">300.000đ</option>
															<option value="500000">500.000đ</option>														
															<!-- Thêm các option khác tùy theo nhu cầu của bạn -->
														</select>	
													</div>
													<div style="margin-bottom:20px">
														<label for="max_price">Giá lớn nhất:</label>
														<select name="max_price" id="max_price">
															<option value="100000">100.000đ</option>
															<option value="300000">300.000đ</option>
															<option value="500000">500.000đ</option>	
															<option value="1000000">1.000.000đ</option>
															<!-- Thêm các option khác tùy theo nhu cầu của bạn -->
														</select>	
													</div>
													
												
													<button type="submit">Filter</button>
												</form>
																							
										  	</div>
										</div>
									</div>
									
								</div>
								
							</div>
							<div class="col-md-9 padding-left-0">
								
								<div class="box-content products">
									<div class="box-product">
										<div id="myCarousel30733470">
											<!-- Carousel items -->
											<div class="carousel-inner">
												<div class="active item">
													<div class="product-grid">
														<div class="row">
															<?php foreach($posts as $spnoibat){ 
															$url_link = route('frontend.cms.product', ['alias_detail'=>$spnoibat->alias]) . '.html';
															?>
															<div class="block col-sm-3 col-xs-6 col-mobile-12  ">
																<!-- Product -->
																<div id="idpr_5" class="product product_wg clearfix product-hover">
																	<div class="left">
																		<div class="image ">
																			<a class="sss" href="{{ $url_link }}" title="Blackmores 1-900G">
																				<img src="{{ $spnoibat->image }}" title="{{ $spnoibat->title }}" alt="{{ $spnoibat->title }}" class="">
																			</a>
																		</div>
																	</div>
																	<div class="right">
																		<div class="name product-name" style="height: 48px;">
																			<div class="label-discount green saleclear"></div>
																			<a href="{{ $url_link }}" title="{{ $spnoibat->title }}">{{ $spnoibat->title }}</a>
																		</div>
																		<p style="width: 100%;">
																			<?php if($spnoibat->giakm > 0){ ?>
																			<span class="product-price"><?php echo number_format($spnoibat->giakm, 0, ',', '.'); ?> </span>
																			<span class="money">đ</span>
																			<?php }else{ ?>
																			<span class="product-price"> Liên hệ </span>
																			<?php } ?>
																			<?php if($spnoibat->gia > 0){ ?>
																			<span class="product-price-km"><?php echo number_format($spnoibat->gia, 0, ',', '.'); ?> </span>
																			<span class="money">đ</span>
																			<?php } ?>
																		</p>
																		
																		<div class="shopping-cart" style="width: 20%; float: left; " onclick="addToCart({{ $spnoibat->id }})">
																			
																		</div>
																		
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
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="phantrang">
									{{ $posts->withQueryString()->links('frontend.pagination.default') }}
								</div>
								
								<div class="content-category">
								{!! $taxonomy->content !!}
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
	<style>
		.panel-body{}
	</style>
@endsection
