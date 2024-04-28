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
                       <li class="item"><a itemprop="url" title="Trang chủ" href="<?php echo e(route('frontend.home')); ?>"><span itemprop="title">Trang chủ</span></a></li><li class="item"><span itemprop="title"><a itemprop="url" href="<?php echo e($url_taxonomy); ?>" title="<?php echo e($title_taxonomy); ?>"><?php echo e($title_taxonomy); ?></a></span></li>
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

                                                        setTimeout(function () { $('.rtl .zoomContainer').addClass('zoom-left') }, 500);
                                                    }
                                                    $(document).ready(function () {
                                                        if ($(window).width() > 992) {

                                                            initZoom5da422ecf0d11();
                                                            var z_index = 0;

                                                            $('.thumbnails a, .thumbnails-carousel a').click(function () {
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
                                                                <a href="<?php echo e($image); ?>" id="ex1" class="open-popup-image_">
																<img src="<?php echo e($image); ?>" title="<?php echo e($title); ?>" alt="CHC NEW LIVERFORTE" id="image" data-zoom-image="<?php echo e($image); ?>"></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-6 product-center clearfix">
                                                    <div class="product-name">
                                                        <?php echo e($title); ?>

                                                    </div>
                                                    <div class="meta-status">
                                                        <div class="availability">
                                                            Tình trạng: <span class="available"><?php echo e($detail->tinhtrang == 1 ? "Còn hàng" : "Hết hàng"); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="meta-desc">
													<?php echo e($brief); ?>

                                                    </div>
                                                    <div class="price">
                                                        <label>Giá:</label>

                                                        <span class="price-new"><span id="price-old">&nbsp;<?php echo e($detail->giakm !='' ? $detail->giakm : $detail->gia ?? 'Liên hệ'); ?></span></span>

                                                    </div>
                                                    <div class="button-call">
                                                        <a href="tel:<?php echo e($web_information->information->hotline); ?>" title="<?php echo e($web_information->information->hotline); ?>"><i class="fa fa-volume-off"></i> Đặt hàng</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div id="tabs" class=" htabs">
                                    <a href="#tab-description" class="selected">Chi tiết sản phẩm</a>
                                    <a href="#giaohang_thanhtoan">Danh sách điểm bán</a>
                                    <a href="#camket">Giấy tờ sản phẩm</a>
                                    <a href="#tab-review">Đánh giá</a>
                                </div>
                                <div id="tab-description" class="tab-content" style="display: block;">
                                    <div class="meta-row">
									<?php echo $detail->chitiet; ?>

                                    </div>
                                </div>
                                <div id="giaohang_thanhtoan" class="tab-content" style="display: none;">
                                    <?php echo $detail->diemban; ?>

                                </div>
                                <div id="camket" class="tab-content" style="display: none;">
                                    <?php echo $detail->giayto; ?>

                                </div>
                                <div id="tab-review" class="tab-content" style="display: none;">
                                    <div id="ratingproduct">
                                        <div id="frm_rating">
                                            <div>
                                                <p class="headTitleRating">
                                                    Chia sẽ nhận xét của bạn về sản phẩm <b>( <?php echo e($title); ?>)</b>
                                                </p>

                                                <div id="fb-root"></div>
												<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="NGstfdSt"></script>
												<div class="fb-comments" data-href="<?php echo e($url_link = route('frontend.cms.product', ['alias_detail'=>$detail->alias]). '.html'); ?>" data-width="100%" data-numposts="5"></div>
												<div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>


                            <script type="text/javascript">
                                $.fn.tabs = function () {
                                    var selector = this;

                                    this.each(function () {
                                        var obj = $(this);

                                        $(obj.attr('href')).hide();

                                        $(obj).click(function () {
                                            $(selector).removeClass('selected');

                                            $(selector).each(function (i, element) {
                                                $($(element).attr('href')).hide();
                                            });

                                            $(this).addClass('selected');

                                            $($(this).attr('href')).show();

                                            return false;
                                        });
                                    });

                                    $(this).show();

                                    $(this).first().click();
                                };
                            </script>

                            <script type="text/javascript">$('#tabs a').tabs();</script>

                            <script type="text/javascript" src="/themes/frontend/duocpham/js/jquery.elevateZoom-3.0.3.min.js"></script>
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
												
												$url_link = route('frontend.cms.product', ['alias_detail'=>$item->alias]). '.html';
												?>
												<div class="block col-sm-3 col-xs-6 col-mobile-12  ">
													<!-- Product -->
													<div id="idpr_<?php echo e($item->id); ?>" class="product product_wg clearfix product-hover">
														<div class="left">
															<div class="image ">
																<a class="sss" href="<?php echo e($url_link); ?>" title="<?php echo e($title); ?>">
																	<img src="<?php echo e($image); ?>" title="<?php echo e($title); ?>" alt="<?php echo e($title); ?>" class="">
																</a>
															</div>
														</div>
														<div class="right">
															<div class="name" style="height: 32px;">
																<div class="label-discount green saleclear">
																</div>
																<a href="<?php echo e($url_link); ?>" title="<?php echo e($title); ?>"><?php echo e($title); ?></a>
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
<style>
   .list-item-rating{clear:both;
clear: both;
margin-top: 50px;
float: left;
width: 100%;
}
.listrote {
    border-top: 1px solid #ddd;
    padding: 30px 12px;
    vertical-align: middle;
    overflow: hidden;
}
.customer, .customercm, .customerrate, .listrote::before {
    display: inline-block;
    vertical-align: middle;
}
.customercm {
    width: 60%;
    float: left;
    margin-top: 10px;
}
.customerrate {
    width: 17%;
    float: left;
    text-align: center;
    font-size: 18px;
    color: #2b2b2b;
    line-height: 1.5;
}
.spPer5 {
    font-size: 0.6em;
    font-weight: 600;
}
.nameauthor {
    font-size: 14px;
    color: #333;
    font-weight: 600;
}
.italic, .quote, .snippet-posts .post-link {
    font-style: italic;
}
.listrote .customer {
    width: 15%;
    float: left;
    font-size: 12px;
    display: inline-block;
vertical-align: middle;
}.list_start{ display: inline-block;
padding: 10px;}
#msg_star{color: #ff0000;
text-align: left;
float: left;
}
.headTitleRating{color: #333333}
.star{
    background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAABQCAYAAAAZQFV3AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABOFJREFUeNrsmEFoHFUYx9/MdHfTJRKzUhBaFiL1YghZCFQUIV6UQJuLWCgr8eKpIoiFSqsHQYrmYj14KHqxKAl6MbA5eCgKRVAMBhpCwIJQCETRQzTsNtnO7s74+17fbGc3M7OzZhUsHfjzdvd97/++973vff99Y/m+rwb5WL0Idz60h2nckTc8Nw2hncLmAnhtIB7i3VGan8VD8Dhebh+U8FOaX8Bh4EB48R8TQlai+QnkgMTxD/AYpFt9EULk0EyBD8Dn4BPT9TZ4CrwD6Wos4V+XrUdpXzQk4tUEkAFXwNUu+1fAWWO7anADLDLJTkCYpf0K3DQe3Ui5oUI6B8ShlyBstZfMMiXoX4MV8GZKQgnJcXA6nKPtGJoE/gZ8Cy6mIJPwnIJsL3ZTIB2h+U6WANZjyE6Aj8Cz3WT7TooJ7HUwneDdc+BaFFnc0SuCzQTCTWOT+iwfN6cjWJ6clo9NzOS5Bcb6IZTZj5pU+syEYNV8XzA2Y6lOCptyhGbDeDFPnJa6TlGZ5rxJ/nxkSRPCACR5EUyHf4sCNjOgENVn/ecVe+CEy8vLWgJmZ2fd1IRra2vxSbe5eYlmu1gsXo6zmZycTKcpkEn6vC61kM+FQYiUeDdvauP5Ay0ZjyIlgKVv9bVkiBwQVJRX2YwWkKLxrhxB+qYSPaxUKrESANHVrh2PlQAzqSbskAA6UkkA5B0SICvRSzb5ddrMWu4jh8umSLwckLVjSKClWJ6SwsrM76fwLpCAM4x1I9OGjhrN8+AkAyYSyGTDnhEHjCPxeYhBagmIIvtXJOBQkgSY5Z01/76umAy4lbpiG5IqzQuG6Alz9LLmf+IP5hh+AfmxnoSQdUgAg5a6JuuQgMiSFi7fJHkR9JQAbGbA/SoBi4uLWgLK5XIqCdBpkyQBZne3sTm4BGxsbLQlgM+DkYBsNjucyWQKaSXATvCuZFnWHIQqlxMVUOeMx/0RMsgBWgIgcyBVgqwwIwH0JUvAwsJChwQwuOQ4jrJtO/CsfQBc11We56lWqyXfOySALNgJdlmuWzNSB/P5vBKyyJnxMjxBs9mc2tvbEye+DN1l7uYhuaZvAXg1LaQyOOkRL3d3d8XLishHOEd1DMfHx7UEYLjCrCop2aXP2Mht4QxjoyWADi0BxGddZm80GjpWYSL5TfpkYnHAOBK/yxhoCZAl1et1PbharWrUajX9m/SJBESRJUlAr6fvW0CvZyyxOIQPN4kbnv1mlwQERGPhMbHli/Q5Yv5lSdDnSYelrlLWIQGRJS1cvjk1RdBTArCZAferBPT7IkjvcuP7t3pKADaxEpB5+r10FXv3x3kKqqUlgM+DkQB76OFhKzdycAnAo5KynTlraFTZQ4/gqH3ursd9EjLIAVoC7KGCAxFWNqSjWgLoS5aAfS+C7EzJcrLKOjSkrNwoFu0ToPz6n8pv3dFQXjPyRdA9CbDsk/ZDx5SQxWiAsg4X7vE361NedQsn/P0SELwIgmzaHiZMtpMcKK+pWlUuVF6j0v0iSMcw/+QFLQF+y13xbv/GpF4CWUt5tV+FTEsAY6MlgA4tASxlnaUo362yLGLlh2Lo1iCjj4nFAeNI/H9sDHbYxesEfcK//XvSoq9Fkf0/JCDqDWfV3I+TJGCLne19CzAvgtoS8OBF0APC6OdvAQYAj2xzC/IfXBsAAAAASUVORK5CYII=');
    background-position:left -2px;
    display:block;
    width:20px;
    height:16px;
    line-height:16px;
    float:left;
    cursor: pointer;
    zoom:1;
}

.fullStar{
    background-position:left -59px;
}

.stars{
    overflow: hidden;
}

.tmp_es{
    background-position:left -21px;
}

.tmp_fs{
    background-position:left -40px;
}
</style>
<script>
    $(document).ready(function () {
        $(".frmcomment").hide();
        $(".cmtr").click(function () {
            $(".frmcomment").hide();
            var id_content = $(this).attr("id_content");
            var id_comment = $(this).attr("id_comment");
            $("#id_comment").val(id_comment);
            $("#id_content").val(id_content);
            $(this).parents(".comment-body").append($(".frmcomment"));
            $(".frmcomment").slideDown();
            $(".frmcomment").show();
        })
    });
    $("#send").on('click', function () {
        var name = $("#fullname").val();
        var id = $("#id_sanpham").val();
        var email = $("#email_contact").val();
        var content = $("#contentRating").val();
        var userid = "-1";
        var username = "";
        var ipar = "-1";
        var rate = $("#voterating").val();
        if (name.length == 0) {
            $(".commentmess").html("<span style='color:#f00'>Xin mời nhập họ tên</span>");
            return;
        }
        if (email.length == 0) {
            $(".commentmess").html("<span style='color:#f00'>Xin mời nhập email</span>");
            return;
        }
        if (content.length == 0) {
            $(".commentmess").html("<span style='color:#f00'>Xin mời nhập nội dung</span>");
            return;
        }
        $.ajax({
            type: "POST",
            url: "/webservices/srv.asmx/SendRate",
            data: "{ ipar: '" + ipar + "', id: '" + id + "',userid: '" + userid + "',username: '" + username + "',name: '" + name + "',email: '" + email + "',content: '" + content + "',rate: '" + rate + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {

                if (data.d == "1") {
                    $(".commentmess").html("<span style='color:#06f'>Nhận xét đã được gửi thành công</span>");
                    $("#fullname").val("");
                    $("#email_contact").val("");
                    $("#contentRating").val("");
                }
            },
            error: function (data) {
            }
        });
    });
</script>


    </div></section>
  
  
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/pages/product/detail.blade.php ENDPATH**/ ?>