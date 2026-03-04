@php
defined('ABSPATH') || exit;
@endphp

@php global $product; @endphp

<li {!! wc_product_class('border-p p-4', $product) !!}>
	<figure class="woocommerce-product-figure relative">
		@if($product && $product->is_on_sale())
		<span class="onsale">Promocja!</span>
		@endif

		<a href="{{ get_permalink() }}">
			<img src="{{ get_the_post_thumbnail_url($product->get_id(), 'large') }}"
				alt="{{ get_the_title() }}" class="object-cover !h-48 w-full" />
		</a>
	</figure>

	<div class="">
		<h6 class="woocommerce-loop-product__title line-clamp-2 h-14">
			<a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
		</h6>
		<a href="{{ get_permalink() }}" class="underline-btn mt-auto">
			Zobacz produkt
		</a>
	</div>

	@php do_action('woocommerce_after_shop_loop_item_title') @endphp
</li>