<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
    </h1>
  </section>
<?php $__env->stopSection(); ?>

<?php
$array_location = APP\Consts::POST_POSITION;
?>

<?php $__env->startSection('content'); ?>
<?php 
$array_category = array();
foreach ($parents as $item){
  $array_category[$item->id] = $item->title;
}
?>
  <!-- Main content -->
  <section class="content">
    
    <div class="box box-default">

      
      <form action="<?php echo e(route(Request::segment(2) . '.index')); ?>" method="GET">
        <input type="hidden" name="task" value="<?php echo e($_REQUEST['task']); ?>" />
        <div class="box-body">
          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Keyword'); ?> </label>
                <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('keyword_note'); ?>"
                  value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
              </div>
            </div>
            <?php if($hidden == 0): ?>
            <div class="col-md-2">
              <div class="form-group">
                <label>Tác giả</label>
                  <select name="admin_created_id" id="admin_created_id" class="form-control select2">
                    <option value="">-Chọn tác giả-</option>
                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($admin->id); ?>" <?php echo e(( isset($params['admin_created_id']) && $params['admin_created_id'] == $admin->id) ? 'selected' : ''); ?>><?php echo e($admin->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
            </div>
            <?php endif; ?>
            <div class="col-md-2">
              <div class="form-group">
                <label>Người duyệt</label>
                <select name="admin_updated_id" id="admin_updated_id" class="form-control select2">
                  <option value="">-Chọn tác giả-</option>
                  <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($admin->id); ?>" <?php echo e(( isset($params['admin_updated_id']) && $params['admin_updated_id'] == $admin->id) ? 'selected' : ''); ?>><?php echo e($admin->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Post category'); ?></label>
                <select name="taxonomy_id" id="taxonomy_id" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                  <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                      <option value="<?php echo e($item->id); ?>"
                        <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $item->id ? 'selected' : ''); ?>>
                        <?php echo e($item->title); ?></option>
                      <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->id == $sub->parent_id): ?>
                          <option value="<?php echo e($sub->id); ?>"
                            <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $sub->id ? 'selected' : ''); ?>>
                            - -
                            <?php echo e($sub->title); ?>

                          </option>
                          <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($sub->id == $sub_child->parent_id): ?>
                              <option value="<?php echo e($sub_child->id); ?>"
                                <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $sub_child->id ? 'selected' : ''); ?>>
                                - - - -
                                <?php echo e($sub_child->title); ?></option>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
      <div class="nav-tabs-custom">
      
      <div class="tab-content">
        <div class="tab-pane active">
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
                  <th><?php echo app('translator')->get('STT'); ?></th>
                  <th><?php echo app('translator')->get('Title'); ?></th>
                  <th><?php echo app('translator')->get('Người tạo'); ?></th>
                  <th><?php echo app('translator')->get('Cập nhật'); ?></th>
                  <th><?php echo app('translator')->get('Post category'); ?></th>
                  <th><?php echo app('translator')->get('Loại tin'); ?></th>
                  <th><?php echo app('translator')->get('Xuất bản'); ?></th>
                  <th width="120px"><?php echo app('translator')->get('Action'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($row->parent_id == 0 || $row->parent_id == null): ?>

                  <?php 
                  if(strtotime($row->aproved_date) > time()){
                    $class_e = 'post_waiting';
                  }else{
                    $class_e = '';
                  }
                  ?>
                    <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>" method="POST"
                      onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                      <tr class="valign-middle <?php echo e($class_e); ?>">
                        <td class="text-center">
                          <?php echo e($stt+1); ?>

                        </td>
                        <td>
                          <a href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>" style="font-size: 14px;"><?php echo e($row->title); ?></a>
                        </td>
                        <td>
                          <?php echo e($row->fullname); ?>

                        </td>
                        <td>
                          <?php echo e($row->admin_name); ?>

                        </td>
                        <td>
							<?php echo e($row->taxonomy_title); ?> 
                        </td>
                        <td>
                          <?php echo app('translator')->get($array_location[$row->news_position]); ?>
                        </td>
                        <td>
                          <?php echo e(date('H:i d/m/Y',strtotime($row->aproved_date))); ?>

                        </td>
                        <?php
                          $url_mapping = url('');
                          $url_mapping .= '/'.APP\Consts::ROUTE_PREFIX_TAXONOMY['post_detail'] .'/';
                          $url_mapping .= $row->url_part;
                          $url_mapping .= '.html';
                        ?>
                        <td class="text-center">
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Cập nhật tin bài'); ?>"
                            data-original-title="<?php echo app('translator')->get('Cập nhật tin bài'); ?>"
                            href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>">
                            <i class="fa fa-pencil-square-o"></i>
                          </a>
                          <a target="_new" href="<?php echo e($url_mapping); ?>" data-toggle="tooltip" title="<?php echo app('translator')->get('Link'); ?>"
                            data-original-title="<?php echo app('translator')->get('Link'); ?>">
                            <span class="btn btn-xs btn-flat btn-info">
                              <i class="fa fa-link"></i>
                            </span>
                          </a>
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                          <button class="btn btn-xs btn-danger" type="submit" data-toggle="tooltip"
                            title="<?php echo app('translator')->get('Gỡ bài đăng'); ?>" data-original-title="<?php echo app('translator')->get('Gỡ bài đăng'); ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          
                        </td>
                      </tr>
                    </form>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          <?php endif; ?>
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
        
      </div>

    </div>

    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/admin/pages/cms_posts/index.blade.php ENDPATH**/ ?>