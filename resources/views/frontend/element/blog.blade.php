@php
$check_blog = 0;
foreach($blocksContent as $banner){
	if($banner->block_code == 'blog'){
		$check_blog = 1;
	}
}
if($check_blog==1){
@endphp

<div class="blog-suc-khoe">
	<div class="container">
		
		<div class='home_bottom_box'>
			<div class="box blog-module box-no-advanced">
				<div class="box-heading">Thương hiệu</div>
				<div class="strip-line"></div>
				<div class="box-content">
					<div class="news v2 row">
						@foreach($blocksContent as $banner)
						@if($banner->block_code == 'blog')
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="pop_home row">
									<div class="col-xs-4 col-sm-5 noright">
										<a class="pop_img" title="{{ $banner->title }}" href="{{ $banner->url_link }}">
											<img alt="{{ $banner->title }}" src="{{ $banner->image }}"></a>
									</div>
									<div class="col-xs-8 col-sm-7 noleft">
										<a class="article_title" title="{{ $banner->title }}" href="{{ $banner->url_link }}">{{ $banner->title }}</a>
									</div>
								</div>
							</div>
							
							{!! $banner->content !!}
						@endif
						@endforeach
						
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@php
}
@endphp