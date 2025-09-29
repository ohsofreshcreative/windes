@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';

@endphp

<!--- duotitle -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="duotitle relative mt-40 {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main ">
		<div class="__col  grid grid-cols-1 lg:grid-cols-[2fr_1.5fr] items-center gap-10 z-10">

			@if (!empty($g_duotitle['image']))
			<div data-gsap-element="{{ $flip ? 'img-right' : 'img-left' }}" class="__img">
				<img class="object-cover w-full img-xl radius-img" src="{{ $g_duotitle['image']['url'] }}" alt="{{ $g_duotitle['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__title relative">
				<h3 data-gsap-element="header" class="absolute">{{ $g_duotitle['header1'] }}<span class="block text-white">{{ $g_duotitle['header2'] }}</span></h3>

			</div>

			<div class="__content py-0 lg:py-30">
				<p data-gsap-element="title" class="title m-title">{{ $g_duotitle['title'] }}</p>
				<h3 data-gsap-element="header" class="">{{ $g_duotitle['header'] }}</h3>

				<div data-gsap-element="txt" class="mt-2">
					{!! $g_duotitle['txt'] !!}
				</div>

				@if (!empty($g_duotitle['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_duotitle['button']['url'] }}">{{ $g_duotitle['button']['title'] }}</a>
				@endif
			</div>

		</div>

		@if (!empty($g_duotitle['bg']))
		<div class="__bg absolute opacity-10 pointer-events-none">
			<img class="" src="{{ $g_duotitle['bg']['url'] }}" alt="{{ $g_duotitle['bg']['alt'] ?? '' }}">
		</div>
		@endif
	</div>

</section>