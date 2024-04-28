

<?php $__env->startSection('title'); ?>
<?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo e($module_name); ?>

  </h1>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Main content -->
<section class="content">
  
  <div class="box box-default">

    <div class="box-header with-border">
      <h3 class="box-title"><?php echo app('translator')->get('Filter'); ?></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <form action="<?php echo e(route(Request::segment(2) . '.index')); ?>" method="GET">
      <div class="box-body">
        <div class="row">
          
          <div class="col-md-4">
            <div class="form-group">
              <label>Từ khóa</label>
              <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('Nhập từ khóa bài viết'); ?>"
                value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label><?php echo app('translator')->get('Filter'); ?></label>
              <div>
                <button type="submit" class="btn btn-primary btn-sm mr-10"><?php echo app('translator')->get('Submit'); ?></button>
                <a class="btn btn-default btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                  <?php echo app('translator')->get('Reset'); ?>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </form>
  </div>
  

  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo app('translator')->get('Danh sách bình luận'); ?></h3>
    </div>

    <div class="box-body table-responsive">
      <?php if(session('errorMessage')): ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('errorMessage')); ?>

      </div>
      <?php endif; ?>
      <?php if(session('successMessage')): ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('successMessage')); ?>

      </div>
      <?php endif; ?>

      <?php if($errors->any()): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
      <?php endif; ?>
      <?php if(count($rows) == 0): ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo app('translator')->get('No record found'); ?>
      </div>
      <?php else: ?>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th><?php echo app('translator')->get('STT'); ?></th>
            <th><?php echo app('translator')->get('Bài viết'); ?></th>
            <th><?php echo app('translator')->get('Người thao tác'); ?></th>
            <th><?php echo app('translator')->get('Ngày thao tác'); ?></th>
            <th><?php echo app('translator')->get('Action'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="valign-middle">
              <td class="text-center">
                <?php echo e($stt+1); ?>

              </td>
              <td>
                <a href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>"> <?php echo e($row->title); ?></a>
              </td>
              <td>
                <?php echo e($row->admins_name); ?>

              </td>
              <td>
                <?php echo e($row->updated_at); ?>

              </td>
              <td>
                <?php echo e($row->action); ?>

              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <?php endif; ?>
    </div>
    <?php if($rows->hasPages()): ?>
    <div class="box-footer clearfix">
      <?php echo e($rows->withQueryString()->links('admin.pagination.default')); ?>

    </div>
    <?php endif; ?>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/admin/pages/history/index.blade.php ENDPATH**/ ?>