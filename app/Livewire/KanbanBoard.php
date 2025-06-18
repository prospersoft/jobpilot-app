<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Application;

class KanbanBoard extends Component

{   
    public $showWishlistForm = false;
    public $newWishlist = [
        'job_title' => '',
        'company_name' => '',
        'notes' => ''
    ];

    public function addToWishlist()
    {
        $this->validate([
            'newWishlist.job_title' => 'required|string|max:255',
            'newWishlist.company_name' => 'required|string|max:255',
            'newWishlist.notes' => 'nullable|string|max:1000',
        ]);

        auth()->user()->applications()->create([
            'job_title' => $this->newWishlist['job_title'],
            'company_name' => $this->newWishlist['company_name'],
            'notes' => $this->newWishlist['notes'],
            'status' => 'wishlist',
            'applied_date' => null // explicitly set to null for wishlist items
        ]);

        $this->reset('newWishlist', 'showWishlistForm');
        $this->dispatch('wishlist-added');
    }


    public $columns = [
    'wishlist' => 'Wishlist',
    'applied' => 'Applied',
    'screening' => 'Screening',
    'interviewing' => 'Interviewing',
    'offer' => 'Offer',
    'not_accepting' => 'No longer Accepting',
];

    protected $listeners = ['updateApplicationStatus'];

    public function updateApplicationStatus($applicationId, $newStatus)
    {
        $application = Application::find($applicationId);
        
        if ($application && $application->user_id === auth()->id()) {
            $application->status = $newStatus;
            $application->save();
            
            $this->dispatch('application-updated');
        }
    }

    public function render()
    {
        $applications = auth()->user()->applications()
            ->withWishlist()  // This includes wishlist items
            ->get()
            ->groupBy('status');

        return view('livewire.kanban-board', [
            'applications' => $applications
        ]);
    }
}