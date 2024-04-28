<?php 
// Lấy sản phẩm nổi bật trang chủ
$sanPhamNoiBat = App\Models\CmsProduct::danhSachSanPham($param = array('hienthi'=>'1'))->get();
?>


<div class="col-md-3 pull-right" id="column-left">
	<div class="box clearfix box-with-products ">

		<div class="box-heading">SẢN PHẨM KHÁC</div>
		<div class="strip-line"></div>
		<div class="box-content products">
			<div class="box-product">
				<div id="myCarousel32530923">
					<!-- Carousel items -->
					<div class="carousel-inner">
						<div class="active item">
							<div class="product-grid">
								<div class="row">
									<?php foreach($sanPhamNoiBat as $sanpham){
									$url_link = route('frontend.cms.product', ['alias_detail'=>$sanpham->alias]) . '.html';
										?>
									<div class="block col-sm-3 col-xs-6 col-mobile-12  ">
										<!-- Product -->
										<div class="product product_wg clearfix product-hover">
											<div class="left">
												<div class="image ">
													<a class="sss" href="<?php echo e($url_link); ?>" title="<?php echo e($sanpham->title); ?>">
														<img src="<?php echo e($sanpham->image); ?>" title="<?php echo e($sanpham->title); ?>" alt="<?php echo e($sanpham->title); ?>" class="">
													</a>
												</div>
											</div>
											<div class="right">
												<div class="price">
												<?php echo e($sanpham->giakm !='' ? $sanpham->giakm : $sanpham->gia ?? 'Liên hệ'); ?>

												</div>
												<div class="name" style="">
													<div class="label-discount green saleclear">
													</div>
													<a href="<?php echo e($url_link); ?>" title="<?php echo e($sanpham->title); ?>"><?php echo e($sanpham->title); ?></a>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/element/spnoibat.blade.php ENDPATH**/ ?>