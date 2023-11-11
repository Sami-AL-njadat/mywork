<!-- resources/views/livewire/cart-counter.blade.php -->

<div class="cart">
    <a href="{{ route('cart.index') }}">
        <i    class="fa fa-shopping-cart" style="font-size: 25px;" aria-hidden="true"></i>
        @if ($cartCount > 0)
             <span class="count" class="cart-quantity">{{ $cartCount }}</span>
        @else
              <span class="count" class="cart-quantity">0</span> 
        @endif
    </a>
</div>

{{-- 

     <a href="{{ route('cart.index') }}">
        <i class="fa fa-shopping-cart" style="font-size: 25px;" aria-hidden="true"></i>
        @php
         $sessionCart = session('cart');
        $cart = $sessionCart ? count($sessionCart) : 0;

        if ($cart == 0) {
             $cart = \App\Models\carts::count();
        }
         @endphp

        @if ($cart > 0)
            <span>Cart <span class="cart-quantity">{ {{ $cart }} }</span></span>
                    @else
            <span>Cart <span class="cart-quantity">{ 0 } items</span></span>
        @endif
    </a>
  --}}
 