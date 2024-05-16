<?php 
// Sản phẩm flash sale
$sanPhamNoiBatTrangTrong = App\Models\CmsProduct::danhSachSanPham($param = array('hienthi'=>'2'))->paginate(5);
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
									<?php foreach($sanPhamNoiBatTrangTrong as $sanpham){
									$url_link = route('frontend.cms.product', ['alias_detail'=>$sanpham->alias]) . '.html';
										?>
									<div class="block  ">
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
												<div class="name" style="">
													<div class="label-discount green saleclear">
													</div>
													<a href="<?php echo e($url_link); ?>" title="<?php echo e($sanpham->title); ?>"><?php echo e($sanpham->title); ?></a>
												</div>
												<div class="price">
												<?php echo e($sanpham->giakm !='' ?  number_format($sanpham->giakm).' đ' :  number_format($sanpham->gia).' đ' ?? 'Liên hệ'); ?>

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


<script>
	var salePopArr = [];
	let timePerPop = 5000;
	let timeDelay = 5000;
	let salesPopDesc = `Khách hàng [name] tại [address] vừa mua sản phẩm cách đây [time]`;
	let count = 0;
	let fakerScript ="//theme.hstatic.net/200000381339/1001207774/14/faker.js?v=15"
	let customerGender = undefined;
		
	salePopArr = [
		<?php foreach($sanPhamNoiBatTrangTrong as $banchay){ $url_link = route('frontend.cms.product', ['alias_detail'=>$banchay->alias]) . '.html'; ?>
		{
			"img_url": "<?php echo $banchay->image ?>",
			"pd_title": "<?php echo $banchay->title ?>",
			"pd_url": "<?php echo $url_link  ?>",
		},
		<?php } ?>
	]

		function showSalePop() {		
			if(!faker) return
			$('#ega-sale-pop.salepop-show').removeClass('salepop-show').addClass('salespop-close');
			let pdRanIndex = Math.floor(Math.random() * salePopArr.length),
				salePopProduct = salePopArr[pdRanIndex],
				randomMin = `${Math.floor(Math.random() * 59) + 1} phút`;
			const name= `${faker.name.lastName(customerGender)} ${faker.name.firstName(customerGender)}`
			const phone = `${faker.phone.phoneNumber().replace(' ')}`
			const address = faker.random.arrayElement(faker.locales.vi.address.city_root)
			const desc = salesPopDesc
			.replace(`[name]`, name)
			.replace(`[phone]`, `xxx${phone.substr(phone.length - 8)}`)
			.replace(`[time]`, randomMin)
			.replace('[address]', address)
			const salesPopContent = `	
			<div class="sale-pop-img">
			<img src="${salePopProduct.img_url}" class="img-fluid" loading="lazy" alt="${salePopProduct.title}" width="80" height="80"/>
				</div>
			<div class="sale-pop-body">
			<div class="sale-pop-name">
			<a href="${salePopProduct.pd_url}">${salePopProduct.pd_title}</a>
				</div>
			<span class="sale-pop-desc">${desc}</span>
				</div>
`
			$('.sale-pop-wrap').html(salesPopContent)
			setTimeout(()=>{
				$('#ega-sale-pop').addClass('salepop-show').removeClass('salespop-close');
				setTimeout(()=>{
					$('#ega-sale-pop.salepop-show').removeClass('salepop-show').addClass('salespop-close');
					setTimeout(()=>{
						showSalePop()
					},timeDelay)
				},10000)
			},3000)


		}


	function initSalesPop() {
		if(!salePopArr.length) return;
		setTimeout(()=>{
		$.getScript(fakerScript).then(()=>{
		if(faker){
				showSalePop()
			}
		})
		
		},timeDelay)
		



	}

	$(document).ready(() => {
		$('#ega-sale-pop').removeClass('hidden');
			initSalesPop()
			$(".sale-pop-close").click(function () {
				$("#ega-sale-pop").removeClass('salepop-show').removeClass('salespop-close');
			})
			$(".sale-pop-cta").click(function (e) {
				e.preventDefault();
				$(".sale-pop-regis").show();
			})
			$(".regis-close").click(function () {
				$(".sale-pop-regis").hide();
			})
	})


</script>
	<?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/element/spnoibat.blade.php ENDPATH**/ ?>