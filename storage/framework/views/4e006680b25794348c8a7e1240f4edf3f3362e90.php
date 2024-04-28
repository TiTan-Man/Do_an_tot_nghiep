<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn" class="responsive">

<head>
    <?php
        $seo_title = $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''));
        $seo_keyword = $seo_keyword ?? ($page->keyword ?? ($web_information->information->seo_keyword ?? ''));
        $seo_description =
            $seo_description ?? ($page->description ?? ($web_information->information->seo_description ?? ''));
        $seo_image = $seo_image ?? ($page->json_params->og_image ?? ($web_information->image->seo_og_image ?? ''));
    ?>
    <title><?php echo e($seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''))); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="copyright" content="Copyright" />
    <meta name="description" content="<?php echo e($seo_description); ?>" />
    <meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
    <meta name="DC.title" content="<?php echo e($seo_title); ?>" />
    <meta property="og:type" name="ogtype" content="Website" />
    <meta property="og:title" name="ogtitle" content="<?php echo e($seo_title); ?>" />
    <meta property="og:description" name="ogdescription" content="<?php echo e($seo_description); ?>" />
    <meta property="og:image" name="ogimage" content="<?php echo e($seo_image); ?>" />
    <meta property="og:sitename" content="<?php echo e(Request::fullUrl()); ?>" />
    <link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>" />
    <link rel="shortcut icon" type="image/png" href="<?php echo e($web_information->image->favicon ?? ''); ?>" />

    <link href="//fonts.googleapis.com/css?family=Open+Sans:800,700,600,500,400,300" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script type="text/javascript">
        var responsive_design = 'yes';
    </script>

    <?php echo $web_information->source_code->css; ?>


    <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body class="common-home">
    <div class="standard-body">
        <div id="main" class=" header-type-2">
            <?php echo $__env->make('frontend.element.menumain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>

            <script src="//theme.hstatic.net/200000381339/1001207774/14/flashsale.js?v=15" defer=""></script>
            <link rel="stylesheet" href="//theme.hstatic.net/200000381339/1001207774/14/sales-pop.css?v=15"
                media="all" onload="this.media='all'">

            <noscript>
                <link href='//theme.hstatic.net/200000381339/1001207774/14/sales-pop.css?v=15' rel='stylesheet'
                    type='text/css' media='all' />
            </noscript>

            <div id="ega-sale-pop" class="sales-pop">
                <div class="sale-pop-wrap">
                    <div class="sale-pop-img">
                        <img src="" class="img-fluid" loading="lazy" alt="undefined" width="80"
                            height="80">
                    </div>
                    <div class="sale-pop-body">
                        <div class="sale-pop-name">
                            <a href="#"></a>
                        </div>
                        <span class="sale-pop-desc"></span>
                    </div>
                </div>
                <div class="sale-pop-close">
                    <i class="fa fa-times"></i>
                </div>
            </div>

			<?php echo $__env->make('frontend.element.menu_mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.element.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <script type="text/javascript" src="<?php echo e(asset('themes/frontend/js/megamenu.js')); ?>"></script>
        </div>
        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
    </div>

    <script>
        function addToCart(id) {
            var f = "?id=" + id;
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

    <script type="text/javascript">
        (function(d, t, e, m) {

            // Async Rating-Widget initialization.
            window.RW_Async_Init = function() {

                RW.init({
                    huid: "392948",
                    uid: "3768769aded960b7965283c71d5424f2",
                    options: {
                        "style": "oxygen"
                    }
                });
                RW.render();
            };
            // Append Rating-Widget JavaScript library.
            var rw, s = d.getElementsByTagName(e)[0],
                id = "rw-js",
                l = d.location,
                ck = "Y" + t.getFullYear() +
                "M" + t.getMonth() + "D" + t.getDate(),
                p = l.protocol,
                f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
                a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
            if (d.getElementById(id)) return;
            rw = d.createElement(e);
            rw.id = id;
            rw.async = true;
            rw.type = "text/javascript";
            rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
            s.parentNode.insertBefore(rw, s);
        }(document, new Date(), "script", "rating-widget.com/"));
    </script>
    <?php echo $web_information->source_code->javascript; ?>

</body>

</html>
<?php /**PATH /home/u745771642/domains/bibomart.thanhphung.com/public_html/resources/views/frontend/layouts/default.blade.php ENDPATH**/ ?>