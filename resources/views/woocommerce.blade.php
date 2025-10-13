@extends('layouts.app')

@section('content')
  @php
    // Używamy wbudowanych funkcji warunkowych WooCommerce
    // https://woocommerce.com/document/conditional-tags/
    $is_product_page = is_product();
  @endphp

  @if($is_product_page)
    {{-- Jeśli to strona produktu, renderuj treść bez żadnego dodatkowego kontenera --}}
    @php woocommerce_content() @endphp
  @else
  
    <div class="container mx-auto px-4 pt-20">
      @php woocommerce_content() @endphp
    </div>
  @endif
@endsection