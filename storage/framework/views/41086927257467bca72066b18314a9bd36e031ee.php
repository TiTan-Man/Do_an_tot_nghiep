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
							<?php echo $__env->make('frontend.element.menuleft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-12 center-column " id="content">
										<div id="mfilter-content-container">
											<div class="posts ">
												<h1 class="title_cat"><span><?php echo e($page_title); ?></span></h1>
											</div>
											<div class="product-grid active">
												<div class="row">
													
													<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php
													$title = $item->title;
													$mota = $item->mota ?? $item->mota;
													$image = $item->image ?? ($item->image ?? null);
													// Viet ham xu ly lay alias bai viet
													$url_link = route('frontend.cms.product', ['alias_detail'=>$item->alias]) . '.html';
												  ?>
													<div class="block col-sm-3 col-xs-6 col-mobile-12  ">
														<!-- Product -->
														<div id="idpr_<?php echo e($item->id); ?>" class="product product_wg clearfix product-hover">
															<div class="left">
																<div class="image ">
																	<a class="sss" href="<?php echo e($url_link); ?>" title="<?php echo e($title); ?>">
																		<img src="<?php echo e($image); ?>" title="<?php echo e($title); ?>" alt="<?php echo e($title); ?>" class="">
																	</a>
																</div>
															</div>
															<div class="right">
																<div class="name" style="height: 32px;">
																	<div class="label-discount green saleclear"></div>
																	<a href="<?php echo e($url_link); ?>" title="<?php echo e($title); ?>"><?php echo e(Str::limit($title, 30)); ?></a>
																</div>
															</div>
														</div>
													</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>
											</div>
											<?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/pages/product/category.blade.php ENDPATH**/ ?>