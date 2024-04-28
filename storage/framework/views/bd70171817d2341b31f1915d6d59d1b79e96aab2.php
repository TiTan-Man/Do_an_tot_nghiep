<?php $__env->startSection('content'); ?>

<div class="full-width home">
    <div class="background-content"></div>
    <div class="background">
        <div class="shadow"></div>
        <div class="pattern">
            
            <div class="margin" style="margin-top: 20px; width: 100%;"></div>
            <div class="container">
                <div class="row">
					<?php echo $__env->make('frontend.element.menuleft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php echo $__env->make('frontend.element.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
				<div class="row">
					
					<?php echo $__env->make('frontend.element.danhmuc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php echo $__env->make('frontend.element.tinnoibat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->yieldContent('content'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u745771642/domains/bibomart.thanhphung.com/public_html/resources/views/frontend/pages/home/index.blade.php ENDPATH**/ ?>