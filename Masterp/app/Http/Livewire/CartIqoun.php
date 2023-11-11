<?php

namespace App\Http\Livewire;

use App\Models\carts;
use App\Models\Products;

use Livewire\Component;

class CartIqoun extends Component
{
    public $cartCount = 0;

    public function render()
    {
         // Add your logic to calculate the cart count here
        
        $customerId = auth()->user() ? auth()->user()->id : null;
        $sessionCart = session('cart');

        if ($customerId) {
            $this->cartCount = carts::where('customerId', $customerId)->count();

         } elseif ($sessionCart) {
            $this->cartCount = count($sessionCart);
        } else {
            $this->cartCount = 0;
        }
         return view('livewire.cart-iqoun');
    }
}

 

    