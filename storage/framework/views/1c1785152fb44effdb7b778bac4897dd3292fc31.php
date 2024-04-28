<header>
	<div class="background-header"></div>
	<div class="slider-header">
		<!-- Top Bar -->
		<!-- Top of pages -->
		<div id="top" class="full-width">
			<div class="background-top"></div>
			<div class="background">
				<div class="shadow"></div>
				<div class="pattern">
					<div class="container">
						<div class="row">
							<!-- Header Left -->
							<div class="col-xs-12 col-sm-2 col-md-2 noright" id="header-left">
								<!-- Logo -->
								<div class="logo">
									<a href="/" title="<?php echo e($web_information->information->site_name); ?>">
										<img src="<?php echo e($web_information->image->logo_header_light); ?>" title="<?php echo e($web_information->information->site_name); ?>" />
									</a>
								</div>
							</div>
							<!-- Header Center -->
							<div class="col-xs-9 col-ipad-12 col-sm-4 col-md-4 no-margin" id="header-center">
								<!-- Search -->
								<div class="search_form">
									<div class="search_box">
										<form action="<?php echo e(route('frontend.cms.product_search')); ?>" id='form-filter' method="post" >
										<?php echo csrf_field(); ?>
											<div onclick="timkiem()" class="button-search"></div>
											<input type="text" class="input-block-level" name="search" placeholder="Tìm kiếm sản phẩm" id="txt_search" value="" />
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<script>
									function timkiem() {
										$('#form-filter').submit();
									}
								</script>
							</div>

							<!-- Header Right -->
							<div class="col-xs-12 col-ipad-12 col-sm-6 col-md-6 " id="header-right">
								<?php $__currentLoopData = $blocksContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($banner->block_code == 'header'): ?>
								<div class="hidden-xs hidden-sm col-md-4">
									<div class="left">
										<img src="<?php echo e($banner->image); ?>" alt="<?php echo e($banner->title); ?>" />
									</div>
									<div class="right">
										<h3><?php echo e($banner->title); ?></h3>
									</div>
								</div>
								<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
								<script type="text/javascript">$('.mnu_home a').addClass("active");</script>
							</div>
						</div>
					</div>

					<div class="main_menu">
						<div id="megamenu_228844968" class="container-megamenu  horizontal">
							<div class="megaMenuToggle">
								<div class="megamenuToogle-wrapper">
									<div class="megamenuToogle-pattern">
										<div class="container">
											<div><span></span><span></span><span></span></div>
										</div>
									</div>
								</div>
							</div>
							
							<?php 
								$array_category = array();
								foreach($taxonomy_all as $category){
									if($category->parent_id != ''){
										$array_category[$category->parent_id] = $category->parent_id;
									}
								} 
							?>
							
							<div class="megamenu-wrapper">
								<div class="megamenu-pattern">
									<div class="container">
										<ul class="megamenu shift-down">
											<li class='mnu_about'>
												<p class='close-menu'></p>
												<p class='open-menu'></p>
												<a href='/' title='Trang chủ' class='clearfix'>
													<span><strong><i style='font-size:20px;' class='fa fa-home'></i>&nbspTrang chủ</strong></span>
												</a>
											</li>
											<?php foreach($taxonomy_all as $taxonomy){
											$hienthi = trim($taxonomy->hienthi,';');
											$vitrihienthi = explode(';',$hienthi); // chuyển về mảng
											if(in_array(0,$vitrihienthi)){
												if(in_array($taxonomy->id,$array_category)){
											?>
												<li class='mnu_about with-sub-menu hover'>
													<p class='close-menu'></p>
													<p class='open-menu'></p>
													<a href='/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html' title='<?php echo e($taxonomy->title); ?>' class='clearfix'>
														<span><strong><?php echo e($taxonomy->title); ?></strong></span>
													</a>
													<div class='sub-menu' style='width: 260px'>
														<div class='content'> 
															<p class='arrow'></p>
															<?php 
															$i=0;
															foreach($taxonomy_all as $sub_taxonomy){ 
																if($sub_taxonomy->parent_id == $taxonomy->id){ $i++;
																
															?>
															<div class='row'>
																<div class='col-sm-12  mobile-enabled'><a href='/<?php echo e($sub_taxonomy->taxonomy); ?>/<?php echo e($sub_taxonomy->url_part); ?>.html' title='<?php echo e($sub_taxonomy->title); ?>'><?php echo e($sub_taxonomy->title); ?></a></div>
															</div>
															<div class='border'></div>
															<?php } } ?>
														</div>
													</div>
												</li>
												<?php }else{ ?>
												<li class='mnu_about'>
													<p class='close-menu'></p>
													<p class='open-menu'></p>
													<a href='/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html' title='<?php echo e($taxonomy->title); ?>' class='clearfix'>
														<span><strong><?php echo e($taxonomy->title); ?></strong></span>
													</a>
												</li>
											<?php } } } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$(window).load(function () {
								var css_tpl = '<style type="text/css">';
								css_tpl += '#megamenu_228844968 ul.megamenu > li > .sub-menu > .content {';
								css_tpl += '-webkit-transition: all 300ms ease-out !important;';
								css_tpl += '-moz-transition: all 300ms ease-out !important;';
								css_tpl += '-o-transition: all 300ms ease-out !important;';
								css_tpl += '-ms-transition: all 300ms ease-out !important;';
								css_tpl += 'transition: all 300ms ease-out !important;';
								css_tpl += '}</style>'
								$("head").append(css_tpl);
							});
						</script>
						<script type="text/javascript">$('.mnu_home a').addClass("active");</script>
					</div>
				</div>
			</div>
		</div>
	</div>

</header><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/element/menumain.blade.php ENDPATH**/ ?>