

<?php $__env->startSection('title'); ?>
<?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
    <?php echo e($module_name); ?>

  </h1>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/admin/pages/cms_posts/404.blade.php ENDPATH**/ ?>