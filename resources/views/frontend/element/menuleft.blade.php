
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
					<a href="/{{ $taxonomy->taxonomy }}/{{ $taxonomy->url_part }}.html" class="list-group-item-vmenu" title="{{ $taxonomy->title }}">{{ $taxonomy->title }}</a>
				<?php } } ?>
            </div>
        </section>
		
    </div>
	
</div>