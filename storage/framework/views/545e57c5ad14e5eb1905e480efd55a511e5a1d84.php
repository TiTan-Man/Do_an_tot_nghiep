<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#showCNTT" onClick="showCNTT()" > <?php echo app('translator')->get('Add'); ?> <i class="fa fa-plus"></i></button>
    </h1>
  </section>
<?php $__env->stopSection(); ?>

<?php
$array_position = App\Consts::POST_POSITION_SORT;
$array_location = App\Consts::POST_POSITION;
?>

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

            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Keyword'); ?> </label>
                <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('keyword_note'); ?>"
                  value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
              </div>
            </div>
				
            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Vị trí'); ?> </label>
                <select class="form-control" name="news_position" id="news_position">
                  <?php $__currentLoopData = $array_position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($key2); ?>" <?php echo e($params['news_position'] == $key2 ? 'selected' : ''); ?>><?php echo e($val); ?></option>
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
    
    <?php 
    $array_category = array();
    foreach ($parents as $item){
      $array_category[$item->id] = $item->title;
    }
    ?>
    <div class="box">
      <div class="nav-tabs-custom">
    
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <form id="form_news_update_iorder" action="<?php echo e(route('cms_posts.update_sort')); ?>" method="post">  
              <?php echo csrf_field(); ?>
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
                <table id="table-2" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th><?php echo app('translator')->get('STT'); ?></th>
                      <th><?php echo app('translator')->get('Title'); ?></th>
                      <th><?php echo app('translator')->get('Link'); ?></th>
                      <th><?php echo app('translator')->get('Vị trí'); ?></th>
                      <th><?php echo app('translator')->get('Thứ tự'); ?></th>
                      <th><?php echo app('translator')->get('Post category'); ?></th>
                      <th><?php echo app('translator')->get('Xuất bản'); ?></th>
                      <th><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $stt=0; ?>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($row->parent_id == 0 || $row->parent_id == null): ?>
                          <?php $stt++; ?>
                          <tr id="<?php echo e($row->id); ?>" class="valign-middle" style="cursor: grabbing;">
                            <td class="text-center">
                              <?php echo e($stt); ?>

                            </td>  
                            <td>
                              <strong style="font-size: 14px;"><?php echo e($row->title); ?></strong>
                            </td>
                            <?php
                              $url_mapping = url('');
                              $url_mapping .= '/';
                              $url_mapping .= App\Consts::ROUTE_PREFIX_TAXONOMY['post_detail'] . '/';
                              $url_mapping .= $row->url_part == '' ? Str::slug($row->title) : $row->url_part;
                              $url_mapping .= '.html';
                            ?>
                            <td>
                              <a target="_new" href="<?php echo e($url_mapping); ?>" data-toggle="tooltip" title="<?php echo app('translator')->get('Link'); ?>"
                                data-original-title="<?php echo app('translator')->get('Link'); ?>">
                                <span class="btn btn-flat btn-sm btn-info">
                                  <i class="fa fa-external-link"></i>
                                </span>
                              </a>
                            </td>
                            <td>
                              <select class="form-control" name="" id="tin_noi_bat_<?php echo e($row->id); ?>" onchange="updatePosition(<?php echo e($row->id); ?>)">
                                <?php $__currentLoopData = $array_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php echo e($row->news_position == $key ? 'selected' : ''); ?>><?php echo e($position); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </td>
                            <td class="text-center">
                              <input type="number" class="form-control" id="update_order_<?php echo e($row->id); ?>" onblur="updateOrder(<?php echo e($row->id); ?>)" value="<?php echo e($row->iorder); ?>" style="width: 60px"/>
                              <img id="ic-loading_<?php echo e($row->id); ?>" style="display: none;vertical-align: middle;" src="/images/load.gif" width="20px">
                            </td>
                            <td>
                              <?php
                              $category = explode(',',trim($row->category,','));
                              foreach($category as $cat_id){
                                echo isset($array_category[$cat_id]) ? $array_category[$cat_id].', ' : '';
                              }
                              ?>
                            </td>
                            <td>
                              <?php echo e(date('H:i d/m/Y',strtotime( $row->aproved_date))); ?>

                            </td>
                            <td class="text-center">
                              <input type="number" class="form-control hidden" name="iorder[<?php echo e($row->id); ?>]" id="iorder_<?php echo e($row->id); ?>" value="<?php echo e($stt); ?>"  />
                              <input type="checkbox" name="vitri[]" id="vitri_<?php echo e($row->id); ?>" value="<?php echo e($row->id); ?>">
                            </td>
                          </tr>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>

              <?php endif; ?>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-sm-5">
                    
                  </div>
                  <div class="col-sm-7">
                    <div class="" style="float: right">
                      <input type="hidden" name="hid_remove" id="hid_remove" value="0">
                      <input type="button" onclick="setremove()" name="remove" class="btn btn-danger" value="Gỡ tin nổi bật">
                      <input type="submit" name="update_iorder" class="btn btn-danger" value="Cập nhật sắp xếp">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          
        </div>

    </div>

    </div>
  </section>
  <script type="text/javascript">
    function updatePosition(id){
      var position = $('#tin_noi_bat_'+id).val();
      $('#ic-loading_'+id).show();
      $.ajax({
        url: '<?php echo e(route('cms_posts.update_position')); ?>',
        type: 'POST',
        data: {
        _token: '<?php echo e(csrf_token()); ?>',
        position: position,
        id: id,
        },
        context: document.body,
      }).done(function(data) {
        $('#ic-loading_'+id).hide();
        $('#tin_noi_bat_'+id).attr('readonly',true)
        //window.location.reload();
      });
    }

    function updateOrder(id){
      var stt_order = $('#update_order_'+id).val();
      $('#ic-loading_'+id).show();
      $.ajax({
        url: '<?php echo e(route('cms_posts.update_order')); ?>',
        type: 'POST',
        data: {
        _token: '<?php echo e(csrf_token()); ?>',
        stt_order: stt_order,
        id: id,
        },
        context: document.body,
      }).done(function(data) {
        $('#ic-loading_'+id).hide();
        //window.location.reload();
      });
    }
  
    function setremove(){
      $("#hid_remove").val("1");
      if(confirm("Bạn chắc chắn gỡ các tin đã chọn khỏi tin nổi bật ? "))
      $("#form_news_update_iorder").submit();	
      
    }
    $(document).ready(function() {
        table_2 = $("#table-2");
        table_2.find("tr:even").addClass("alt"); //alert("s");
        table_2.tableDnD({
            onDragClass: "myDragClass",
            onDrop: function(table, row) {
                var rows = table.tBodies[0].rows;
                var debugStr = "Row dropped was "+row.id+". New order: ";
                for (var i=0; i<rows.length; i++) {
                    debugStr += rows[i].id+" ";
                }
                // $(table).parent().find('.result').text(debugStr);
                // Xu ly o day
                // alert("Gọi ajax ở đây");
            },
            onDragStart: function(table, row) {
                //$(table).parent().find('.result').text("Started dragging row "+row.id);
            }
        });	
    });		

