@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

<!-- hero --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="hero bg-secondary relative -menu-pt min-h-[100svh] {{ $sectionClass }} {{ $section_class }}">

	@if (!empty($g_hero['use_video']) && !empty($g_hero['video']))
	<video
		class="absolute inset-0 w-full h-full object-cover z-0"
		autoplay
		muted
		loop
		playsinline
		preload="metadata"
		@if(!empty($g_hero['video_poster']['url'])) poster="{{ $g_hero['video_poster']['url'] }}" @endif
		aria-hidden="true">
		<source src="{{ is_array($g_hero['video']) ? ($g_hero['video']['url'] ?? '') : $g_hero['video'] }}"
			type="{{ is_array($g_hero['video']) ? ($g_hero['video']['mime_type'] ?? 'video/mp4') : 'video/mp4' }}">
	</video>
	<div class="absolute inset-0 bg-black/40 z-10 pointer-events-none"></div>
	@endif

	<div class="__wrapper c-wide grid grid-cols-1 md:grid-cols-2 gap-8 items-center relative z-20">
		<div class="__content pt-20 pb-10 md:py-30">
			<h2 data-gsap-element="header" class=" text-white">
				{{ $g_hero['title'] }}
			</h2>
			<div data-gsap-element="txt" class="text-white mt-2">
				{!! $g_hero['txt'] !!}
			</div>
			@if (!empty($g_hero['button1']))
			<div class="inline-buttons m-btn">
				<a data-gsap-element="button" class="white-btn left-btn"
					href="{{ $g_hero['button1']['url'] }}"
					target="{{ $g_hero['button1']['target'] }}">
					{{ $g_hero['button1']['title'] }}
				</a>
				@if (!empty($g_hero['button2']))
				<a data-gsap-element="button" class="main-btn"
					href="{{ $g_hero['button2']['url'] }}"
					target="{{ $g_hero['button2']['target'] }}">
					{{ $g_hero['button2']['title'] }}
				</a>
				@endif
			</div>
			@endif

			<x-glass-effect data-gsap-element="search" class="inline-block w-full mt-6" radius="200px">
				<form role="search"
					method="get"
					action="{{ home_url('/') }}"
					class="flex items-stretch gap-2 p-2">

					<label for="hero-search" class="sr-only text-white">Szukaj produktów</label>
					<input id="hero-search"
                        type="search"
                        name="s"
                        placeholder="Szukaj produktów…"
                        class="w-full rounded-xl px-4 py-3 text-white bg-transparent border-none focus:ring-0"
                        required>
   <input type="hidden" name="post_type" value="product">

					  <button type="submit"
                        class="rounded-full px-5 py-3 font-semibold bg-white/90 hover:bg-white transition">
						Szukaj
					</button>
				</form>
			</x-glass-effect>

		</div>

		@if (!empty($g_hero['image']))
		<div data-gsap-element="image" class="">
			<img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] ?? '' }}">
		</div>
		@endif
	</div>

</section>