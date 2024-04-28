<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i>
        <?php echo app('translator')->get('add_new'); ?></a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php if(session('successMessage')): ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('successMessage')); ?>

      </div>
    <?php endif; ?>

    <?php if(session('errorMessage')): ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('errorMessage')); ?>

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

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo app('translator')->get('update_form'); ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $admin->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label><?php echo app('translator')->get('email'); ?> <small class="text-red">*</small></label>
              <input type="email" class="form-control" name="email" value="<?php echo e($admin->email); ?>" required>
            </div>
            <div class="form-group">
              <label><?php echo app('translator')->get('name'); ?> <small class="text-red">*</small></label>
              <input type="text" class="form-control" name="name" value="<?php echo e($admin->name); ?>" required>
            </div>

            <div class="form-group">
              <label><?php echo app('translator')->get('password'); ?> <small class="text-muted"><i>(Để trống nếu không muốn đổi mật khẩu
                    mới)</i></small></label>
              <input type="password" class="form-control" name="password_new" placeholder="Mật khẩu ít nhất 8 ký tự"
                value="" autocomplete="new-password">
            </div>

          </div>
          <div class="col-md-6">

            <div class="form-group">
              <label><?php echo app('translator')->get('role'); ?> <small class="text-red">*</small></label>
              <select name="role" id="role" class="form-control select2" required>
                <option value=""><?php echo app('translator')->get('please_chosen'); ?></option>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($item->id); ?>" <?php echo e($admin->role == $item->id ? 'selected' : ''); ?>>
                    <?php echo e($item->name); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>

            <div class="form-group">
              <label><?php echo app('translator')->get('status'); ?></label>
              <div class="form-control">
                <label>
                  <input type="radio" name="status" value="active" <?php echo e($admin->status == 'active' ? 'checked' : ''); ?>>
                  <small><?php echo app('translator')->get('active'); ?></small>
                </label>
                <label>
                  <input type="radio" name="status" value="deactive" class="ml-15"
                    <?php echo e($admin->status == 'deactive' ? 'checked' : ''); ?>>
                  <small><?php echo app('translator')->get('deactive'); ?></small>
                </label>
              </div>
            </div>
			<div class="form-group">
			  <label>Ảnh đại diện tác giả</label>
			  <div class="input-group">
				<span class="input-group-btn">
				  <a data-input="avatar" onclick="openPopupImg('avatar')" data-preview="image-holder" class="btn btn-primary lfm"
					data-type="cms-image">
					<i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
				  </a>
				</span>
				<input id="avatar" class="form-control" type="text" name="avatar" value="<?php echo e($admin->avatar); ?>"
				  placeholder="<?php echo app('translator')->get('image_link'); ?>...">
			  </div>
			  <div id="image-holder" style="margin-top:15px;max-height:100px;">
				<?php if($admin->avatar != ''): ?>
				<img id="view_avatar" style="height: 5rem;" src="<?php echo e($admin->avatar); ?>">
				<?php else: ?>
				<img id="view_avatar" style="height: 5rem;" src="">
				<?php endif; ?>
			  </div>
			</div>
          </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-sm btn-success" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i> <?php echo app('translator')->get('list'); ?>
          </a>
          <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('save'); ?></button>
        </div>
      </form>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/admin/pages/admins/edit.blade.php ENDPATH**/ ?>