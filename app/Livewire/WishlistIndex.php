<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistIndex extends Component
{
    #[On('wishlist-added')]
    #[On('wishlist-deleted')]
    public function refresh()
    {
        // This method will be called when either event is dispatched
    }

    public function render()
    {
        $wishlists = Auth::user()->wishlists()->latest()->get();
        return view('livewire.wishlist-index', ['wishlists' => $wishlists]);
    }
}
