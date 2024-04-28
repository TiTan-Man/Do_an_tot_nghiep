<?php
$page_title = $taxonomy->title;
$title = $taxonomy->title;
$image = $taxonomy->image;
$seo_title = $title;
$seo_keyword = $taxonomy->seo_keyword;
$seo_description = $taxonomy->seo_description;
$seo_image = $image ?? null;

$url_category = '/'.$taxonomy->taxonomy.'/'.$taxonomy->url_part.'.html';

?>

<?php $__env->startSection('content'); ?>
  
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
								<a itemprop="url" href="<?php echo e($url_category); ?>" title="<?php echo e($title); ?>"><?php echo e($title); ?></a>
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
					<?php echo $__env->make('frontend.element.menuleft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12 center-column " id="content">
								<div class="posts ">
									<h1 class="title_cat"><span><?php echo e($title); ?></span></h1>
								</div>
								<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
								  $title = $item->title;
								  $brief = $item->brief;
								  $image = $item->image;
								  $date = date('H:i d/m/Y', strtotime($item->created_at));
								  // Viet ham xu ly lay alias bai viet
								  $alias_category = Str::slug($item->taxonomy_title);
								  $url_link = route('frontend.cms.post', ['alias_detail' => $item->url_part]) . '.html';
							   ?>
								<div class="post-content">
									<div class="post_box row">
										<div class="col-xs-12 col-sm-4">
											<a href="<?php echo e($url_link); ?>" class="title" title="<?php echo e($title); ?>">
												<img alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" src="<?php echo e($image); ?>">
											</a>
										</div>
										<div class="col-xs-12 col-sm-8">
											<h2 class="post-title">
												<a href="<?php echo e($url_link); ?>" class="title" title="<?php echo e($title); ?>"><?php echo e($title); ?></a>
											</h2>
											<div class="post-description">
												<?php echo e($brief); ?>

											</div>
											<a href="<?php echo e($url_link); ?>" title="<?php echo e($title); ?>" class=" more">Xem tiếp </a>
										</div>
										<div class="line_n"><span></span></div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/pages/post/category.blade.php ENDPATH**/ ?>