@php
defined('ABSPATH') || exit;
global $product;
@endphp

@php do_action('woocommerce_before_single_product'); @endphp

@if (post_password_required())
{!! get_the_password_form() !!}
@php return; @endphp
@endif

<!--- hero --->
@include('partials.product-hero')

<div class="c-main -smt">
	<div class="__content">
		<h1 class="c-product__title">{{ $product->get_name() }}</h1>
		
		@php $short_desc = apply_filters('woocommerce_short_description', $product->get_short_description()); @endphp
		@if(!empty($short_desc))
		<div class="c-product__excerpt">
			{!! $short_desc !!}
		</div>
		@endif
	</div>
</div>

@php do_action('woocommerce_after_single_product'); @endphp