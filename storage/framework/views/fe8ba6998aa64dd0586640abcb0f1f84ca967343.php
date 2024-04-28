<?php
$title_detail = $detail->title ?? $detail->title;
$brief_detail = $detail->brief ?? null;
$content = $detail->content ?? null;
$image = $detail->image != '' ? $detail->image : null;
$image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;


// For taxonomy
$taxonomy_title = $detail->taxonomy_title ?? $detail->taxonomy_title;
$url_link_category = route('frontend.cms.post_category', ['alias' => $detail->taxonomy_url_part]) . '.html';

$seo_title = $detail->meta_title ?? $title_detail;
$seo_keyword = $detail->meta_keyword ?? null;
$seo_description = $detail->meta_description ?? $brief_detail;
$seo_image = $image ?? ($image_thumb ?? null);

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
                        <li class="item"><a itemprop="url" title="Trang chủ" href="<?php echo e(route('frontend.home')); ?>"><span itemprop="title">Trang chủ</span></a></li>
						<li class="item"><span itemprop="title"><a itemprop="url" href="#" title="<?php echo e($taxonomy_title); ?>"><?php echo e($taxonomy_title); ?></a></span></li>
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
								<div class="post">
									<div class="post-entry">
										<h1 class="post-title"><?php echo e($title_detail); ?></h1>
										<div class="post-content">
											<?php echo $content; ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/pages/post/intro.blade.php ENDPATH**/ ?>