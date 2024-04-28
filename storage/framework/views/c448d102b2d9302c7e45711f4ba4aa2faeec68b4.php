<?php $__env->startSection('title'); ?>
    <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e($module_name); ?>

            <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
                    class="fa fa-plus"></i>
                <?php echo app('translator')->get('add_new'); ?></a>
        </h1>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <form action="<?php echo e(route(Request::segment(2) . '.index')); ?>" method="GET">
                

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Keyword'); ?> </label>
                                <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('keyword_note'); ?>"
                                    value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tìm kiếm theo</label>
                                <select name="group_id" class="form-control select2">
                                    <option value="">-Vui lòng chọn-</option>
                                    <?php $__currentLoopData = $searchGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"
                                            <?php echo e((isset($params['group_id']) && $params['group_id']) == $item->id ? 'selected' : ''); ?>>
                                            <?php echo e($item->title); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="taxonomy" class="form-control select2">
                                    <option value="">-Vui lòng chọn-</option>
                                    <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"
                                            <?php echo e(isset($params['taxonomy']) && $params['taxonomy'] == $item->id ? 'selected' : ''); ?>>
                                            <?php echo e($item->title); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
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

            <div class="box">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="tab-pane active">

                            <?php if(session('errorMessage')): ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <?php echo e(session('errorMessage')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(session('successMessage')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <?php echo e(session('successMessage')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>

                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p><?php echo e($error); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(!$rows->total()): ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <?php echo app('translator')->get('not_found'); ?>
                                </div>
                            <?php else: ?>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Tìm kiếm theo</th>
                                            <th>Danh mục</th>
                                            <th><?php echo app('translator')->get('updated_at'); ?></th>
                                            <th><?php echo app('translator')->get('Thao tác'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>"
                                                method="POST" onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                                <tr class="valign-middle">
                                                    <td>
                                                        <?php echo e($stt + 1); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($row->title); ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                            foreach ($searchGroups as $key => $value) {
                                                                echo $value->id == $row->group_id ? $value->title : '';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            foreach ($taxonomys as $item) {
                                                                $array_taxonomy[$item->id] = $item->title;
                                                            }

                                                            $taxonomy = explode(',', trim($row->taxonomy, ','));
                                                            foreach ($taxonomy as $value) {
																if(isset($array_taxonomy[$value])){
																	echo $array_taxonomy[$value] . '<br>';
																}
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($row->updated_at); ?>

                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                            title="<?php echo app('translator')->get('update'); ?>"
                                                            data-original-title="<?php echo app('translator')->get('update'); ?>"
                                                            href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>">
                                                            <i class="fa fa-pencil-square-o"></i>
                                                        </a>
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button class="btn btn-sm btn-danger" type="submit"
                                                            data-toggle="tooltip" title="<?php echo app('translator')->get('delete'); ?>"
                                                            data-original-title="<?php echo app('translator')->get('delete'); ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if($rows->hasPages()): ?>
            <div class="box-footer clearfix">
                <?php echo e($rows->withQueryString()->links('admin.pagination.default')); ?>

            </div>
        <?php endif; ?>
        
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u745771642/domains/bibomart.thanhphung.com/public_html/resources/views/admin/pages/search_detail/index.blade.php ENDPATH**/ ?>