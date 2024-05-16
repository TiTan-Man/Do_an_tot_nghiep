

<?php $__env->startSection('title'); ?>
    <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý đơn hàng
        </h1>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php
        $array_status = App\Consts::ORDER_DETAIL_STATUS;
    ?>

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
                                <label><?php echo app('translator')->get('Keyword'); ?> </label>
                                <input type="text" class="form-control" name="keyword"
                                    placeholder="<?php echo e(__('Fullname') . ', ' . __('Email') . ', ' . __('Phone') . '...'); ?>"
                                    value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Status'); ?></label>
                                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                                    <option value=""><?php echo app('translator')->get('Vui lòng chọn'); ?></option>
                                    <?php $__currentLoopData = App\Consts::ORDER_DETAIL_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php echo e(isset($params['status']) && $key == $params['status'] ? 'selected' : ''); ?>>
                                            <?php echo e(__($value)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('From date'); ?></label>
                                <input name="created_at_from" id="created_at_from" class="form-control datepicker"
                                    value="<?php echo e($params['created_at_from'] ?? ''); ?>" placeholder="<?php echo app('translator')->get('dd/mm/yyyy'); ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('To date'); ?></label>
                                <input name="created_at_to" id="created_at_to" class="form-control datepicker"
                                    value="<?php echo e($params['created_at_to'] ?? ''); ?>" placeholder="<?php echo app('translator')->get('dd/mm/yyyy'); ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Filter'); ?></label>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm"><?php echo app('translator')->get('Submit'); ?></button>
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
                <h3 class="box-title"><?php echo app('translator')->get('Danh sách đơn hàng'); ?></h3>
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
                        <?php echo app('translator')->get('not_found'); ?>
                    </div>
                <?php else: ?>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th><?php echo app('translator')->get('Họ tên'); ?></th>
                            
                                <th><?php echo app('translator')->get('Số điện thoại'); ?></th>
                                <th><?php echo app('translator')->get('Tên sp'); ?></th>
                                <th><?php echo app('translator')->get('Size'); ?></th>
                                <th><?php echo app('translator')->get('Số lượng'); ?></th>
                                <th><?php echo app('translator')->get('Tạm tính'); ?></th>
                                
                                <th><?php echo app('translator')->get('Ghi chú'); ?></th>
                                <th><?php echo app('translator')->get('Ngày tạo'); ?></th>
                                <th><?php echo app('translator')->get('Trạng thái'); ?></th>
                                <th><?php echo app('translator')->get('Thao tác'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php $__currentLoopData = $row->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>" method="POST"
                                        onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                        <tr class="valign-middle">
                                            <td>
                                                #<?php echo e($row->id); ?>

                                            </td>
                                            <td>
                                                <strong style="font-size: 14px;"><?php echo e($row->name); ?></strong>
                                            </td>
                                            
                                            <td>
                                                <?php echo e($row->phone); ?>

                                            </td>
                                            <td>
                                                <?php echo e($item->product->title); ?>

                                            </td>
                                            <td>
                                                <?php echo e($item->size); ?>

                                            </td>
                                            <td><?php echo e($item->quantity); ?></td>
                                            <td><?php echo e(number_format($item->quantity * $item->price)); ?></td>
                                            
                                            <td>
                                                <?php echo e(Str::limit($row->customer_note, 200)); ?>

                                            </td>
                                            
                                            <td>
                                                <?php echo e(isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('d/m/Y') : ''); ?>

                                            </td>
                                            <td>
                                                <select name="" class="form-control"
                                                    onchange="updateStatus(<?php echo e($item->id); ?>)"
                                                    id="update_status_<?php echo e($item->id); ?>">
                                                    <?php $__currentLoopData = $array_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"
                                                            <?php echo e($item->status == $key ? 'selected' : ''); ?>>
                                                            <?php echo e($status); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <img id="ic_loading_<?php echo e($item->id); ?>"
                                                    style="display: none;vertical-align: middle;" src="/images/load.gif"
                                                    width="20px">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                    title="<?php echo app('translator')->get('view'); ?>" data-original-title="<?php echo app('translator')->get('view'); ?>"
                                                    href="<?php echo e(route(Request::segment(2) . '.show', $row->id)); ?>">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip"
                                                    title="<?php echo app('translator')->get('delete'); ?>" data-original-title="<?php echo app('translator')->get('delete'); ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        Tìm thấy <?php echo e($rows->total()); ?> kết quả
                    </div>
                    <div class="col-sm-7">
                        <?php echo e($rows->withQueryString()->links('admin.pagination.default')); ?>

                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<script>
    function updateStatus(id) {
        var status = $('#update_status_' + id).val();
        $('#ic_loading_' + id).show();

        $.ajax({
            url: '<?php echo e(route('update_status.order_products')); ?>',
            type: 'POST',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                status: status,
                id: id
            },
            context: document.body
        }).done(function(data) {
            $('#ic_loading_' + id).hide();
        });
    }
</script>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/admin/pages/orders/order_product_list.blade.php ENDPATH**/ ?>