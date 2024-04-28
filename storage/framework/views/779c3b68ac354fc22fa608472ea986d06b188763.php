<!-- Stylesheets ============================================= -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/bootstrap.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/animate.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/stylesheet.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/menu.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/owl.carousel.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/font-awesome.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/icheck.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/filter_product.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/responsive.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/wide-grid.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/css/default.css')); ?>" />

<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/jquery-2.1.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/jquery.easing.1.3.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/echo.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/common.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/tweetfeed.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/bootstrap-notify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/icheck.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/owl.carousel.min.js')); ?>"></script>

<?php if(isset($web_information->source_code->css)): ?>
  <style>
    <?php echo $web_information->source_code->css; ?>

  </style>
<?php endif; ?>

<link href="<?php echo e(asset('themes/frontend/css/swiper.min.css')); ?>" rel="stylesheet" type="text/css">
<script src="<?php echo e(asset('themes/frontend/js/swiper.query.min.js')); ?>"></script>
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
<?php /**PATH /home/u745771642/domains/bibomart.thanhphung.com/public_html/resources/views/frontend/panels/styles.blade.php ENDPATH**/ ?>