<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class DeleteWishlistConfirmation extends Component
{
    public $showDeleteModal = false;
    public $wishlistId;

    protected $listeners = ['confirmDelete'];

    public function confirmDelete($id)
    {
        $this->wishlistId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $wishlist = Wishlist::find($this->wishlistId);
        
        if ($wishlist && $wishlist->user_id === Auth::id()) {
            $wishlist->delete();
            $this->dispatch('wishlist-deleted');
            session()->flash('message', 'Wishlist item deleted successfully.');
        }

        $this->showDeleteModal = false;
    }

    public function render()
    {
        return view('livewire.delete-wishlist-confirmation');
    }
}
