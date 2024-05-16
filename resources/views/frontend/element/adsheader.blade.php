
<section class="variable slider " id="advHeaderTop" style="max-height: 250px; overflow: hidden;">
	@foreach($blocksContent as $banner)
		@if($banner->block_code == 'banner')
		<a href="{{ $banner->url_link }}" title="{{ $banner->title }}" alt="{{ $banner->title }}">
			<img style="width: 100%" src="{{ $banner->image }}">
		</a>
		@endif
	@endforeach
</section>
<script>
	$(document).ready(function() {
		$(".variable").slick({
			slidesToShow: 1,
			autoplay: true,
			autoplaySpeed: 4000,
			arrows: true,
			focusOnSelect: true,
			lazyLoad: 'ondemand',
			dots: true,
			responsive: [
			{
			  breakpoint: 768,
			  settings: {
				centerMode: false,
			  },
			},
			],
		});
	});
</script>