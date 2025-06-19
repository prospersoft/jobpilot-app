<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class AddWishlistForm extends Component
{
    public $showModal = false;
    public $job_title = '';
    public $company_name = '';
    public $location = '';
    public $salary_range = '';
    public $job_link = '';
    public $notes = '';

    protected $rules = [
        'job_title' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'salary_range' => 'nullable|string|max:255',
        'job_link' => 'nullable|url|max:255',
        'notes' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        Wishlist::create([
            'user_id' => Auth::id(),
            'job_title' => $this->job_title,
            'company_name' => $this->company_name,
            'location' => $this->location,
            'salary_range' => $this->salary_range,
            'job_link' => $this->job_link,
            'notes' => $this->notes,
        ]);
        
        session()->flash('message', 'Wishlist item added successfully.');
        
        $this->dispatch('wishlist-added');
        $this->showModal = false;
        $this->reset(['job_title', 'company_name', 'location', 'salary_range', 'job_link', 'notes']);
    }

    public function render()
    {
        return view('livewire.add-wishlist-form');
    }
}
