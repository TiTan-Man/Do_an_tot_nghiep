<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/settings.css')); ?>" property='stylesheet' />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/static-captions.css')); ?>" property='stylesheet' />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/dynamic-captions.css')); ?>" property='stylesheet' />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/captions.css')); ?>" property='stylesheet' />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/duocpham/css/slider.css')); ?>" property='stylesheet' />
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/jquery.themepunch.tools.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/frontend/duocpham/js/jquery.themepunch.revolution.min.js')); ?>"></script>
	
<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin: 0px auto; background-color: #E9E9E9; padding: 0px; margin-top: 0px; margin-bottom: 0px; max-height: 500px;">
    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display: none; max-height: 500px; height: 500px;">
        <ul>
			<?php $__currentLoopData = $blocksContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($banner->block_code == 'banner'): ?>
			<li data-transition="random" data-slotamount="7" data-masterspeed="300" data-link="" data-saveperformance="off">
				<img src="<?php echo e($banner->image); ?>" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
			</li>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
    </div>

    <script type="text/javascript">
        var setREVStartSize = function () {
            var tpopt = new Object();
            tpopt.startwidth = 960;
            tpopt.startheight = 500;
            tpopt.container = jQuery('#rev_slider_1_1');
            tpopt.fullScreen = "off";
            tpopt.forceFullWidth = "off";

            tpopt.container.closest(".rev_slider_wrapper").css({ height: tpopt.container.height() }); tpopt.width = parseInt(tpopt.container.width(), 0); tpopt.height = parseInt(tpopt.container.height(), 0); tpopt.bw = tpopt.width / tpopt.startwidth; tpopt.bh = tpopt.height / tpopt.startheight; if (tpopt.bh > tpopt.bw) tpopt.bh = tpopt.bw; if (tpopt.bh < tpopt.bw) tpopt.bw = tpopt.bh; if (tpopt.bw < tpopt.bh) tpopt.bh = tpopt.bw; if (tpopt.bh > 1) { tpopt.bw = 1; tpopt.bh = 1 } if (tpopt.bw > 1) { tpopt.bw = 1; tpopt.bh = 1 } tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth)); if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on") tpopt.height = tpopt.startheight; if (tpopt.fullScreen == "on") { tpopt.height = tpopt.bw * tpopt.startheight; var cow = tpopt.container.parent().width(); var coh = jQuery(window).height(); if (tpopt.fullScreenOffsetContainer != undefined) { try { var offcontainers = tpopt.fullScreenOffsetContainer.split(","); jQuery.each(offcontainers, function (e, t) { coh = coh - jQuery(t).outerHeight(true); if (coh < tpopt.minFullScreenHeight) coh = tpopt.minFullScreenHeight }) } catch (e) { } } tpopt.container.parent().height(coh); tpopt.container.height(coh); tpopt.container.closest(".rev_slider_wrapper").height(coh); tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh); tpopt.container.css({ height: "100%" }); tpopt.height = coh; } else { tpopt.container.height(tpopt.height); tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height); tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height); }
        };

        setREVStartSize();
        var tpj = jQuery;
        var revapi1;
        tpj(document).ready(function () {
            if (tpj('#rev_slider_1_1').revolution == undefined)
                revslider_showDoubleJqueryError('#rev_slider_1_1');
            else
                revapi1 = tpj('#rev_slider_1_1').show().revolution(
                    {
                        dottedOverlay: "none",
                        delay: 4000,
                        startwidth: 960,
                        startheight: 500,
                        hideThumbs: 200,

                        thumbWidth: 100,
                        thumbHeight: 50,
                        thumbAmount: 4,


                        simplifyAll: "off",

                        navigationType: "bullet",
                        navigationArrows: "solo",
                        navigationStyle: "round",

                        touchenabled: "on",
                        onHoverStop: "on",
                        nextSlideOnWindowFocus: "off",

                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        drag_block_vertical: false,


                        panZoomDisableOnMobile: "on",

                        keyboardNavigation: "off",

                        navigationHAlign: "center",
                        navigationVAlign: "bottom",
                        navigationHOffset: 0,
                        navigationVOffset: 20,

                        soloArrowLeftHalign: "left",
                        soloArrowLeftValign: "center",
                        soloArrowLeftHOffset: 20,
                        soloArrowLeftVOffset: 0,

                        soloArrowRightHalign: "right",
                        soloArrowRightValign: "center",
                        soloArrowRightHOffset: 20,
                        soloArrowRightVOffset: 0,

                        shadow: 0,
                        fullWidth: "on",
                        fullScreen: "off",

                        spinner: "spinner0",

                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,

                        shuffle: "off",

                        autoHeight: "off",
                        forceFullWidth: "off",


                        hideTimerBar: "on",
                        hideThumbsOnMobile: "on",
                        hideBulletsOnMobile: "off",
                        hideArrowsOnMobile: "off",
                        hideThumbsUnderResolution: 0,

                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        startWithSlide: 0
                    });
        });
    </script>
</div><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/element/sidebar.blade.php ENDPATH**/ ?>