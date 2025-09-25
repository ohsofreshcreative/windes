@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

<!-- hero --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="hero bg-secondary relative -menu-pt {{ $sectionClass }} {{ $section_class }}" style="background-image: url('http://mk.local/wp-content/uploads/2025/08/hero-bg.png'); object-fit:cover;">

	<div class="__wrapper c-wide grid grid-cols-1 md:grid-cols-2 gap-8 items-center relative">

		<div class="__content pt-20 pb-10 md:py-30">
			<h2 data-gsap-element="header" class="trajan text-white !text-4xl md:!text-7xl">{{ $g_hero['title'] }}</h2>
			<div data-gsap-element="txt" class="text-white mt-2">
				{!! $g_hero['txt'] !!}
			</div>
			@if (!empty($g_hero['button1']))
			<div class="inline-buttons m-btn">
				<a data-gsap-element="button" class="white-btn left-btn" href="{{ $g_hero['button1']['url'] }}" target="{{ $g_hero['button1']['target'] }}">{{ $g_hero['button1']['title'] }}</a>
				@if (!empty($g_hero['button2']))
				<a data-gsap-element="button" class="main-btn" href="{{ $g_hero['button2']['url'] }}" target="{{ $g_hero['button2']['target'] }}">{{ $g_hero['button2']['title'] }}</a>
				@endif
			</div>
			@endif
		</div>

		@if (!empty($g_hero['image']))
		<div data-gsap-element="img-right" class="image-reveal-wrapper">
			<img class="" src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] ?? '' }}">
		</div>
		@endif
	</div>

</section>