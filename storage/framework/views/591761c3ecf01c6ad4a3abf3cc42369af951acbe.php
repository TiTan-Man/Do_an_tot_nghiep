<div class="col-md-3 hidden-xs hidden-sm" id="column_left">
    <div class="hst fadeIn">
        <section class="box-category">
            <div class="heading">
                <span>Danh mục bệnh lý</span>
            </div>
            <div class="list-group panelvmenu">
				<?php foreach($taxonomy_all as $taxonomy){
					$hienthi = trim($taxonomy->hienthi,';');
					$vitrihienthi = explode(';',$hienthi); // chuyển về mảng
					if(in_array(1,$vitrihienthi)){?>
					<a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html" class="list-group-item-vmenu" title="<?php echo e($taxonomy->title); ?>"><?php echo e($taxonomy->title); ?></a>
				<?php } } ?>
            </div>
        </section>
    </div>
    <div class="hst fadeIn">
        <div class="box">
            <div class="box-heading  text-center">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="strip-line"></div>
            <div class="box-content">
                <div class="hidden-xs hidden-sm">
                    <p class="text-center">
                        Nhập email của bạn và đăng ký 
                        để nhận bản tin của chúng tôi.
                    </p>
                    <div class="subcrise">
 
                        <input placeholder="Nhập địa chỉ mail" class="txtmail" name="email" id="email" type="text"><br>
                        <div onclick="checkemail();" class="button-send">
                            <i class="fa fa-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkemail() {

        var email = jQuery('#email').val();

        if (validateEmail(email)==false) {
            alert('Vui lòng nhập Email');
            jQuery('#email').focus();
            return;
        }

        jQuery.ajax({
            type: "POST",
            url: "",
            data: "{email1: '" + email + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                if (data.d == "1") {
                    alert("Đăng ký thành công");
                    jQuery('#email').val("");
                }

                else {
                    jQuery("#widget-subscribe-form-result1").html("Vui lòng nhập đầy đủ thông tin");
                }
            },
            error: function (data) {
            }
        })
    }
	function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}
</script><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/frontend/element/menuleft.blade.php ENDPATH**/ ?>