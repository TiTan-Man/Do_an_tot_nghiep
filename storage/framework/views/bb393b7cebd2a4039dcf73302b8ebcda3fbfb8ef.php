

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Quản lý đơn hàng
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
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
    <div class="row">
      <div class="col-md-5">
        <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="profile-username"><?php echo app('translator')->get('Đơn hàng số'); ?> #<?php echo e($detail->id); ?></h3>
              <p class="text-muted"><?php echo e(__('Created at')); ?>: <?php echo e($detail->created_at); ?></p>
            </div>
            <div class="box-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Họ và tên'); ?>:</label>
                  <label class="col-sm-9 col-xs-12"><?php echo e($detail->name ?? ''); ?></label>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Email'); ?>:</label>
                  <label class="col-sm-9 col-xs-12">
                    <?php echo e($detail->email ?? ''); ?>

                  </label>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('SĐT'); ?>:</label>
                  <label class="col-sm-9 col-xs-12">
                    <?php echo e($detail->phone ?? ''); ?>

                  </label>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Địa chỉ'); ?>:</label>
                  <label class="col-sm-9 col-xs-12"><?php echo e($detail->address ?? ''); ?></label>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Ghi chú'); ?>:</label>
                  <label class="col-sm-9 col-xs-12"><?php echo e($detail->customer_note ?? ''); ?></label>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Trạng thái'); ?>:</label>
                  <div class="col-sm-9 col-xs-12 ">
                    <?php $__currentLoopData = App\Consts::ORDER_DETAIL_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <label>
                        <input type="radio" name="status" value="<?php echo e($key); ?>"
                          <?php echo e($detail->status == $key ? 'checked' : ''); ?>>
                        <small class="mr-15"><?php echo e(__($value)); ?></small>
                      </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Admin ghi chú'); ?>:</label>
                  <div class="col-md-9 col-xs-12">
                    <textarea name="admin_note" class="form-control" rows="5"><?php echo e($detail->admin_note ?? old('admin_note')); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
              </a>
              <button type="submit" class="btn btn-primary pull-right btn-sm">
                <i class="fa fa-floppy-o"></i>
                <?php echo app('translator')->get('Save'); ?>
              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-7">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo app('translator')->get('Chi tiết đơn hàng'); ?></h3>
          </div>

          <div class="box-body">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th><?php echo app('translator')->get('STT'); ?></th>
                  <th><?php echo app('translator')->get('Sản phẩm'); ?></th>
                  <th><?php echo app('translator')->get('Giá'); ?></th>
                  <th><?php echo app('translator')->get('Size'); ?></th>
                  <th><?php echo app('translator')->get('Số lượng'); ?></th>
                  <th><?php echo app('translator')->get('Tổng tiền'); ?></th>
                  <th><?php echo app('translator')->get('Action'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $alias_detail = Str::slug($row->post_title);
                    $url_link = route('frontend.cms.product', ['alias_category' => 'chi-tiet', 'alias_detail' => $alias_detail]) . '.html?id=' . $row->id;
                  ?>
                  <form action="<?php echo e(route('order_details.update', $row->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <tr class="valign-middle">
                      <td>
                        <?php echo e($loop->index + 1); ?>

                      </td>
                      <td>
                        <a href="<?php echo e($url_link); ?>" target="_blank">
                          <img src="<?php echo e($row->image_thumb ?? $row->image); ?>" style="height:100px">
                          <?php echo e($row->post_title); ?>

                        </a>
                      </td>
                      <td>
                        <input class="form-control" name="price" type="number" value="<?php echo e($row->price); ?>" min="0"
                          onchange="this.form.submit();">
                      </td>
                      <td>
                        <input class="form-control" type="number" name="quantity" value="<?php echo e($row->quantity); ?>" min="1"
                          onchange="this.form.submit();">
                      </td>
                      <td>
                        <?php echo e(number_format($row->price * $row->quantity)); ?>

                      </td>
                      <td>
                        <button class="btn btn-sm btn-danger remove-order-detail" type="button" data-toggle="tooltip"
                          title="<?php echo app('translator')->get('Delete'); ?>" data-original-title="<?php echo app('translator')->get('Delete'); ?>"
                          data-id="<?php echo e($row->id); ?>">
                          <i class="fa fa-trash"></i>
                        </button>
                        <input class="hidden" type="submit">
                      </td>
                    </tr>
                  </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script>
    $(function() {
      $(".remove-order-detail").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.attr("data-id");
        if (confirm("<?php echo e(__('Are you sure want to remove?')); ?>")) {
          $.ajax({
            url: '<?php echo e(route('order_details.destroy')); ?>',
            method: "DELETE",
            data: {
              _token: '<?php echo e(csrf_token()); ?>',
              id: ele.attr("data-id")
            },
            success: function(response) {
              window.location.reload();
            }
          });
        }
      });

    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/admin/pages/orders/order_product_show.blade.php ENDPATH**/ ?>