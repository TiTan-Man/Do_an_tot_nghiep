
<footer class="">
	<div class="copyright full-width container">
		<div class="row">
		
			<div class="col-lg-8 co-md-8 col-sm-6 col-xs-12 footer-middle-col2 footer-middle-col">
				
				<?php $__currentLoopData = $blocksContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($banner->block_code == 'footer'): ?>
						<?php echo $banner->content; ?>

					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
			</div>
			<div class="col-lg-4 co-md-4 col-sm-6 col-xs-12 footer-middle-col1 footer-middle-col">
				<div class="listmenu_c">
					<div class="footer-box">
						<h3>Thông tin chung</h3>
						<div class="row">
							<div class="col-xs-24 col-sm-24">
								<ul class="footer-link showhide">
									<?php foreach($taxonomy_all as $taxonomy){
									$hienthi = trim($taxonomy->hienthi,';');
									$vitrihienthi = explode(';',$hienthi); // chuyển về mảng
									if(in_array(2,$vitrihienthi)){?>
									<li><a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html" title="<?php echo e($taxonomy->title); ?>"><?php echo e($taxonomy->title); ?></a></li>
									<?php }} ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="footer">
	<div class="copyright">
		<div class="container">
			<label style="color: #fff"><?php echo e($web_information->information->copyright); ?><span style="float: right;"><a style="font-size: 16px;color: #fff" ></a></span></label>
		</div>

	</div>
</div>

<style>

</style>
<div class="bonus" aria-hidden="false">
	<?php $__currentLoopData = $blocksContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($banner->block_code == 'social'): ?>
    <div class="hotline "><a target="_blank" href="<?php echo e($banner->url_link); ?>" class="hotline_qc">
	<img src="<?php echo e($banner->image); ?>" /></a></div>
	<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div><?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/element/footer.blade.php ENDPATH**/ ?>