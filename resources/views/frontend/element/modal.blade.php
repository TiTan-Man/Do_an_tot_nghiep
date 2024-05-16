<div class="modal modal-login fade" id="postnewModal" tabindex="-1" role="dialog" aria-labelledby="postnewModalModalLabel" aria-hidden="true">
	<form id="ps_form" class="form-horizontal fv-form fv-form-bootstrap" action="{{ route('frontend.post.addnew') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="loginModalLabel">Đăng bài viết</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="content"><i class="fal fa-tag mr-2"></i>Tiêu đề</label>
						<input type="text" name="title" class="form-control" required maxlength="255" placeholder="Nhập tiêu đề bài viết" style="border: 1px solid #ccc; border-radius: 8px;" />
					</div>
					<div class="form-group">
						<label for="content"><i class="fal fa-envelope mr-2"></i>Nội dung</label>
						<textarea rows="5" id="content" name="content" class="form-control" data-fv-field="content" required maxlength="5000" ></textarea>
					</div>
					<div class="form-group avatar">
						<label>Ảnh bài viết</label>
						<input type="file" name="image" accept="image/jpg,image/png,image/jpeg" onchange="Images.UploadImage(this,'.listAvatar')" spellcheck="false">
						<div class="listAvatar"></div>
					</div>
					
					<div class="text-right">
						<input type="submit" name="btnLogin" value="Gửi đi" id="btnLogin" class="btn btn-primary" spellcheck="false">
					</div>

				</div>
			</div>
		</div>
	</form>
</div>

<div class="modal modal-login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<form action="{{ route('frontend.login.post') }}" method="post">
		@csrf
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					
				<div class="form-group">
					<a href="/introduction/dieu-khoan-chinh-sach.html?id=759" title="Điều khoản" class="text-primary" target="_blank">Điều khoản sử dụng</a> và <a href="/introduction/chinh-sach-bao-mat.html?id=760" title="Bảo mật" class="text-primary" target="_blank">Chính sách bảo mật</a>
				</div>
				<hr>
				<div class="form-group form-button">
					<div class="btn-wrap">
						<div class="text">
							<i class="fab fa-facebook-square"></i>
						</div>
						<a href="{{ route('login.facebook') }}" class="btn btn-primary btnLoginWithFacebook">Đăng nhập Facebook</a>
					</div>
					<div class="btn-wrap">
						<div class="text">
							<i class="fab fa-google"></i>
						</div>
						<a href="{{ route('login.google') }}" class="btn btn-danger btnLoginWithGoogle">Đăng nhập Google</a>
					</div>
				</div>
				<hr>
				<p class="text">Hoặc đăng nhập qua</p>
				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fal fa-envelope mr-2"></i>Email</label>
					<input name="email" type="text" id="ucLogin1_ucLoginCommon1_txtEmail" class="form-control rounded border-primary" placeholder="Email" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1"><i class="fal fa-key mr-2"></i>Password</label>
					<input name="password" type="password" id="ucLogin1_ucLoginCommon1_txtPassword" class="form-control rounded border-primary" placeholder="Mật khẩu" spellcheck="false">
				</div>

				<div class="text-right">
					<a href="#" class="btn btn-link" title="Quên mật khẩu">Quên mật khẩu</a>
					<a href="javascript:void(0)" class="btn btn-link" title="Đăng ký thành viên" id="aRegister">Đăng ký</a>
					<input type="submit" name="btnLogin" value="Đăng nhập"  id="btnLogin" class="btn btn-primary" spellcheck="false">
				</div>

				<script>
					function ValidateLogin() {
						var email = $("#ucLogin1_ucLoginCommon1_txtEmail").val();
						var pass = $("#ucLogin1_ucLoginCommon1_txtPassword").val();
						if (isBlank(email)) {
							alert("Nhập email"); return false;
						}
						if (isBlank(pass)) {
							alert("Nhập mật khẩu"); return false;
						}
					}
					$(function () {
						$("#aRegister").click(function () {
							$("#loginModal").modal('hide');
							$("#registerModal").modal('show');
						});
					});
				</script>

				</div>
			</div>
		</div>
	</form>
