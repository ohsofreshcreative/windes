@php
$sectionClass = '';
@endphp

<section data-gsap-anim="section" class="contact bg-secondary relative -spt pb-30 {{ $sectionClass }}">

	<div class="__wrapper c-main relative z-2">

		<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10 mt-14">
			<div class="__content w-full lg:w-11/12 flex flex-col justify-between">
				<div class="__data text-white">
					<p data-gsap-element="subheader" class="subtitle-s">Kontakt</p>
					<h2 data-gsap-element="subheader" class=" m-header text-white">{!! $g_contact_1['title'] !!}</h2>
					<a data-gsap-element="subheader" class="__phone flex items-center text-white text-2xl w-max mt-4" href="tel:{{ $g_contact_1['phone'] }}">{{ $g_contact_1['phone'] }}</a>
					<a data-gsap-element="subheader" class="__mail flex items-center text-white text-2xl w-max mt-4" href="mailto:{{ $g_contact_1['phone'] }}">{{ $g_contact_1['mail'] }}</a>
					<div data-gsap-element="subheader" class="flex flex-col md:flex-row items-start md:items-center gap-8 mt-10">
						<img class="object-cover aspect-square img-xs __img radius-img" src="{{ $g_contact_1['image']['url'] }}" alt="{{ $g_contact_1['image']['alt'] ?? '' }}">
						<div class="__address">{!! $g_contact_1['adres'] !!}</div>
					</div>

				</div>
			</div>
			<div data-gsap-element="subheader" class="__form bg-white p-6 md:p-10 rounded-2xl">
				<h2>{{ $g_contact_2['title'] }}</h2>
				<div class="contact-form-container">
					{!! do_shortcode($g_contact_2['shortcode']) !!}
				</div>
			</div>
		</div>
	</div>

	<img class="absolute top-0 left-0" src="http://windes.local/wp-content/uploads/2025/08/hero-shape.svg" />
</section>