</script>

<div class="modal fade" id="showCNTT" data-backdrop="false" role="dialog" aria-hidden="true" style="display: none;"><div class="modal-dialog modal-wide">
	<form method="POST" action="<?php echo e(route('cms_posts.update_featured')); ?>" name="news_hot" id="news_hot" class="form-horizontal">
		<?php echo csrf_field(); ?>
    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Thêm tin nổi bật</h4>
			</div>
			<div class="modal-body modal-scroll">
				<div class="form-group">
					<div class="col-md-2">
					</div>
					<div class="col-md-4">
						<input class="form-control" placeholder="Nhập từ khóa tìm kiếm" name="keyword" id="keyword" type="text">
					</div>
					<div class="col-md-3">
						<a class="btn btn-success" href="javascript:;" onclick="timkiemthongtin()"> Tìm kiếm</a>
					</div>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="text-center" width="3%">STT</th>
								<th width="">Tiêu đề</th>
								<th width="">Danh mục</th>
								<th width="">Ngày XB</th>
								<th width="">Chọn</th>
							</tr>
						</thead>
						<tbody id="thongtintimkiem">
																						
            </tbody>
					</table>
				</div><!-- /.Đã duyệt -->
			</div>
			<div class="modal-footer">
				<div class="form-group">
					<div class="col-md-12 text-center">
						<button type="submit" name="tin_top" class="btn btn-success" value="xu_huong" >Tin xu hướng</button>
						<button type="submit" name="tin_top" class="btn btn-primary" value="chu_y" >Đáng chú ý</button>
						<button type="button" class="btn btn-default " data-dismiss="modal">Đóng lại</button>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</form>
</div><!-- /.modal-dialog -->
<script>
	//$(".select2").select2();
	
  function showCNTT() {
    
    $.ajax({
      url: '<?php echo e(route('cms_posts.load_featured')); ?>',
      type: 'POST',
      data: {
        _token: '<?php echo e(csrf_token()); ?>',
      },
      context: document.body,
    }).done(function(data) {
      
      $('#thongtintimkiem').html(data);
    });
	}

	function timkiemthongtin() {
		var keyword = $('#keyword').val();
		$.ajax({
		  url: '<?php echo e(route('cms_posts.load_featured')); ?>',
		  type: 'POST',
		  data: {
			_token: '<?php echo e(csrf_token()); ?>',
			keyword: keyword
		  },
		  context: document.body,
		}).done(function(data) {
		  
		  $('#thongtintimkiem').html(data);
		});
	}
</script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vpnphaw80um5/public_html/resources/views/admin/pages/cms_posts/list_featured.blade.php ENDPATH**/ ?>