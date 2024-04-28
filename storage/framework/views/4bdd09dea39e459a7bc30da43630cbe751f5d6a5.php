<!-- Stylesheets ============================================= -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/bootstrap.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/animate.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/stylesheet.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/menu.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/owl.carousel.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/font-awesome.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/icheck.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/filter_product.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/responsive.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/wide-grid.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/default.css')); ?>" />

<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/jquery-2.1.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/jquery.easing.1.3.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/echo.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/common.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/tweetfeed.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/bootstrap-notify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/icheck.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/owl.carousel.min.js')); ?>"></script>

<?php if(isset($web_information->source_code->css)): ?>
  <style>
    <?php echo $web_information->source_code->css; ?>

  </style>
<?php endif; ?>

<link href="<?php echo e(asset('themes/frontend/duocpham/css/swiper.min.css')); ?>" rel="stylesheet" type="text/css">
<script src="<?php echo e(asset('themes/frontend/duocpham/js/swiper.query.min.js')); ?>"></script>
<script type="text/javascript">
	function LoadSwiper(swiperid) {
		var swipers = new Swiper('#' + swiperid, {
			pagination: '.swiper-pagination',
			
			slidesPerView: 4,
			paginationClickable: true,
			spaceBetween: 20,
			autoplay: 8500,
			keyboardControl: true,
			preventClicks: false,
			preventClicksPropagation: false,
			nextButton: '.swiper-button-nexts-'+ swiperid,
			prevButton: '.swiper-button-prevs-'+ swiperid,
			breakpoints: {
				1024: {
					slidesPerView: 4,
					spaceBetween: 40
				},
				853: {
					slidesPerView: 3,
					spaceBetween: 30
				},
				640: {
					slidesPerView: 2,
					spaceBetween: 20
				},
				480: {
					slidesPerView: 2,
					spaceBetween: 10
				}
			}
		});
	}

</script>

<style>

.list-group.panelvmenu::-webkit-scrollbar-track
{
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: #F5F5F5;
}

.list-group.panelvmenu::-webkit-scrollbar
{
  width: 6px;
  background-color: #F5F5F5;
}

.list-group.panelvmenu::-webkit-scrollbar-thumb
{
  background-color: #ff8484;
}


</style>
<?php /**PATH D:\PHPcoban\domains\tipcosmetics.com.vn\public_html\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>