<?php 
// Lấy sản phẩm nổi bật trang chủ
$sanPhamNoiBat = App\Models\CmsProduct::danhSachSanPham($param = array('hienthi'=>'0'))->get();
?>

<div class="col-md-12 flash-sale">
	<div class="hst fadeIn">
		<div class="box clearfix box-with-products">
			
			<h3 class="title_product">Flash sale</h3>
			
			<div class="box-content products">
				<div class="box-product">
					<div id="myCarousel30733453">
						
						<div class="module   clearfix">
							<div class="modcontent clearfix">
								<div id="sj_sp_cat_18655346791451396613" class="sj-sp-cat first-load"><!--<![endif]-->

										<div class="hidden-xs hidden-sm">
										<?php if(count($sanPhamNoiBat) > 4 ){ ?>
										<div class='swiper-button-nexts swiper-button-nexts-swiper-123'><i class="fa fa-angle-right"></i></div>    
										<div class='swiper-button-prevs swiper-button-prevs-swiper-123'><i class="fa fa-angle-left"></i></div>
										<?php } ?>
										</div>
										<div class="hidden-lg hidden-md">
										<?php if(count($sanPhamNoiBat) > 2 ){ ?>
										<div class='swiper-button-nexts swiper-button-nexts-swiper-123'><i class="fa fa-angle-right"></i></div>    
										<div class='swiper-button-prevs swiper-button-prevs-swiper-123'><i class="fa fa-angle-left"></i></div>
										<?php } ?>
										</div>
										<div class="spcat-wrap swiper-containers" id='swiper-123'>
											
											<div class="swiper-wrapper">
												<?php foreach($sanPhamNoiBat as $sanpham){ 
													$url_link = route('frontend.cms.product', ['alias_detail'=>$sanpham->alias]) . '.html';
												?>
													<div class="swiper-slide" >
														<div class="product-image">
															<a href="<?php echo e($url_link); ?>" title="<?php echo e($sanpham->title); ?>">
																<img src="<?php echo e($sanpham->image); ?>" alt="<?php echo e($sanpham->title); ?>" border="0"
																 class="pro_item" />
															</a>
														</div>
														<h4 class="product-name">
															<a class="product-name" href="<?php echo e($url_link); ?>" ><?php echo e($sanpham->title); ?></a>  
														</h4>
														<p style="text-align: center;">
														<?php if($sanpham->giakm > 0){ ?>
														<span class="product-price-km"><?php echo number_format($sanpham->gia,0,",",".")  ?></span>
														<span class="product-price"><?php echo number_format($sanpham->giakm,0,",",".")  ?></span>
														<span class="money">đ</span>
														<?php }else if($sanpham->gia > 0){ ?>
														<span class="product-price"><?php echo number_format($sanpham->gia,0,",",".")  ?></span>
														<span class="money">đ</span>
														<?php }else{ ?>
														<span class="product-price">Liên hệ</span>
														<?php } ?>
														</p>
														<div class="add-to-cart"> 
															<a href="javascript:;" onclick="addcat()" data-product_id="<?php echo $sanpham->id ?>" title="Thêm vào giỏ hàng" class="add_to_cart_button product_type_external"><i class="fa fa-shopping-cart"></i> Đặt mua</a>
															
														</div>
													</div> 
												<?php } ?>
												
											</div>
											
											<div class="swiper-pagination"></div>
											<script>LoadSwiper('swiper-123');</script>
										</div>
											<div class="clear"></div>
										

										<div class="spcat-wrap "><!--End Items--></div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /home/tipcosexyw0p/domains/tipcosmetics.com.vn/public_html/resources/views/frontend/element/flashsale.blade.php ENDPATH**/ ?>