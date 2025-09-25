@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $greybg ? ' section-grey' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- text-tiles --->

<section data-gsap-anim="section" class="text-tiles -smt {{ $sectionClass }}">
	<div class="__wrapper c-main">

		<div class="w-full md:w-1/2">
			@if (!empty($g_tiles['subtitle']))
			<p class="subtitle-s">{{ strip_tags($g_tiles['subtitle']) }}</p>
			@endif
			@if (!empty($g_tiles['title']))
			<h2 data-gsap-element="header" class="">{{ strip_tags($g_tiles['title']) }}</h2>
			@endif
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-20 mt-16">

			<div class="__content relative lg:sticky top-8 h-max order1">
				@if (!empty($g_tiles['image']))
				<div class="image-reveal-wrapper" data-gsap-element="img-right" class="__img order1">
					<img class="object-cover w-full __img img-xl radius-img" src="{{ $g_tiles['image']['url'] }}" alt="{{ $g_tiles['image']['alt'] ?? '' }}">
				</div>
				@endif

				@if (!empty($g_tiles['text']))
				<p data-gsap-element="txt" class="__txt mt-6">{{ strip_tags($g_tiles['text']) }}</p>
				@endif

				@if (!empty($g_tiles['button']))
				<a data-gsap-element="button" class="main-btn m-btn" href="{{ $g_tiles['button']['url'] }}">{{ $g_tiles['button']['title'] }}</a>
				@endif
			</div>

			<div class="order2">

				@foreach ($repeater as $item)
				<div data-gsap-element="card" class="__card bg-white border-s rounded-3xl p-6 md:p-10 mb-6">
					<img class="" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
					<h6 class="mt-6">{{ $item['card_title'] }}</h6>
					<p class="mt-2">{{ $item['card_txt'] }}</p>
				</div>
				@endforeach
			</div>

		</div>
	</div>

</section>