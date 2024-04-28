

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
                <h3 class="box-title"><?php echo app('translator')->get('create_form'); ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Tên tiêu đề'); ?> <small class="text-red">*</small></label>
                            <input type="text" class="form-control" name="title" placeholder="Tên tiêu đề"
                                value="<?php echo e(old('title')); ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Tìm kiếm theo'); ?> <small class="text-red">*</small></label>
                            <select name="group_id" id="" class="form-control select2" style="width: 100%">
                                <option value="">Vui lòng chọn</option>
                                <?php $__currentLoopData = $searchGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Danh mục'); ?> <small class="text-red">*</small></label>
                            <select name="taxonomy[]" id="" multiple="multiple" class="form-control select2"
                                style="width: 100%">
                                <option value="">Vui lòng chọn</option>
                                <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                        <i class="fa fa-bars"></i> <?php echo app('translator')->get('list'); ?>
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-floppy-o"></i>
                        <?php echo app('translator')->get('save'); ?></button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u745771642/domains/bibomart.thanhphung.com/public_html/resources/views/admin/pages/search_detail/create.blade.php ENDPATH**/ ?>