<?php 
// Lấy tin tức nổi bật trang chủ
$params = array('status'=>'active','news_position'=>1,'limit'=>4,'order_by'=>array('iorder' => 'asc', 'aproved_date'=>'desc'));
$rows = App\Http\Services\ContentService::tinNoiBat($params)->get();
?>
<div class="pattern">
	<div class="container">
		
		<div class="col-xs-12 col-sm-12 home_news noleft section-news">
			<div class="box blog-module box-no-advanced">
				<div class="box-heading">Tin tức mới</div>
				<div class="strip-line"></div>
				<div class="box-content">

					<div class="news v2 row">
						<?php foreach($rows as $key=> $row){
							if($key==0){?>
						<div class='col-md-6 col-sm-12'>
							<div class='blog-post latest-blog-3 overlay-wraper'>
								<div class='blog-big-main'>
									<a href='/chi-tiet/<?php echo e($row->url_part); ?>.html'>
										<img src='<?php echo e($row->image); ?>'  alt='<?php echo e($row->title); ?>' class='img-responsive center-block' />
									</a>
								</div>
								<div class='wt-post-info'>
									<div class='post-overlay-position'>
										<div class='wt-post-title'> 
											<h3 class='post-title'>
												<a href='/chi-tiet/<?php echo e($row->url_part); ?>.html' title='<?php echo e($row->title); ?>'><?php echo e($row->title); ?></a>
											</h3>
										</div>
										<div class='wt-post-text'>
											<?php echo e($row->brief); ?>   
										</div>
									</div>
								</div>
							</div>
						</div>
							<?php } } ?>
						<div class='col-md-6 col-sm-12'>
							<?php foreach($rows as $key2=> $row){
							if($key2>0){?>
							<div class='blog-post blog-post-small clearfix'>
								<div class='wt-post-media'>
									<a href='/chi-tiet/<?php echo e($row->url_part); ?>.html' title='<?php echo e($row->title); ?>'>
										<img src='<?php echo e($row->image); ?>' alt='<?php echo e($row->title); ?>' class='img-responsive center-block' />
									</a>
								</div>
								<div class='wt-post-info'> 
									<div class='wt-post-title'>
										<h4 class='post-title'>
											<a href='/chi-tiet/<?php echo e($row->url_part); ?>.html' title='<?php echo e($row->title); ?>'><?php echo e($row->title); ?></a>
										</h4>
									</div> 
									<div class='wt-post-text'><?php echo e($row->brief); ?> </div>
								</div>
							</div>
							<?php }} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/element/tinnoibat.blade.php ENDPATH**/ ?>