<?php 
$listSearch = App\Http\Services\ContentService::getSearch(['status'=>'true'])->get();
$searchDetail = App\Http\Services\ContentService::getSearchDetail(['status'=>'true'])->get();

?>

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
	
	<div class="panel-group" id="accordion">
		<?php foreach($listSearch as $key=> $lssearch){ ?>
		<div class="panel panel-default">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $lssearch->id }}">
				{{ $lssearch->title }}</a>
			  </h4>
			</div>
			<div id="collapse{{ $lssearch->id }}" class="panel-collapse collapse <?php if($key==0) echo 'in'; ?>">
			  <div class="panel-body">
				<?php foreach($searchDetail as $sdetail){ if($sdetail->group_id == $lssearch->id){ ?>
				<p>
					<a href="javascript:;">
						<input type="checkbox" name="group_search" value="{{ $sdetail->id }}" onclick="" /> {{ $sdetail->title }}
					</a>
				</p>
				<?php } } ?>
			  </div>
			</div>
		</div>
		<?php } ?>
	</div>
	
</div>

