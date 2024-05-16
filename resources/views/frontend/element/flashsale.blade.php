@php 
// Lấy sản phẩm nổi bật trang chủ
$sanPhamBanChay = App\Models\CmsProduct::danhSachSanPham($param = array('hienthi'=>'0'))->get(); 
//dd($array_translate);
@endphp

<div class="col-md-12 flash-sale">
	<div class="hst fadeIn">
		<div class="box clearfix box-with-products">
			
			<h3 class="title_product">{{ $array_translate[strtolower('Flash sale')] ?? 'Flash sale' }}</h3>
			
			<div class="box-content products">
				<div class="box-product">
					<div id="myCarousel30733453">
						
						<div class="module   clearfix">
							<div class="modcontent clearfix">
								<div id="sj_sp_cat_18655346791451396613" class="sj-sp-cat first-load"><!--<![endif]-->

										<div class="hidden-xs hidden-sm">
										<?php if(count($sanPhamBanChay) > 4 ){ ?>
										<div class='swiper-button-nexts swiper-button-nexts-swiper-123'><i class="fa fa-angle-right"></i></div>    
										<div class='swiper-button-prevs swiper-button-prevs-swiper-123'><i class="fa fa-angle-left"></i></div>
										<?php } ?>
										</div>
										<div class="hidden-lg hidden-md">
										<?php if(count($sanPhamBanChay) > 2 ){ ?>
										<div class='swiper-button-nexts swiper-button-nexts-swiper-123'><i class="fa fa-angle-right"></i></div>    
										<div class='swiper-button-prevs swiper-button-prevs-swiper-123'><i class="fa fa-angle-left"></i></div>
										<?php } ?>
										</div>
										<div class="spcat-wrap swiper-containers" id='swiper-123'>
											
											<div class="swiper-wrapper">
												<?php foreach($sanPhamBanChay as $sanpham){ 
													$url_link = route('frontend.cms.product', ['alias_detail'=>$sanpham->alias]) . '.html';
												?>
													<div class="swiper-slide" >
														<div class="product-image">
															<a href="{{ $url_link }}" title="{{ $sanpham->title }}">
																<img src="{{ $sanpham->image }}" alt="{{ $sanpham->title }}" border="0"
																 class="pro_item" />
															</a>
														</div>
														<h4 class="product-name">
															<a class="product-name" href="{{ $url_link }}" >{{ $sanpham->title }}</a>  
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
															<a href="javascript:;" onclick="addToCart({{ $sanpham->id }})" data-product_id="<?php echo $sanpham->id ?>" title="Thêm vào giỏ hàng" class="add_to_cart_button product_type_external"><i class="fa-solid fa-shopping-cart"></i> Đặt mua</a>
															
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

<script>
    function addToCart(id) {
		let element = document.querySelector('.add_to_cart_button');
        var f = "?quantity=1" + "&id=" + id;
        var _url = "/add-to-cart" + f;

        jQuery.ajax({
            type: "GET",
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
                if (data == 1) {
                    alert('Số lượng còn lại không đủ để đặt hàng! Vui lòng chọn số lượng thấp hơn !');
                } else {
                    alert('Thêm vào giỏ hàng thành công');
                }
            }
        });
    }
</script>

<script>
	var salePopArr = [];
	let timePerPop = 5000;
	let timeDelay = 5000;
	let salesPopDesc = `Khách hàng [name] tại [address] vừa mua sản phẩm cách đây [time]`;
	let count = 0;
	let fakerScript ="//theme.hstatic.net/200000381339/1001207774/14/faker.js?v=15"
	let customerGender = undefined;
		
	salePopArr = [
		<?php foreach($sanPhamBanChay as $banchay){ $url_link = route('frontend.cms.product', ['alias_detail'=>$banchay->alias]) . '.html'; ?>
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
	