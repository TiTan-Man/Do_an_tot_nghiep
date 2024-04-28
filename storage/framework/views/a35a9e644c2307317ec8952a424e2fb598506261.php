<?php
    $title = $detail->title ?? $detail->title;
    $brief = $detail->mota ?? null;
    $content = $detail->chitiet ?? null;
    $image = $detail->image != '' ? $detail->image : null;
    $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
    $date = date('H:i d/m/Y', strtotime($detail->created_at));

    $url_taxonomy = route('frontend.cms.product_category', ['alias' => $detail->url_part]) . '.html';

    $title_taxonomy = $detail->taxonomy_title ?? $detail->taxonomy_title;

    $seo_title = $detail->meta_title ?? $title;
    $seo_keyword = $detail->meta_keyword ?? null;
    $seo_description = $detail->meta_description ?? $brief;
    $seo_image = $image ?? ($image_thumb ?? null);

?>

<?php $__env->startSection('content'); ?>
    <section id="content">

        <div class="breadcrumb full-width">
            <div class="background-breadcrumb"></div>
            <div class="background">
                <div class="shadow"></div>
                <div class="pattern">
                    <div class="container">
                        <div class="clearfix">
                            <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                <li class="item"><a itemprop="url" title="Trang chủ"
                                        href="<?php echo e(route('frontend.home')); ?>"><span itemprop="title">Trang chủ</span></a></li>
                                <li class="item"><span itemprop="title"><a itemprop="url" href="<?php echo e($url_taxonomy); ?>"
                                            title="<?php echo e($title_taxonomy); ?>"><?php echo e($title_taxonomy); ?></a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content full-width inner-page">
            <div class="background-content"></div>
            <div class="background">
                <div class="shadow"></div>
                <div class="pattern">
                    <div class="container">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12 center-column " id="content">
                                    <div class="prbox_detail">
                                        <span class="hidden"></span>
                                        <div class="product-info">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row" id="quickview_product">
                                                        <script>
                                                            function initZoom5da422ecf0d11() {
                                                                $('.zoomContainer').remove();
                                                                $('#image').removeData('elevateZoom');
                                                                $('#image').removeData('zoomImage');


                                                                $('#image').elevateZoom({
                                                                    tint: true,
                                                                    tintOpacity: 0.5,
                                                                    zoomTintFadeIn: 500,
                                                                    zoomTintFadeOut: 500,
                                                                    zoomWindowFadeIn: 500,
                                                                    zoomWindowFadeOut: 500,
                                                                    zoomWindowOffetx: 20,
                                                                    zoomWindowOffety: -1,
                                                                    scrollZoom: true,
                                                                    easing: true,
                                                                });

                                                                setTimeout(function() {
                                                                    $('.rtl .zoomContainer').addClass('zoom-left')
                                                                }, 500);
                                                            }
                                                            $(document).ready(function() {
                                                                if ($(window).width() > 992) {

                                                                    initZoom5da422ecf0d11();
                                                                    var z_index = 0;

                                                                    $('.thumbnails a, .thumbnails-carousel a').click(function() {
                                                                        var smallImage = $(this).attr('data-image');
                                                                        var largeImage = $(this).attr('data-zoom-image');
                                                                        var ez = $('#image').data('elevateZoom');
                                                                        $('#ex1').attr('href', largeImage);
                                                                        ez.swaptheimage(smallImage, largeImage);
                                                                        $('#image').attr('data-zoom-image', largeImage);
                                                                        z_index = $(this).index('.thumbnails a, .thumbnails-carousel a');
                                                                        initZoom5da422ecf0d11();
                                                                        return false;
                                                                    });
                                                                } else {

                                                                }
                                                            });
                                                        </script>
                                                        <div class="col-sm-6 popup-gallery">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="product-image cloud-zoom">
                                                                        <a href="<?php echo e($image); ?>" id="ex1"
                                                                            class="open-popup-image_">
                                                                            <img src="<?php echo e($image); ?>"
                                                                                title="<?php echo e($title); ?>"
                                                                                alt="CHC NEW LIVERFORTE" id="image"
                                                                                data-zoom-image="<?php echo e($image); ?>"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 product-center clearfix">
                                                            <div class="product-name">
                                                                <?php echo e($title); ?>

                                                            </div>
															<div class="rw-ui-container"></div>
															<div class="meta-status">
                                                                <div class="availability">
																	MSP: <span
																			class="available"><?php echo e($detail->masanpham); ?></span>
																</div>
                                                            </div>
                                                            <div class="meta-status">
                                                                <div class="availability">
                                                                    Tình trạng: <span
                                                                        class="available"><?php echo e($detail->tinhtrang == 1 ? 'Còn hàng' : 'Hết hàng'); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="meta-desc">
                                                                <?php echo e($brief); ?>

                                                            </div>
                                                            <div class="price">
                                                                <label>Giá:</label>

                                                                <span class="price-new"><span
                                                                        id="price-old">&nbsp;<?php echo e($detail->giakm != '' ? number_format($detail->giakm).' đ' : number_format($detail->gia).' đ' ?? 'Liên hệ'); ?></span>
																</span>

                                                            </div>

                                                            
                                                                <div id="productSize">
                                                                    <div class="option selected">
                                                                      <div class="inner">S</div>
                                                                    </div>
                                                                    <div class="option">
                                                                      <div class="inner">M</div>
                                                                    </div>
                                                                    <div class="option">
                                                                      <div class="inner">L</div>
                                                                    </div>
                                                                    <div class="option">
                                                                      <div class="inner">XL</div>
                                                                    </div>
                                                                  </div>
                                                                <div class="quantity">
                                                                    <span>Số lượng</span>
                                                                    <div class="minus">-</div>
                                                                    <input type="number" class="quantity-input"
                                                                        value="1" min="1" name="quantity"
                                                                        id="quantity">
                                                                    <div class="plus">+</div>
                                                                </div>
                                                                <div class="buy-product">
                                                                    <div onclick="moveToCart()" class="buy-now" id="buy-now">
                                                                        Mua Ngay
                                                                    </div>
                                                                    <div onclick="addCart()" class="buy-cart" id="buy-cart">
                                                                        Thêm Vào Giỏ Hàng
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="product_id" id="product_id"
                                                                    value="<?php echo e($detail->id); ?>">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div id="tabs" class=" htabs">
                                            <a href="#tab-description" class="selected">Chi tiết sản phẩm</a>

                                            <a href="#tab-review">Đánh giá</a>
                                        </div>
                                        <div id="tab-description" class="tab-content" style="display: block;">
                                            <div class="meta-row">
                                                <?php echo $detail->chitiet; ?>

                                            </div>
                                        </div>
                                        <div id="tab-review" class="tab-content" >
                                            <div id="ratingproduct">
                                                <div id="frm_rating">
                                                    <div>
                                                        <p class="headTitleRating">
                                                            Chia sẽ nhận xét của bạn về sản phẩm <b>(
                                                                <?php echo e($title); ?>)</b>
                                                        </p>

                                                        <div id="fb-root"></div>
                                                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0"
                                                            nonce="NGstfdSt"></script>
                                                        <div class="fb-comments"
                                                            data-href="<?php echo e($url_link = route('frontend.cms.product', ['alias_detail' => $detail->alias]) . '.html'); ?>"
                                                            data-width="100%" data-numposts="5"></div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php echo $__env->make('frontend.element.menuleft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('frontend.element.spnoibat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="main-content full-width inner-page">
            <div class="background-content"></div>
            <div class="background">
                <div class="shadow"></div>
                <div class="pattern">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="col_full nobottommargin" id="product-related-products">
                                <h4 class="title_block-c">Sản phẩm cùng nhóm</h4>
                                <div class="box-content products">
                                    <div class="box-product">
                                        <div id="myCarousel30733470">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                <div class="active item">
                                                    <div class="product-grid">
                                                        <div class="row">
                                                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $title = $item->title;
                                                                    $mota = $item->mota ?? $item->mota;
                                                                    $image = $item->image ?? ($item->image ?? null);

                                                                    $url_link =
                                                                        route('frontend.cms.product', [
                                                                            'alias_detail' => $item->alias,
                                                                        ]) . '.html';
                                                                ?>
                                                                <div class="block col-sm-3 col-xs-6 col-mobile-12  ">
                                                                    <!-- Product -->
                                                                    <div id="idpr_<?php echo e($item->id); ?>"
                                                                        class="product product_wg clearfix product-hover">
                                                                        <div class="left">
                                                                            <div class="image ">
                                                                                <a class="sss"
                                                                                    href="<?php echo e($url_link); ?>"
                                                                                    title="<?php echo e($title); ?>">
                                                                                    <img src="<?php echo e($image); ?>"
                                                                                        title="<?php echo e($title); ?>"
                                                                                        alt="<?php echo e($title); ?>"
                                                                                        class="">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="right">
                                                                            <div class="name" style="height: 32px;">
                                                                                <div
                                                                                    class="label-discount green saleclear">
                                                                                </div>
                                                                                <a href="<?php echo e($url_link); ?>"
                                                                                    title="<?php echo e($title); ?>"><?php echo e($title); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                </div>
            </div>
            
        </div>
    </section>

    <style>
        .quantity {
            display: flex;
            align-items: center;
            margin: 5px 0 20px;
        }

        .minus,
        .plus {
            background-color: #ccc;
            border-radius: 6px;
            margin: 0 10px;
        }

        .minus {
            padding: 5px 14px;
        }

        .plus {
            padding: 5px 12px;

        }

        .quantity-input {
            text-align: center;
            width: 50px;
            border: none;
            outline: none;
        }

        .buy-product {
            justify-content: space-between;
            display: flex;
        }

        .buy-now,
        .buy-cart {
            background-color: #01b9c3;
            color: #fff;
            padding: 15px 50px;
            border-radius: 20px;
        }

        .buy-now:hover,
        .buy-cart:hover {
            cursor: pointer;
            opacity: 0.8;
        }

        .buy-now a {
            color: #fff;
        }
    </style>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.querySelector('.quantity-input');
            const minusButton = document.querySelector('.minus');
            const plusButton = document.querySelector('.plus');
            const buyNowButton = document.querySelector('.buy-now');

            minusButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            plusButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });

            // buyNowButton.addEventListener('click', function() {
            //     let quantity = parseInt(quantityInput.value);
            //     alert('Bạn đã mua ' + quantity + ' sản phẩm!');
            // });
        });

        function addCart() {
            var quantity = document.getElementById('quantity').value;
            var id = document.getElementById('product_id').value;
            var f = "?quantity=" + quantity + "&id=" + id;
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
                        alert('Đặt hàng thành công');
                    }
                }
            });
        }

        function moveToCart() {
            var quantity = document.getElementById('quantity').value;
            var id = document.getElementById('product_id').value;
            var f = "?quantity=" + quantity + "&id=" + id;
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
                        // alert('Đặt hàng thành công');
                        window.location.href = "/gio-hang";
                    }
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<style>
#productSize {
  display: flex;
  align-items: center;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px;
  font-size: 16px;
}

.option {
  padding: 5px 15px;
  border-radius: 5px;
  margin-right: 20px;
  cursor: pointer;
  transition: border-color 0.2s ease, color 0.2s ease;
}

.option .inner {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px 10px;
  display: inline-block;
}

.option.selected {
  border-color: red;
  color: blue;
}

.option.selected .inner {
  border-color: red;
}
  </style>
<script>
const options = document.querySelectorAll('#productSize .option');
options.forEach(option => option.addEventListener('click', () => {
  options.forEach(o => o.classList.remove('selected'));
  option.classList.add('selected');
}));
</script>
<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/pages/product/detail.blade.php ENDPATH**/ ?>