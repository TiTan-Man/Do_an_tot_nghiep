<hr /><br />
<div class="copyright full-width container">
    <div class="background-copyright"></div>
		<div class="col-lg-5 co-md-5 col-sm-6 col-xs-12 footer-middle-col2 footer-middle-col">
			
			<?php $__currentLoopData = $blocksContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($banner->block_code == 'footer'): ?>
					<?php echo $banner->content; ?>

				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
			<div class="footersocial">
				<div class="footer-menu ">
					<ul class="inline-list social-icons">
						<?php $__currentLoopData = $blocksContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($banner->block_code == 'social'): ?>
							<li class="l_fa-facebook"><a target="_blank" class="icon-fallback-text" href="<?php echo e($banner->url_link); ?>"><span class="<?php echo e($banner->icon); ?>" aria-hidden="true"></span></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-3 co-md-3 col-sm-6 col-xs-12 footer-middle-col1 footer-middle-col">
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
		<div class="col-lg-4 co-md-4 col-sm-6 col-xs-12 footer-middle-col3 footer-middle-col resgis-email">
        <h3>Map</h3>
        <p>
			<?php echo $web_information->source_code->map; ?>

		</p>

		</div>

</div>
<div class="footer">
	<div class="copyright">
		<div class="container">
			<label style="color: #fff"><?php echo e($web_information->information->copyright); ?><span style="float: right;"><a style="font-size: 16px;color: #fff" href="https://www.thanhphung.com/" target = '_blank'>Thiết kế bởi Thành Phùng</a></span></label>
		</div>

	</div>
</div><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/element/footer.blade.php ENDPATH**/ ?>