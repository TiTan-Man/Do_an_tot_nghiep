
<div class="col-md-3 hidden-xs hidden-sm" id="column_left">
    <div class="hst fadeIn">
        <section class="box-category">
            <div class="heading">
                <span>Danh mục</span>
            </div>
            <div class="list-group panelvmenu">
				<?php foreach($taxonomy_all as $taxonomy){
					$hienthi = trim($taxonomy->hienthi,';');
					$vitrihienthi = explode(';',$hienthi); // chuyển về mảng
					if(in_array(1,$vitrihienthi)){?>
					<a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html" class="list-group-item-vmenu" title="<?php echo e($taxonomy->title); ?>"><?php echo e($taxonomy->title); ?></a>
				<?php } } ?>
            </div>
        </section>
		
    </div>
	
</div>

<?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/element/menuleft.blade.php ENDPATH**/ ?>