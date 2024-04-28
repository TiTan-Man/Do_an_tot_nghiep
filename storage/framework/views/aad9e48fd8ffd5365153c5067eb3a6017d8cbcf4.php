<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo e(route('admin.home')); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>XKT</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>ADMINISTRATOR</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->

    <a href="javascipt:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <?php $__currentLoopData = $accessMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($menu_top->is_check == 'active'): ?>
        <li class="hidden-xs">
          <a href="/admin/<?php echo e($menu_top->url_link); ?>"><i class="<?php echo e($menu_top->icon != '' ? $menu_top->icon : 'fa fa-angle-right'); ?>"></i> <span style="color: #ffdf28"><?php echo e($count_route[$menu_top->url_link] ?? ''); ?></span><br><span><?php echo e($menu_top->name); ?></span></a>
        </li>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i><br>
            <span class="hidden-xs">
              <?php echo e($admin_auth->name); ?>

            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <p>
                <?php echo e($admin_auth->name); ?>

                <small><?php echo e($admin_auth->email); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat"><?php echo app('translator')->get('Profile'); ?></a>
              </div>
              <div class="pull-right">
                <a href="<?php echo e(route('admin.logout')); ?>" class="btn btn-default btn-flat"><?php echo app('translator')->get('Logout'); ?></a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php /**PATH /home/vpnphaw80um5/public_html/resources/views/admin/panels/header.blade.php ENDPATH**/ ?>