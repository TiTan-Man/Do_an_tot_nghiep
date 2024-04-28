<div class="blog-suc-khoe">
	<div class="container">
		
		<div class='home_bottom_box'>
			<div class="box blog-module box-no-advanced">
				<div class="box-heading">Blog sức khỏe</div>
				<div class="strip-line"></div>
				<div class="box-content">
					<div class="news v2 row">
						<?php $__currentLoopData = $blocksContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($banner->block_code == 'blog'): ?>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="pop_home row">
									<div class="col-xs-4 col-sm-5 noright">
										<a class="pop_img" title="<?php echo e($banner->title); ?>" href="<?php echo e($banner->url_link); ?>">
											<img alt="<?php echo e($banner->title); ?>" src="<?php echo e($banner->image); ?>"></a>
									</div>
									<div class="col-xs-8 col-sm-7 noleft">
										<a class="article_title" title="<?php echo e($banner->title); ?>" href="<?php echo e($banner->url_link); ?>"><?php echo e($banner->title); ?></a>
									</div>
								</div>
							</div>
							
							<?php echo $banner->content; ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</div>
			</div>
		</div>

	</div>
</div><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/element/blog.blade.php ENDPATH**/ ?>