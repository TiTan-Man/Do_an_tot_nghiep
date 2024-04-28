

<?php $__env->startSection('title'); ?>
<?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo e($module_name); ?>

    <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2).'.create')); ?>"><i
        class="fa fa-plus"></i> <?php echo app('translator')->get('add_new'); ?></a>
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

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo app('translator')->get('update_form'); ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?php echo e(route(Request::segment(2).'.update', $detail->id)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="box-body">

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#tab_1" data-toggle="tab">
                <h5>Thông tin chính <span class="text-danger">*</span></h5>
              </a></li>
            <li>
              <a href="#tab_2" data-toggle="tab">
                <h5>Menu truy cập</h5>
              </a></li>
            <button type="submit" class="btn btn-primary btn-sm pull-right">
              <i class="fa fa-floppy-o"></i>
              <?php echo app('translator')->get('save'); ?>
            </button>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <label><?php echo app('translator')->get('name'); ?> <small class="text-red">*</small></label>
                    <input type="text" class="form-control" name="name" placeholder="<?php echo app('translator')->get('name'); ?>"
                      value="<?php echo e($detail->name); ?>" required>
                  </div>

                  <div class="form-group">
                    <label><?php echo app('translator')->get('iorder'); ?></label>
                    <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('iorder'); ?>"
                      value="<?php echo e($detail->iorder); ?>">
                  </div>

                  <div class="form-group">
                    <label><?php echo app('translator')->get('status'); ?></label>
                    <div class="form-control">
                      <label>
                        <input type="radio" name="status" value="active"
                          <?php echo e(($detail->status == 'active') ? 'checked':''); ?>>
                        <small><?php echo app('translator')->get('active'); ?></small>
                      </label>
                      <label>
                        <input type="radio" name="status" value="deactive"
                          <?php echo e(($detail->status == 'deactive') ? 'checked':''); ?> class="ml-15">
                        <small><?php echo app('translator')->get('deactive'); ?></small>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">

                  <div class="form-group">
                    <label><?php echo app('translator')->get('description'); ?></label>
                    <textarea name="description" id="description" class="form-control"
                      rows="5"><?php echo e($detail->description); ?></textarea>
                  </div>

                </div>
              </div>

            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2">
              <div class="row">
                <?php if(count($activeMenus) == 0): ?>
                <div class="col-12">
                  <?php echo app('translator')->get('not_found'); ?>
                </div>
                <?php else: ?>
                <?php $__currentLoopData = $activeMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($row->parent_id == 0 || $row->parent_id == null): ?>
                <div class="col-md-6">
                  <ul class="checkbox_list">
                    <?php
                    $checked = '';
                    if (isset($detail->json_access->menu_id) && in_array($row->id, $detail->json_access->menu_id))
                    {
                      $checked = 'checked';
                    }
                    
                    $array_role_action = isset($check_action->json_action) ? (array)$check_action->json_action : '';
                    
                    $arrayRoleAction = array();
                    
                    if(isset($array_role_action[$row->id])){
                      $arrayRoleAction = $array_role_action[$row->id];
                    }else{
                      
                    }
                    
                    $check_index = $check_create = $check_update = $check_delete = $check_show = '';
                    foreach ($arrayRoleAction as $key => $acc_action) {
                      
                      if($acc_action == 'index'){
                        $check_index = 'checked';
                      }else if($acc_action == 'create'){
                        $check_create = 'checked';
                      }else if($acc_action == 'update'){
                        $check_update = 'checked';
                      }else if($acc_action == 'delete'){
                        $check_delete = 'checked';
                      }else if($acc_action == 'show'){
                        $check_show = 'checked';
                      }
                      
                    }

                    ///$check_index = $array_role_action[]

                    ?>

                    <li>
                      <input name="json_access[menu_id][]" type="checkbox" value="<?php echo e($row->id); ?>" onchange="checkAllRole(<?php echo e($row->id); ?>)" 
                        id="json_access_menu_id_<?php echo e($row->id); ?>" class="mr-15" <?php echo e($checked); ?>>
                      <label for="json_access_menu_id_<?php echo e($row->id); ?>"><strong><?php echo e($row->name); ?></strong></label>
                      <p class="ml-15 mb-0 check_action">
                        <input name="json_action[<?php echo e($row->id); ?>][]" type="checkbox" value="index"
                          class="check_action_<?php echo e($row->id); ?>" <?php echo e($check_index); ?>>
                        <label for="json_action_index_<?php echo e($row->id); ?>"><strong>Danh sách</strong></label>
                        <input name="json_action[<?php echo e($row->id); ?>][]" type="checkbox" value="create"
                          class="ml-15 check_action_<?php echo e($row->id); ?>" <?php echo e($check_create); ?>>
                        <label for="json_action_create_<?php echo e($row->id); ?>"><strong>Thêm mới</strong></label>
                        <input name="json_action[<?php echo e($row->id); ?>][]" type="checkbox" value="update"
                          class="ml-15 check_action_<?php echo e($row->id); ?>" <?php echo e($check_update); ?>>
                        <label for="json_action_update_<?php echo e($row->id); ?>"><strong>Cập nhật</strong></label>
                        <input name="json_action[<?php echo e($row->id); ?>][]" type="checkbox" value="delete"
                          class="ml-15 check_action_<?php echo e($row->id); ?>" <?php echo e($check_delete); ?>>
                        <label for="json_action_delete_<?php echo e($row->id); ?>"><strong>Xóa</strong></label>
                        <input name="json_action[<?php echo e($row->id); ?>][]" type="checkbox" value="show"
                          class="ml-15 check_action_<?php echo e($row->id); ?>" <?php echo e($check_show); ?>>
                        <label for="json_action_show_<?php echo e($row->id); ?>"><strong>Chi tiết</strong></label>
                      </p>
                    </li>

                    <?php $__currentLoopData = $activeMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($sub->parent_id == $row->id): ?>
                    <?php
                    $checked = '';
                    if (isset($detail->json_access->menu_id) && in_array($sub->id, $detail->json_access->menu_id))
                    {
                      $checked = 'checked';
                    }
                    
                    //$array_role_action =  (array)$check_action->json_action;
                    
                    if(isset($array_role_action[$sub->id])){
                      $arrayRoleAction = $array_role_action[$sub->id];
                    }else{
                      $arrayRoleAction = array();
                    }

                    $check_index = $check_create = $check_update = $check_delete = $check_show = '';
                    foreach ($arrayRoleAction as $key => $acc_action) {
                      if($acc_action == 'index'){
                        $check_index = 'checked';
                      }else if($acc_action == 'create'){
                        $check_create = 'checked';
                      }else if($acc_action == 'update'){
                        $check_update = 'checked';
                      }else if($acc_action == 'delete'){
                        $check_delete = 'checked';
                      }else if($acc_action == 'show'){
                        $check_show = 'checked';
                      }
                    }
                    ?>

                    <li>
                      <input name="json_access[menu_id][]" type="checkbox" value="<?php echo e($sub->id); ?>" onchange="checkAllRole(<?php echo e($sub->id); ?>)"
                        id="json_access_menu_id_<?php echo e($sub->id); ?>" class="mr-15" <?php echo e($checked); ?>>
                      <label for="json_access_menu_id_<?php echo e($sub->id); ?>">- - <?php echo e($sub->name); ?></label>
                      <p class="ml-15 mb-0 check_action">
                        <input name="json_action[<?php echo e($sub->id); ?>][]" type="checkbox" value="index"
                          class="check_action_<?php echo e($sub->id); ?>" <?php echo e($check_index); ?>>
                        <label for="json_action_index_<?php echo e($sub->id); ?>"><strong>Danh sách</strong></label>
                        <input name="json_action[<?php echo e($sub->id); ?>][]" type="checkbox" value="create"
                          class="ml-15 check_action_<?php echo e($sub->id); ?>" <?php echo e($check_create); ?>>
                        <label for="json_action_create_<?php echo e($sub->id); ?>"><strong>Thêm mới</strong></label>
                        <input name="json_action[<?php echo e($sub->id); ?>][]" type="checkbox" value="update"
                          class="ml-15 check_action_<?php echo e($sub->id); ?>" <?php echo e($check_update); ?>>
                        <label for="json_action_update_<?php echo e($sub->id); ?>"><strong>Cập nhật</strong></label>
                        <input name="json_action[<?php echo e($sub->id); ?>][]" type="checkbox" value="delete"
                          class="ml-15 check_action_<?php echo e($sub->id); ?>" <?php echo e($check_delete); ?>>
                        <label for="json_action_delete_<?php echo e($sub->id); ?>"><strong>Xóa</strong></label>
                        <input name="json_action[<?php echo e($sub->id); ?>][]" type="checkbox" value="show"
                          class="ml-15 check_action_<?php echo e($sub->id); ?>" <?php echo e($check_show); ?>>
                        <label for="json_action_show_<?php echo e($sub->id); ?>"><strong>Chi tiết</strong></label>
                      </p>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </ul>
                </div>
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

              </div>

            </div><!-- /.tab-pane -->
            
          </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2).'.index')); ?>">
          <i class="fa fa-bars"></i> <?php echo app('translator')->get('list'); ?>
        </a>
        <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
          <?php echo app('translator')->get('save'); ?></button>
      </div>
    </form>
  </div>
</section>
<script>

function checkAllRole(id){
  var menu_id = $('#json_access_menu_id_'+id+':checked').val();
  if(menu_id > 0){
    $('.check_action_'+id).prop('checked',true);
  }else{
    $('.check_action_'+id).prop('checked',false);
  }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/admin/pages/roles/edit.blade.php ENDPATH**/ ?>