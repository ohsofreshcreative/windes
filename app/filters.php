<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
	return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});


add_action('pre_get_posts', function ($q) {
	if (is_admin() || !$q->is_main_query()) {
		return;
	}
	if ($q->is_search()) {
		// Jeżeli przyszło z naszego paska: post_type=produkty
		if (!empty($_GET['post_type']) && $_GET['post_type'] === 'produkty') {
			$q->set('post_type', 'produkty');
			// (opcjonalnie) sortowanie / ilość:
			// $q->set('posts_per_page', 12);
			// $q->set('orderby', 'date');
			// $q->set('order', 'DESC');
		}
	}
});

/*--- AJAX SEARCH ---*/

/**
 * Obsługa wyszukiwania produktów przez AJAX.
 */
add_action('wp_ajax_search_products', 'App\handle_ajax_search_products');
add_action('wp_ajax_nopriv_search_products', 'App\handle_ajax_search_products');

function handle_ajax_search_products()
{
	$search_query = sanitize_text_field($_REQUEST['s'] ?? '');

	if (empty($search_query)) {
		wp_send_json_error('Empty search query');
		return;
	}

	$args = [
		'post_type' => 'product',
		'posts_per_page' => 5,
		's' => $search_query,
		'post_status' => 'publish',
	];

	$products_query = new \WP_Query($args);
	$results = [];

	if ($products_query->have_posts()) {
		while ($products_query->have_posts()) {
			$products_query->the_post();
			$product = wc_get_product(get_the_ID());
			if (!$product) continue;

			$image_id = $product->get_image_id();
			$image_url = wp_get_attachment_image_url($image_id, 'thumbnail');

			$results[] = [
				'id'    => get_the_ID(),
				'title' => get_the_title(),
				'url'   => get_permalink(),
				'image' => $image_url ? $image_url : wc_placeholder_img_src(),
			];
		}
	}

	wp_reset_postdata();
	wp_send_json_success($results);
}

/*--- WOOCOMMERCE RESULTS ---*/

add_filter('woocommerce_redirect_single_search_result', '__return_false');

/*--- BREADCRUMBS DOT ---*/

add_filter('woocommerce_breadcrumb_defaults', function ($defaults) {
	 $defaults['home'] = ''; 
	$defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb inline-block !text-[11px] md:!text-sm whitespace-nowrap !mt-2">';

	$defaults['delimiter'] = '<span class="sep sep-dot font-bold px-2" aria-hidden="true">&bull;</span>';

	return $defaults;
});
