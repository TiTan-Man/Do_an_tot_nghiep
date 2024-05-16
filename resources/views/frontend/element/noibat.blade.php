@php
    // Lấy sản phẩm nổi bật trang chủ
    $sanPhamNoiBat = App\Models\CmsProduct::danhSachSanPham($param = ['hienthi' => '1'])->get();
@endphp
<div class="col-md-12">
    <div class="hst fadeIn">
        <div class="box clearfix box-with-products ">

            <h3 class="title_product">{{ $array_translate[strtolower('Nổi bật')]->$locale ?? 'Sản phẩm nổi bật' }}</h3>

            <div class="box-content products">
                <div class="box-product">
                    <div id="myCarousel30733470">
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
                                            <div id="idpr_{{ $sanpham->id }}"
                                                class="product product_wg clearfix product-hover">
                                                <div class="left">
                                                    <div class="image ">
                                                        <a class="sss" href="{{ $url_link }}"
                                                            title="{{ $sanpham->title }}">
                                                            <img src="{{ $sanpham->image }}"
                                                                title="{{ $sanpham->title }}"
                                                                alt="{{ $sanpham->title }}" class="" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="right">
                                                    <div class="name product-name">
                                                        <div class="label-discount green saleclear"></div>
                                                        <a href="{{ $url_link }}"
                                                            title="{{ $sanpham->title }}">{{ $sanpham->title }}</a>
                                                    </div>
                                                    <p style="width: 50%;float: left;">
                                                        <?php if($sanpham->giakm > 0){ ?>
                                                        <span class="product-price-km"><?php echo number_format($sanpham->gia, 0, ',', '.'); ?></span>
                                                        <span class="product-price"><?php echo number_format($sanpham->giakm, 0, ',', '.'); ?></span>
                                                        <span class="money">đ</span>
                                                        <?php }else if($sanpham->gia > 0){ ?>
                                                        <span class="product-price"><?php echo number_format($sanpham->gia, 0, ',', '.'); ?></span>
                                                        <span class="money">đ</span>
                                                        <?php }else{ ?>
                                                        <span class="product-price">Liên hệ</span>
                                                        <?php } ?>
                                                    </p>
                                                    <p class="shopping-cart" style="width: 50%; float: left" onclick="addToCart({{ $sanpham->id }})">
                                                        <i class="fa-solid fa-shopping-cart"></i>
                                                    </p>
													<div class="rw-ui-container"></div>
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
</div>
