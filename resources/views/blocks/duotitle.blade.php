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

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="duotitle relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10">

			<div class="relative">
				<h3 data-gsap-element="header" class="absolute">{{ $g_duotitle['header1'] }}<span class="text-white">{{ $g_duotitle['header2'] }}</span></h3>
				@if (!empty($g_duotitle['image']))
				<div data-gsap-element="{{ $flip ? 'img-right' : 'img-left' }}" class="__img order1">
					<img class="object-cover w-full __img img-xl radius-img" src="{{ $g_duotitle['image']['url'] }}" alt="{{ $g_duotitle['image']['alt'] ?? '' }}">
				</div>
				@endif
			</div>

			<div class="__content order2">
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

</section>