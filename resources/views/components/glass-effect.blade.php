@props([
'radius' => null
])

@php
$style = $radius ? "--glass-border-radius: {$radius};" : '';
@endphp

<div {{ $attributes->merge(['class' => 'glass-effect', 'style' => $style]) }}>

	<div class="glass-effect__bend"></div>
	<div class="glass-effect__face"></div>
	<div class="glass-effect__edge"></div>

	<div class="glass-effect__content">
		{{ $slot }}
	</div>
</div>