</div>
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
	toolbar: [
		{ name: 'document', items: [ 'Source', '-','Bold', 'Italic','-', 'Templates','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-','Link', 'Unlink','Table','NumberedList', 'BulletedList','-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
		
	]
});
</script>

				
<div class="modal modal-login fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	<form action="{{ route('frontend.register') }}" method="post">
	@csrf
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="registerModalLabel">Đăng ký</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<p>
					<em class="text-info">Điền tất cả các thông tin dưới đây để đăng ký thành viên</em>
				</p>
				<div class="form-group">
					<input name="TxtEmail" type="text" id="txtEmail" class="form-control rounded border-primary" placeholder="Email" autocomplete="off" required="required" spellcheck="false">
				</div>
				<div class="form-group">
					<input name="FullName" type="text" id="txtFullName" class="form-control rounded border-primary" placeholder="Họ tên" autocomplete="off" required="required" spellcheck="false">
				</div>
				<div class="form-group">
					<input name="Password" type="password" id="txtPassword" class="form-control rounded border-primary" placeholder="Mật khẩu" spellcheck="false">
				</div>
				<div class="form-group">
					<input name="RePassword" type="password" id="txtRePassword" class="form-control rounded border-primary" placeholder="Nhập lại mật khẩu" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="rdoSex">Giới tính</label>
					<select name="Sex" id="rptSex">
						<option value="0">Nam</option>
						<option value="1">Nữ</option>
						<option value="2">Khác</option>

					</select>
				</div>
				<div class="form-group">
					<input name="DateOfBirth" type="date" id="txtDateOfBirth" class="form-control rounded border-primary" placeholder="Ngày sinh: ngày/tháng/năm" autocomplete="off" required="required" spellcheck="false">
				</div>
				<div class="form-group">
					<input name="Phone" type="tel" id="txtPhone" class="form-control rounded border-primary" placeholder="Điện thoại" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<input type="checkbox" id="checkTermOfUser" name="checkTermOfUser" spellcheck="false">
					<label for="checkTermOfUser">Tôi đồng ý với <a href="/introduction/dieu-khoan-su-dung.html?id=623" title="Điều khoản" class="text-primary" target="_blank">Điều khoản</a> và <a href="/introduction/chinh-sach-bao-mat.html?id=624" title="Bảo mật" class="text-primary" target="_blank">Bảo mật</a></label>
				</div>
				<div class="text-right">
					<input type="submit" name="tnRegister" value="Đăng ký" onclick="return ValidateRegister();" id="btnRegister" class="btn btn-primary" spellcheck="false">
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
<script>
	function validateEmail(email) {
		const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(String(email).toLowerCase());
	}
	function ValidateRegister() {

		var email = $("#txtEmail").val();
		var nickName = $("#txtNickName").val();
		if (isBlank(email)) {
			alert("Nhập email");
			return false;
		}
		if (!validateEmail(email)) {
			alert("Email không hợp lệ");
			return false;
		}
		if (isBlank(nickName)) {
			alert("Nhập Nickname");
			return false;
		}
		if (isBlank($("#txtPassword").val())) {
			alert("Nhập mật khẩu");
			return false;
		}

		if ($("#txtPassword").val() != $("#txtRePassword").val()) {
			alert("Mật khẩu không khớp");
			return false;
		}

		if (isBlank($("#txtDateOfBirth").val())) {
			alert("Nhập ngày tháng năm sinh");
			return false;
		}

		if (isBlank($("#txtPhone").val())) {
			alert("Nhập số điện thoại");
			return false;
		}
		
		if ($("#checkTermOfUser:checked").length == 0) {
			alert("Bạn cần đồng ý với các điều khoản của chúng tôi");
			return false;
		}
		
		return true;
	}
	$(function () {
		$("#registerModal input[type='text']").attr('required', 'required');
		var msgRegister = "";
		if (msgRegister !== "") {
			alert(msgRegister);
		}
	});
</script>