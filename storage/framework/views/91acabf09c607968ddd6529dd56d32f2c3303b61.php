<?php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$title = $taxonomy->title ?? ($taxonomy->title ?? null);
$image = $taxonomy->image ?? null;
$seo_title = $taxonomy->meta_title ?? $title;
$seo_keyword = $taxonomy->meta_keyword ?? null;
$seo_description = $taxonomy->meta_description ?? null;
$seo_image = $image ?? null;

?>

<?php $__env->startSection('content'); ?>
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
							   <li class="item"><a itemprop="url" title="Trang chủ" href="<?php echo e(route('frontend.home')); ?>">
							   <span itemprop="title">Trang chủ</span></a></li>
							   <li class="item" itemprop="title"><a itemprop="url"><?php echo e($page_title); ?></a></li>
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
							<?php echo $__env->make('frontend.element.menuleft2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
																			<a class="sss" href="<?php echo e($url_link); ?>" title="Blackmores 1-900G">
																				<img src="<?php echo e($spnoibat->image); ?>" title="<?php echo e($spnoibat->title); ?>" alt="<?php echo e($spnoibat->title); ?>" class="">
																			</a>
																		</div>
																	</div>
																	<div class="right">
																		<div class="name product-name" style="height: 48px;">
																			<div class="label-discount green saleclear"></div>
																			<a href="<?php echo e($url_link); ?>" title="<?php echo e($spnoibat->title); ?>"><?php echo e($spnoibat->title); ?></a>
																		</div>
																		<p style="width: 100%;">
																			<?php if($spnoibat->gia > 0){ ?>
																			<span class="product-price"><?php echo number_format($spnoibat->gia, 0, ',', '.'); ?> </span>
																			<span class="money">đ</span>
																			<?php }else{ ?>
																			<span class="product-price"> Liên hệ </span>
																			<?php } ?>
																			<?php if($spnoibat->giakm > 0){ ?>
																			<span class="product-price-km"><?php echo number_format($spnoibat->giakm, 0, ',', '.'); ?> </span>
																			<span class="money">đ</span>
																			<?php } ?>
																		</p>
																		
																		<div class="shopping-cart" style="width: 20%; float: left; " onclick="addToCart(<?php echo e($spnoibat->id); ?>)">
																			<i class="fa-solid fa-shopping-cart"></i>
																		</div>
																		
																		<div class="edu-rating rating-default" style="width: 80%; float: left; ">
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
									<?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

								</div>
								
								<div class="content-category">
								<?php echo $taxonomy->content; ?>

								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u745771642/domains/bibomart.thanhphung.com/public_html/resources/views/frontend/pages/product/category.blade.php ENDPATH**/ ?>