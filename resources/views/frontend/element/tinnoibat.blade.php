@php 
// Lấy tin tức nổi bật trang chủ
$params = array('status'=>'active','news_position'=>1,'limit'=>4,'order_by'=>array('iorder' => 'asc', 'aproved_date'=>'desc'));
$rows = App\Http\Services\ContentService::tinNoiBat($params)->get();
@endphp
<div class="pattern">
	<div class="container">
		
		<div class="col-xs-12 col-sm-12 home_news noleft section-news">
			<div class="box blog-module box-no-advanced">
				<div class="box-heading">Tin tức mới</div>
				<div class="strip-line"></div>
				<div class="box-content">

					<div class="news v2 row">
						<?php foreach($rows as $key=> $row){
							if($key==0){?>
						<div class='col-md-6 col-sm-12'>
							<div class='blog-post latest-blog-3 overlay-wraper'>
								<div class='blog-big-main'>
									<a href='/chi-tiet/{{ $row->url_part }}.html'>
										<img src='{{ $row->image }}'  alt='{{ $row->title }}' class='img-responsive center-block' />
									</a>
								</div>
								<div class='wt-post-info'>
									<div class='post-overlay-position'>
										<div class='wt-post-title'> 
											<h3 class='post-title'>
												<a href='/chi-tiet/{{ $row->url_part }}.html' title='{{ $row->title }}'>{{ $row->title }}</a>
											</h3>
										</div>
										<div class='wt-post-text'>
											{{ $row->brief }}   
										</div>
									</div>
								</div>
							</div>
						</div>
							<?php } } ?>
						<div class='col-md-6 col-sm-12'>
							<?php foreach($rows as $key2=> $row){
							if($key2>0){?>
							<div class='blog-post blog-post-small clearfix'>
								<div class='wt-post-media'>
									<a href='/chi-tiet/{{ $row->url_part }}.html' title='{{ $row->title }}'>
										<img src='{{ $row->image }}' alt='{{ $row->title }}' class='img-responsive center-block' />
									</a>
								</div>
								<div class='wt-post-info'> 
									<div class='wt-post-title'>
										<h4 class='post-title'>
											<a href='/chi-tiet/{{ $row->url_part }}.html' title='{{ $row->title }}'>{{ $row->title }}</a>
										</h4>
									</div> 
									<div class='wt-post-text'>{{ $row->brief }} </div>
								</div>
							</div>
							<?php }} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>