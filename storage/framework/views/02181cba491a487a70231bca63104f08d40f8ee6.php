<?php
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

?>

<?php $__env->startSection('content'); ?>



<?php if(session('successMessage')): ?>
<div id="snackbar"><?php echo e(session('successMessage')); ?></div>
<script>
    $(document).ready(function() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    });
</script>
<?php endif; ?>

<div class="breadcrumb full-width">
    <div class="background-breadcrumb"></div>
    <div class="background">
        <div class="shadow"></div>
        <div class="pattern">
            <div class="container">
                <div class="clearfix">
                    <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <li class="item"><a itemprop="url" title="Trang chủ" href="<?php echo e(route('frontend.home')); ?>"><span itemprop="title">Trang chủ</span></a></li>
						<li class="item"><span itemprop="title"><a itemprop="url" href="<?php echo e($url_link_category); ?>" title="<?php echo e($taxonomy_title); ?>"><?php echo e($taxonomy_title); ?></a></span></li>
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
				
					<?php echo $__env->make('frontend.element.menuleft2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12 center-column " id="content">
								<div class="post">
									<div class="post-entry">
										<h1 class="post-title"><?php echo e($title_detail); ?></h1>
										<div class="post-content">
											<?php echo $content; ?>

										</div>
									</div>
								</div>
								<section class="news clearfix" id="news">
									<div class="itemnews">
										<h2><span>Tin tức liên quan</span>
										</h2>
										<nav class="listnew">
											<ul>
												<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php
												  $title = $item->title;
												  $url_link = route('frontend.cms.post', ['alias_detail' => $item->url_part]) . '.html';
												  ?>
												<li>
													<a class="nw_other" href="<?php echo e($url_link); ?>" title="<?php echo e($title); ?>"><?php echo e($title); ?></a>
												</li>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/pages/post/detail.blade.php ENDPATH**/ ?>