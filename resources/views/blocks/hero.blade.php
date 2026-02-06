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

			<div x-data="productSearch()" @click.away="searchResults = []" class="relative w-full mt-6">
				{{-- Formularz wyszukiwania (bez zmian) --}}
				<x-glass-effect radius="200px">
					<form role="search"
						method="get"
						action="{{ home_url('/') }}"
						class="flex items-stretch gap-2 p-2 relative">

						<label for="hero-search" class="sr-only text-white">Szukaj produktów</label>
						<input id="hero-search"
							type="search"
							name="s"
							placeholder="Szukaj produktów…"
							class="w-full rounded-xl px-4 py-3 text-white bg-transparent border-none focus:ring-0"
							required
							autocomplete="off"
							x-model="searchQuery"
							@input.debounce.300ms="searchProducts">
						<input type="hidden" name="post_type" value="product">

						<button type="submit"
							class="rounded-full px-5 py-3 font-semibold bg-white/90 hover:bg-white transition">
							Szukaj
						</button>
					</form>
				</x-glass-effect>

				{{-- NOWA, POPRAWIONA LISTA WYNIKÓW --}}
			 <div x-show="searchResults.length > 0" x-transition style="display: none;">
                    {{-- Dodajemy klasę bg-white/95 dla "mlecznego" efektu --}}
                    <x-glass-effect radius="32px" class="absolute top-full left-0 right-0 mt-2 z-50 !p-0 overflow-hidden bg-white/100">
                        {{-- Dodajemy klasę .custom-scrollbar do listy --}}
                        <ul class="max-h-[13.5rem] overflow-y-auto custom-scrollbar">
                            <template x-for="product in searchResults" :key="product.id">
                                <li class="group border-b border-white/10 last:border-b-0">
                                    <a :href="product.url" class="flex items-center gap-3 p-3 hover:bg-black/20 transition-colors duration-150">
                                        <img :src="product.image" :alt="product.title" class="w-10 h-10 object-cover rounded-md shrink-0">
                                        <span class="font-semibold text-sm text-white" x-text="product.title"></span>
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </x-glass-effect>
                </div>
			</div>

		</div>

		@if (!empty($g_hero['image']))
		<div data-gsap-element="image" class="">
			<img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] ?? '' }}">
		</div>
		@endif
	</div>

</section>