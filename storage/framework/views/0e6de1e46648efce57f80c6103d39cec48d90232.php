<div class="menu-header display-mobile">
    <a href="/" class="menu-item" title="Trang chủ"><i class="fas fa-home"></i><span>Trang chủ</span></a>
    <a href="#" class="menu-item" onclick="toggleSubMenu(event)"><i class="fas fa-list"></i><span>Danh
            mục</span></a>
    <a href="/tin-tuc/ban-tin-khuyen-mai.html" class="menu-item"><i class="fas fa-tag"></i><span>Khuyến mãi</span></a>
    <a href="<?php echo e(route('frontend.order.cart')); ?>" class="menu-item"><i class="fas fa-shopping-cart"></i><span>Giỏ
            hàng</span></a>
    <?php if(Auth::check()): ?>
        <a href="#" class="menu-item" onclick="toggleMenuAccount(event)"><i
                class="fas fa-user"></i><span><?php echo e(auth()->user()->name); ?></span></a>
        <ul class="menu-account" id="menu-account">
            <a href="<?php echo e(route('frontend.order.tracking')); ?>">
                <li class="submenu-account">
                    Đơn hàng của tôi</li>
            </a>
            <a href="<?php echo e(route('frontend.logout')); ?>">
                <li class="submenu-account">
                    Đăng xuất</li>
            </a>
        </ul>
    <?php else: ?>
        <a href="<?php echo e(route('frontend.login')); ?>" class="menu-item"><i class="fas fa-user"></i><span>Tài khoản</span></a>
    <?php endif; ?>

    <ul class="submenu" id="submenu">
        <?php $__currentLoopData = $taxonomy_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($taxonomy->taxonomy == 'san-pham'): ?>
                <?php if($taxonomy->parent_id == null || $taxonomy->parent_id == ''): ?>
                    <li class="submenu-item" id="parent-menu-<?php echo e($taxonomy->id); ?>" data-menu-id="<?php echo e($taxonomy->id); ?>">
                        <a class="submenu-a">
                            <img src="<?php echo e($taxonomy->json_params->image_background); ?>" alt="">
                            <span><?php echo e($taxonomy->title); ?></span>
                        </a>
                        <ul class="child-menu" id="child-menu-<?php echo e($taxonomy->id); ?>">
                            <?php $__currentLoopData = $taxonomy_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sub_taxonomy->parent_id == $taxonomy->id): ?>
                                    <a href="/<?php echo e($sub_taxonomy->taxonomy); ?>/<?php echo e($sub_taxonomy->url_part); ?>.html"
                                        title="<?php echo e($sub_taxonomy->title); ?>">
                                        <li class="submenu-item-child">
                                            <?php echo e($sub_taxonomy->title); ?>

                                        </li>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

<style>
    @media (max-width: 480px) {
        .menu-header {
            display: flex;
            justify-content: space-between;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #126901;
            padding: 10px 0;
            text-align: center;
            z-index: 9999;
        }
    }

    @media (min-width: 481px) {
        .display-mobile {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .display-pc {
            display: none;
        }
    }

    .menu-item {
        display: flex;
        flex-direction: column;
        color: #ccc;
        text-decoration: none;
        margin: 0 10px;
    }

    .menu-item .fas {
        font-size: 20px;
    }

    .menu-item span {
        font-size: 11px;
    }

    /* .sub-menu {
        display: none;
        position: absolute;
        background-color: #333;
        width: 100%;
        text-align: center;
    }

    .menu-item:hover .sub-menu {
        display: block !important;
    }

    .sub-menu-item {
        display: block;
        color: #fff;
        text-decoration: none;
        padding: 5px 0;
    } */
</style>


<style>
    .submenu {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
        padding: 0;
        text-align: center;
        z-index: 9998;
        list-style: none;
        margin: 0;
        height: calc(100vh - 57px);
        overflow-y: auto;
    }

    .submenu-item {
        color: #fff;
        text-decoration: none;
        background-color: #ccc;
        padding: 10px 25px;
        width: 30%;
    }

    /* .submenu-item:hover {
        background-color: #126901;
    } */

    .submenu-item:hover .submenu-a span {
        color: #fff;
    }

    .submenu-a {
        color: #000;
    }

    .submenu-a img {
        width: 45px;
        height: 45px;
    }

    .child-menu {
        display: none;
        top: 0;
        right: 0;
        padding: 0;
        width: 68%;
        position: absolute;
        list-style: none;
        color: #000;
    }

    .submenu-item-child {
        text-align: start;
        padding: 15px 5px;
        border-bottom: 1px solid #ccc;
    }

    .show {
        display: block;
    }

    /* .active {
        background-color: #126901;
    } */

    .block {
        display: block;
    }
</style>


<style>
    .menu-account {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
        padding: 0;
        text-align: center;
        z-index: 9998;
        list-style: none;
        margin: 0;
        height: calc(100vh - 57px);
        overflow-y: auto;
    }

    .submenu-account {
        padding: 15px 0;
        background-color: #ccc;
        border: 1px solid #fff;
    }
</style>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    // nút danh mục
    function toggleSubMenu(event) {
        event.preventDefault();
        const submenu = document.getElementById("submenu");
        submenu.classList.toggle("show");
    }

    // nút tài khoản
    function toggleMenuAccount(event) {
        event.preventDefault();
        const submenu = document.getElementById("menu-account");
        submenu.classList.toggle("show");
    }
</script>




<script>
    document.addEventListener("DOMContentLoaded", function() {

        var menuItems = document.querySelectorAll('.submenu-item');
        var submenus = document.querySelectorAll('.child-menu');

        // Ẩn tất cả các menu con trừ menu con đầu tiên
        for (var i = 1; i < submenus.length; i++) {
            submenus[i].style.display = 'none';
        }

        submenus[0].style.display = 'block';
        menuItems[0].style.backgroundColor = '#126901';
        // menuItems[0].classList.add('active');


        // Thêm sự kiện click cho mỗi menu cha
        menuItems.forEach(function(menuItem) {
            menuItem.addEventListener('click', function() {
                menuItems.forEach(function(item) {
                    // item.classList.remove('active');
                    item.style.backgroundColor = '';
                });

                // this.classList.add('active');
                this.style.backgroundColor = '#126901';

                submenus.forEach(function(submenu) {
                    submenu.style.display = 'none';
                });

                var submenuId = this.getAttribute('data-menu-id');
                var submenu = document.getElementById('child-menu-' + submenuId);
                submenu.style.display = 'block';
            });
        });
    });
</script>
<?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/element/menu_mobile.blade.php ENDPATH**/ ?>