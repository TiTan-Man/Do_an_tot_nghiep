

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
                        <?php if(session('errorMessage')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('errorMessage')); ?>

                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <!-- Form Đăng nhập -->
                                <form action="<?php echo e(route('frontend.login.post')); ?>" method="POST" id="loginForm">
                                    <?php echo csrf_field(); ?>

                                    <h3 class="text-center mb-4">Đăng nhập</h3>
                                    <div class="form-group">
                                        <label for="loginEmail">Email</label>
                                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="loginPassword">Mật khẩu</label>
                                        <input type="password" class="form-control" id="loginPassword" name="password"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                    <p class="text-center mt-3">Chưa có tài khoản? <a href="#"
                                            id="showRegisterForm">Đăng ký ngay</a></p>
                                </form>

                                <!-- Form Đăng ký -->
                                <form action="<?php echo e(route('frontend.register.post')); ?>" method="POST"
                                    id="registerForm" style="display: none;">
                                    <?php echo csrf_field(); ?>

                                    <h3 class="text-center mb-4">Đăng ký</h3>
                                    <div class="form-group">
                                        <label for="registerName">Họ và tên</label>
                                        <input type="text" class="form-control" id="registerName" name="name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="registerEmail">Email</label>
                                        <input type="email" class="form-control" id="registerEmail" name="email"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="registerPassword">Mật khẩu</label>
                                        <input type="password" class="form-control" id="registerPassword" name="password"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Đăng ký</button>
                                    <p class="text-center mt-3">Đã có tài khoản? <a href="#" id="showLoginForm">Đăng
                                            nhập ngay</a></p>
                                </form>
                            </div>

                            <div class="col-md-6 offset-md-3">
                                <h3 style="text-align: center;">Hoặc</h3>

                                <div class="login-form">
                                    <a href="<?php echo e(route('login.facebook')); ?>" class="login-facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                        <span>Đăng nhập bằng Facebook</span>
                                    </a>

                                    <a href="<?php echo e(route('login.google')); ?>" class="login-google">
                                        <i class="fa-brands fa-google"></i>
                                        <span>Đăng nhập bằng Google</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        .btn:hover {
            opacity: 0.8 !important;
            background-color: #2368CF !important;
        }

        .login-form {
            flex-direction: column;
            display: flex;
        }

        .login-facebook,
        .login-google {
            padding: 10px 10px;
            border-radius: 30px;
            text-align: center;
            font-size: 18px;
            color: #fff;
        }

        .login-facebook:hover,
        .login-google:hover {
            cursor: pointer;
            color: #000;
        }

        .login-facebook {
            background-color: blue;
            margin: 20px;
        }

        .login-google {
            background-color: chocolate;
            margin: 0 20px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Ẩn form đăng ký khi tải trang
            $('#registerForm').hide();

            // Hiển thị form đăng ký khi click vào nút "Đăng ký ngay"
            $('#showRegisterForm').click(function(e) {
                e.preventDefault();
                $('#loginForm').hide();
                $('#registerForm').show();
            });

            // Hiển thị form đăng nhập khi click vào nút "Đăng nhập ngay"
            $('#showLoginForm').click(function(e) {
                e.preventDefault();
                $('#registerForm').hide();
                $('#loginForm').show();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/pages/user/login.blade.php ENDPATH**/ ?>