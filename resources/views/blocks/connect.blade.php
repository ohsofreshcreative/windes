@php
$sectionClass = '';
@endphp

<!--- connect --->

<section data-gsap-anim="section" class="connect bg-s-lighter relative -smt pt-30 pb-30 {{ $sectionClass }}">

	<div class="__wrapper c-main relative z-2">

		<div class="relative grid grid-cols-1 lg:grid-cols-2 items-center gap-10 z-10">
			<div class="__content w-full lg:w-11/12 flex flex-col justify-between">
				<div class="__data">
					<h2 data-gsap-element="header" class="">{!! $g_connect_1['header'] !!}</h2>
					@if( !empty($g_connect_1['phone']) )
					<p class="mt-4">Telefon: <a href="tel:{{ preg_replace('/\s+/', '', $g_connect_1['phone']) }}" class="underline">{{ $g_connect_1['phone'] }}</a></p>
					@endif
					@if( !empty($g_connect_1['email']) )
					<p class="mt-2">Email: <a href="mailto:{{ $g_connect_1['email'] }}" class="underline">{{ $g_connect_1['email'] }}</a></p>
					@endif
					@if( !empty($g_connect_1['address']) )
					<p class="mt-2">Adres: {{ $g_connect_1['address'] }}</p>
					@endif

					<div data-gsap-element="txt" class="mt-6">
						{!! $g_connect_1['txt'] !!}
					</div>

					<div data-gsap-element="form" class="mt-10">
						{!! do_shortcode($g_connect_2['shortcode']) !!}
					</div>

				</div>
			</div>
			<div data-gsap-element="img" class="h-full">
				<img class="h-full radius-img object-cover" src="{{ $g_connect_1['image']['url'] }}" alt="{{ $g_connect_1['image']['alt'] ?? '' }}">
			</div>
		</div>

		<div class="__glow"> 
		</div>
	</div>

</section>