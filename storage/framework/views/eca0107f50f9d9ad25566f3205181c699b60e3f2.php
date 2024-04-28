<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
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
    <?php
    $array_location = APP\Consts::POST_POSITION;
    ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo app('translator')->get('Create form'); ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1" data-toggle="tab">
                  <h5>Thông tin chính <span class="text-danger">*</span></h5>
                </a>
              </li>
              <?php if(Auth::guard('admin')->user()->is_super_admin == 1): ?>
                <button type="submit" class="btn btn-danger pull-right btn-sm mg-5"  name="submit" value="xuatban">Xuất bản</button>
              <?php endif; ?>
                <button type="submit" class="btn btn-warning pull-right btn-sm mg-5" name="submit" value="xuatban">Chờ xuất bản</button>
                <button type="submit" class="btn btn-success pull-right btn-sm mg-5" name="submit" value="choduyet">Chờ kiểm duyệt</button>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

                <div class="row hidden">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <input class="form-control" id="crawl" placeholder="Nhập đường dẫn tin crawl.." type="text" value="" onchange="getContent();">
                      <img id="ic-loading" style="display: none;vertical-align: middle; position: absolute; top: 8px;right: 20px;" src="/upload/loading.gif" width="20px">
                    </div>
                  </div>
                </div>
                <div class="row" id="info_general">
                  <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <div class="form-group">
                        <label><?php echo app('translator')->get('Content'); ?>: <i style="color: #f00;">("double click" vào ảnh để chọn là ảnh đại diện bài viết)</i></label>
                        <textarea name="content" class="form-control" id="content"><?php echo e(old('content')); ?></textarea>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Tin liên quan'); ?></label>
                      <button onclick="addNewRelative()" type="button" class="btn btn-sm btn-primary">Chọn</button>
                      <ul id="list_relative">
                        
                      </ul>
                    </div>

                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_title'); ?></label>
                      <input id="txtSeoTitle" maxlength="160" name="seo_title" class="form-control" value="<?php echo e(old('seo_title')); ?>"
                        onkeyup="demKytu('txtSeoTitle','remainingInput_seoTitle');" onblur="demKytu('txtSeoTitle','remainingInput_seoTitle');" onclick="demKytu('txtSeoTitle','remainingInput_seoTitle');">
                        <span id='remainingInput_seoTitle' class="note pull-right"><?php echo e(mb_strlen(old('seo_title'))); ?>/160</span>
                    </div>
                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_keyword'); ?></label>
                      <input id="txtSeoKeyword" maxlength="255" name="seo_keyword" class="form-control" value="<?php echo e(old('seo_keyword')); ?>"
                      onkeyup="demKytu('txtSeoKeyword','remainingInput_seoKeyword');" onblur="demKytu('txtSeoKeyword','remainingInput_seoKeyword');" onclick="demKytu('txtSeoKeyword','remainingInput_seoKeyword');">
                        <span id='remainingInput_seoKeyword' class="note pull-right"><?php echo e(mb_strlen(old('seo_keyword'))); ?>/255</span>
                    </div>
                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_description'); ?></label>
                      <input id="txtSeoDescription" maxlength="255" name="seo_description" class="form-control" value="<?php echo e(old('seo_description')); ?>" 
                      onkeyup="demKytu('txtSeoDescription','remainingInput_seoDescription');" onblur="demKytu('txtSeoDescription','remainingInput_seoDescription');" onclick="demKytu('txtSeoDescription','remainingInput_seoDescription');">
                        <span id='remainingInput_seoDescription' class="note pull-right"><?php echo e(mb_strlen(old('seo_description'))); ?>/255</span>
                    </div>
                  </div>

                  <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Tiêu đề'); ?> <small class="text-red">*</small></label>
                      <input type="text" class="form-control" maxlength="160" id="txtTitle" onchange="demKytu('txtTitle','remainingInput_text');getUrlPart('txtTitle','txtUrlPart')" onclick="demKytu('txtTitle','remainingInput_text');getUrlPart('txtTitle','txtUrlPart')" onblur="demKytu('txtTitle','remainingInput_text');getUrlPart('txtTitle','txtUrlPart')" name="title" placeholder="<?php echo app('translator')->get('Title'); ?>"
                        value="<?php echo e(old('title')); ?>" required>
                        <span id='remainingInput_text' class="note pull-right"><?php echo e(mb_strlen(old('title'))); ?>/160</span>
                    </div>
                    <div class="form-group">
                      <label><?php echo app('translator')->get('alias'); ?> <small class="text-red">*</small></label>
                      <input type="text" class="form-control" id="txtUrlPart" onchange="getUrlPart('txtUrlPart','txtUrlPart')" onclick="getUrlPart('txtUrlPart','txtUrlPart')" onblur="getUrlPart('txtUrlPart','txtUrlPart')" name="url_part" placeholder="<?php echo app('translator')->get('Alias'); ?>"
                        value="<?php echo e(old('url_part')); ?>" required>
                    </div>
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Mô tả'); ?></label>
                      <textarea name="brief" id="description" maxlength="255" onkeyup="demKytu('description','remainingInput_textarea');" onblur="demKytu('description','remainingInput_textarea');" onclick="demKytu('description','remainingInput_textarea');"  class="form-control" rows="5"><?php echo e(old('brief')); ?></textarea>
                        <span id='remainingInput_textarea' class="note pull-right"><?php echo e(mb_strlen(old('brief'))); ?>/255</span>
                    </div>
					
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Danh mục'); ?> <small class="text-red">*</small></label>
                      <select name="taxonomy_id" id="taxonomy_id" class="form-control select2" style="width: 100%">
                        
                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e(old('taxonomy_id') == $item->id ? 'selected' : ''); ?>>
                              <?php echo e($item->title); ?></option>

                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($item->id == $sub->parent_id): ?>
                                <option value="<?php echo e($sub->id); ?>"
                                  <?php echo e(old('taxonomy_id') == $sub->id ? 'selected' : ''); ?>>- - <?php echo e($sub->title); ?>

                                </option>

                                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($sub->id == $sub_child->parent_id): ?>
                                    <option value="<?php echo e($sub_child->id); ?>"
                                      <?php echo e(old('taxonomy_id') == $sub_child->id ? 'selected' : ''); ?>>- - - -
                                      <?php echo e($sub_child->title); ?></option>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
					
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Chọn loại tin'); ?> <small class="text-red">*</small></label>
                      <select name="news_position" class="form-control" id="news_position">
                        <?php $__currentLoopData = $array_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$position_text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('news_position') == $key ? 'selected' : ''); ?>><?php echo e($position_text); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Image'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image" onclick="openPopupImg('image')" data-preview="image-holder" class="btn btn-primary lfm"
                            data-type="cms-image">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                          </a>
                        </span>
                        <input id="image" class="form-control" type="text" name="image"
                          placeholder="<?php echo app('translator')->get('image_link'); ?>...">
                      </div>
                      <div id="image-holder" style="margin-top:15px;max-height:100px;">
                        <?php if(old('image') != ''): ?>
                        <img id="view_image" style="height: 5rem;" src="<?php echo e(old('image')); ?>">
                        <?php else: ?>
                        <img id="view_image" style="height: 5rem;" src="">
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Image thumb'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image_thumb" onclick="openPopupImg('image_thumb')" data-preview="image_thumb-holder" class="btn btn-primary lfm"
                            data-type="cms-image">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                          </a>
                        </span>
                        <input id="image_thumb" class="form-control" type="text" name="image_thumb"
                          placeholder="<?php echo app('translator')->get('image_link'); ?>...">
                      </div>
                      <div id="image_thumb-holder" style="margin-top:15px;max-height:100px;">
                        <?php if(old('image_thumb') != ''): ?>
                          <img id="view_image_thumb" style="height: 5rem;" src="<?php echo e(old('image_thumb')); ?>">
                        <?php else: ?>
                          <img id="view_image_thumb" style="height: 5rem;" src="">
                        <?php endif; ?>
                      </div>
                    </div>

                  </div>
                  
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>

                </div>

              </div>

            </div><!-- /.tab-content -->
          </div><!-- nav-tabs-custom -->

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
          </a>
          
          <?php if(Auth::guard('admin')->user()->is_super_admin == 1): ?>
            <button type="submit" class="btn btn-danger pull-right btn-sm mg-5"  name="submit" value="xuatban">Xuất bản</button>
          <?php endif; ?>
            <button type="submit" class="btn btn-warning pull-right btn-sm mg-5" name="submit" value="xuatban">Chờ xuất bản</button>
            <button type="submit" class="btn btn-success pull-right btn-sm mg-5" name="submit" value="choduyet">Chờ kiểm duyệt</button>
        </div>
      </form>
    </div>
  </section>


  <div class="modal modal-login fade" id="postnewModal" tabindex="-1" role="dialog" aria-labelledby="postnewModalModalLabel" aria-hidden="true">
    
      <?php echo csrf_field(); ?>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Chọn tin liên quan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -22px;">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="input-group">
              <input id="keyword" type="text" class="form-control" name="search" placeholder="Keyword...">
              <span class="input-group-addon" onclick="searchPost()"><i class="fa fa-search"></i></span>
            </div>

            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>Bài viết</th>
                  <th>Chọn</th>
                </tr>
              </thead>
              <tbody id="dataTablePost">
                <?php $__currentLoopData = $cms_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($post->title); ?></td>
                  <td>
                    <input type="checkbox" onclick="checkPostReative(<?php echo e($post->id); ?>)" id="post_id_<?php echo e($post->id); ?>" name="check_realtive[]" value="<?php echo e($post->id); ?>" />
                    <input type="hidden" id="post_title_<?php echo e($post->id); ?>" value="<?php echo e($post->title); ?>" />
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <div class="text-right">
              <button type="buttom" name="btnLogin" id="btnLogin" class="btn btn-primary" class="close" data-dismiss="modal" aria-label="Close" spellcheck="false">Đóng</button>
            </div>  
          </div>
        </div>
      </div>
  </div>
  <div class="toast" style="display: none">
    <div class="toast-body">
      Thay đổi ảnh đại diện bài viết thành công
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
  
  ClassicEditor.create( document.querySelector( '#content' ), {
      toolbar: {
        items: [
          'CKFinder',"|",
          'heading',
          'bold',
          'link',
          'italic',
          '|',
          'blockQuote',
          'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify',
          'insertTable',
          'undo',
          'redo',
          'LinkImage',
          'bulletedList',
          'numberedList',
          'mediaEmbed',
          'fontBackgroundColor',
          'fontColor',
          'fontSize',
          'fontFamily'
        ]
      },
      language: 'vi',
      image: {
        toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full','imageStyle:side', 'imageStyle:alignCenter','linkImage'],
        styles: [
            'full',
            'side',
            'alignCenter',
            'alignLeft',
            'alignRight'
        ]
      },
      table: {
        contentToolbar: [
          'tableColumn',
          'tableRow',
          'mergeTableCells'
        ]
      },
      licenseKey: '',
      
      
    } ) .then( editor => {
      window.editor = editor;
      
    } ) .catch( error => {
      console.error( 'Oops, something went wrong!' );
      console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
      console.warn( 'Build id: v10wxmoi2tig-mwzdvmyjd96s' );
      console.error( error );
    } );
</script>

<script>

    
  function searchPost(){
    var keyword = $('#keyword').val();
    
		$.ajax({
		  url: '<?php echo e(route('cms_posts.post_relative')); ?>',
		  type: 'POST',
		  data: {
			_token: '<?php echo e(csrf_token()); ?>',
			keyword: keyword
		  },
		  context: document.body,
		}).done(function(data) {
		  $('#dataTablePost').html(data);
		});
  }

  function getContent(){
		var url_craw = $("#crawl").val();
		$('#ic-loading').show();
		//alert(url_craw);
		$.ajax({
		  url: '<?php echo e(route('cms_posts.load_crawler')); ?>',
		  type: 'POST',
		  data: {
			_token: '<?php echo e(csrf_token()); ?>',
			url_craw: url_craw
		  },
		  context: document.body,
		}).done(function(data) {
			$('#ic-loading').hide();
			$('#info_general').html(data);
		});
	} 
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u745771642/domains/bibomart.thanhphung.com/public_html/resources/views/admin/pages/cms_posts/create.blade.php ENDPATH**/ ?>