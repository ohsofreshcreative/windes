@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $slightbg ? ' section-s-light' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp


<!--- numbers --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="numbers -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main">
		<div class="">
			@if (!empty($g_numbers['subtitle']))
			<p class="subtitle-p">{{ strip_tags($g_numbers['subtitle']) }}</p>
			@endif
			@if (!empty($g_numbers['title']))
			<p class="trajan text-[22px] md:text-5xl mt-2 !mb-16">{{ strip_tags($g_numbers['title']) }}</h2>
			@endif

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
				@foreach ($g_numbers['r_numbers'] as $item)
				<div class="__card relative">
					<p class="text-h1">{{ $item['card_title'] }}<span class="text-light">{{ $item['symbol'] }}</span></p>
					<p class="text-lg">{{ $item['card_txt'] }}</p>
				</div>
				@endforeach
			</div>

		</div>
	</div>

</section>