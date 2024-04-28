<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn" class="responsive">
<head>
	<?php
    $seo_title = $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''));
    $seo_keyword = $seo_keyword ?? ($page->keyword ?? ($web_information->information->seo_keyword ?? ''));
    $seo_description = $seo_description ?? ($page->description ?? ($web_information->information->seo_description ?? ''));
    $seo_image = $seo_image ?? ($page->json_params->og_image ?? ($web_information->image->seo_og_image ?? ''));
	?>
	<title><?php echo e($seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''))); ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow" />
	<meta http-equiv="Content-Language" content="vi" />
	<meta name="copyright" content="Copyright" />
	<meta name="description" content="<?php echo e($seo_description); ?>" />
	<meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
	<meta name="DC.title" content="<?php echo e($seo_title); ?>" />
	<meta property="og:type" name="ogtype" content="Website" />
	<meta property="og:title" name="ogtitle" content="<?php echo e($seo_title); ?>" />
	<meta property="og:description" name="ogdescription" content="<?php echo e($seo_description); ?>" />
	<meta property="og:image" name="ogimage" content="<?php echo e($seo_image); ?>" />
	<meta property="og:sitename" content="<?php echo e(Request::fullUrl()); ?>" />
	<link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>" />
	<link rel="shortcut icon" type="image/png" href="<?php echo e($web_information->image->favicon ?? ''); ?>" />
	
	<link href="//fonts.googleapis.com/css?family=Open+Sans:800,700,600,500,400,300" rel="stylesheet" type="text/css" />
	
    <script type="text/javascript">
        var responsive_design = 'yes';
    </script>
	
	<?php echo $web_information->source_code->css; ?>

	
	<?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<?php echo $__env->yieldPushContent('style'); ?>
</head>
<body class="common-home">
    <div class="standard-body">
        <div id="main" class=" header-type-2">
			<?php echo $__env->make('frontend.element.menumain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			<?php echo $__env->yieldContent('content'); ?>	
			
			<?php echo $__env->make('frontend.element.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
			<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/megamenu.js')); ?>"></script>
        </div>
        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
    </div>
	<?php echo $web_information->source_code->javascript; ?>

</body>
</html>









<?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/layouts/default.blade.php ENDPATH**/ ?>