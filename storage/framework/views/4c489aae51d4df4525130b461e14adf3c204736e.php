<style>

</style>
<?php 

$params['hienthi'] = 0;
$sanphamnoibat = App\Http\Services\ContentService::getProducts($params)->get();

foreach($taxonomy_all as $taxonomy){
$hienthi = trim($taxonomy->hienthi,';');
$vitrihienthi = explode(';',$hienthi); // chuyển về mảng
if(in_array('3',$vitrihienthi)){
	
	$array_category = array();
	$key = 0;
?>
<ul class="nav nav-pills">
	<li class="active"><a data-toggle="pill" href="#category_<?php echo e($taxonomy->id); ?>"><?php echo e($taxonomy->title); ?></a></li>
	<?php 
	$i=0;
	foreach($taxonomy_all as $sub_taxonomy){ 
	  if($sub_taxonomy->parent_id == $taxonomy->id){ $i++; array_push($array_category,$sub_taxonomy->id );
	?>
	<li><a data-toggle="pill" href="#category_<?php echo e($sub_taxonomy->id); ?>"><?php echo e($sub_taxonomy->title); ?></a></li>
	<?php }} ?>
</ul>

<div class="tab-content">
	
	<div id="category_<?php echo e($taxonomy->id); ?>" class="tab-pane fade in active">
	
		<div class="row">
			<div class="col-md-3 display-pc">
				<div class="tab-images">
					<a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html">
						<img lazy="" src="<?php echo e($taxonomy->json_params->image); ?>" data-original="<?php echo e($taxonomy->json_params->image); ?>" alt="" width="312" height="560"></a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="product-grid">
					<div class="row">
						<?php 
						//dd($sanphamnoibat);
						foreach($sanphamnoibat as $spnoibat){ 
							$txt_category = $spnoibat->category;
							$arr_category = explode(',',$txt_category);
							if(in_array($taxonomy->id, $arr_category) and $key < 8 ){ $key++;
							$url_link = route('frontend.cms.product', ['alias_detail'=>$spnoibat->alias]) . '.html';
						?>
						<div class="block col-sm-3 col-xs-6 col-mobile-12  ">
							<!-- Product -->
							<div id="idpr_5" class="product product_wg clearfix product-hover">
								<div class="left">
									<div class="image ">
										<a class="sss" href="<?php echo e($url_link); ?>" title="Blackmores 1-900G">
											<img src="<?php echo e($spnoibat->image); ?>" title="<?php echo e($spnoibat->title); ?>" alt="<?php echo e($spnoibat->title); ?>" class="">
										</a>
									</div>
								</div>
								<div class="right">
									<div class="name product-name" style="height: 48px;">
										<div class="label-discount green saleclear"></div>
										<a href="<?php echo e($url_link); ?>" title="<?php echo e($spnoibat->title); ?>"><?php echo e($spnoibat->title); ?></a>
									</div>
									<p style="width: 100%;">
										<?php if($spnoibat->giakm > 0){ ?>
										<span class="product-price"><?php echo number_format($spnoibat->giakm, 0, ',', '.'); ?> </span>
										<span class="money">đ</span>
										<?php }else{ ?>
										<span class="product-price"> Liên hệ </span>
										<?php } ?>
										<?php if($spnoibat->gia > 0){ ?>
										<span class="product-price-km"><?php echo number_format($spnoibat->gia, 0, ',', '.'); ?> </span>
										<span class="money">đ</span>
										<?php } ?>
									</p>
									
									
									<div class="edu-rating rating-default" style="width: 100%; float: left; ">
										<div class="eduvibe-course-review-wrapper">
											<div class="review-stars-rated" title="5 out of 5 stars">
												<div class="review-star">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
														<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
													</svg>
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
														<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
													</svg>
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
														<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
													</svg>
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
														<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
													</svg>
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
														<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
													</svg>
												</div>
				
											</div>
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		
		</div>
  
	</div>

	<?php 
	
	foreach($taxonomy_all as $sub_taxonomy){ 
	  if($sub_taxonomy->parent_id == $taxonomy->id){
		$key2=0;
	?>
  <div id="category_<?php echo e($sub_taxonomy->id); ?>" class="tab-pane fade in">
	
	<div class="row">
		<div class="col-md-3 display-pc">
			<div class="tab-images">
				<a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html">
					<img lazy="" src="<?php echo e($taxonomy->json_params->image); ?>" data-original="<?php echo e($taxonomy->json_params->image); ?>" alt="" width="312" height="560"></a>
			</div>
		</div>
		<div class="col-md-9">
			<div class="product-grid">
				<div class="row">
					<?php 
					//dd($sanphamnoibat);
					foreach($sanphamnoibat as $spnoibat){ 
						$txt_category = $spnoibat->category;
						$arr_category = explode(',',$txt_category);
						if(in_array($sub_taxonomy->id,$arr_category) and $key2 < 8){
							$key2++;
						$url_link = route('frontend.cms.product', ['alias_detail'=>$spnoibat->alias]) . '.html';
					?>
					<div class="block col-sm-3 col-xs-6 col-mobile-12  ">
						<!-- Product -->
						<div id="idpr_5" class="product product_wg clearfix product-hover">
							<div class="left">
								<div class="image ">
									<a class="sss" href="<?php echo e($url_link); ?>" title="Blackmores 1-900G">
										<img src="<?php echo e($spnoibat->image); ?>" title="<?php echo e($spnoibat->title); ?>" alt="<?php echo e($spnoibat->title); ?>" class="">
									</a>
								</div>
							</div>
							<div class="right">
								<div class="name product-name" style="height: 48px;">
									<div class="label-discount green saleclear"></div>
									<a href="<?php echo e($url_link); ?>" title="<?php echo e($spnoibat->title); ?>"><?php echo e($spnoibat->title); ?></a>
								</div>
								<p style="width: 100%;">
									<?php if($spnoibat->gia > 0){ ?>
									<span class="product-price"><?php echo number_format($spnoibat->gia, 0, ',', '.'); ?> </span>
									<span class="money">đ</span>
									<?php }else{ ?>
									<span class="product-price"> Liên hệ </span>
									<?php } ?>
									<?php if($spnoibat->giakm > 0){ ?>
									<span class="product-price-km"><?php echo number_format($spnoibat->giakm, 0, ',', '.'); ?> </span>
									<span class="money">đ</span>
									<?php } ?>
								</p>
								
								<div class="shopping-cart" style="width: 20%; float: left; cursor: pointer;" onclick="addToCart(<?php echo e($spnoibat->id); ?>)">
									<i class="fa-solid fa-shopping-cart"></i>
								</div>
								
								<div class="edu-rating rating-default" style="width: 80%; float: left; ">
									<div class="eduvibe-course-review-wrapper">
										<div class="review-stars-rated" title="5 out of 5 stars">
											<div class="review-star">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
													<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
												</svg>
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
													<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
												</svg>
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
													<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
												</svg>
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
													<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
												</svg>
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
													<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
												</svg>
											</div>
			
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	
	</div>
  
  </div>
  <?php } } ?>
</div>

<?php } } ?>

<style>
	@media (max-width: 480px) {
		.nav-pills {
			margin-top: 50px;
		}
	}
</style>
<?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/element/danhmuc.blade.php ENDPATH**/ ?>