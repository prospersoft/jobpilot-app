<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Application;
use App\Models\Wishlist;
use Illuminate\Support\Collection;

class KanbanBoard extends Component
{   
    public $showWishlistForm = false;
    public $newWishlist = [
        'job_title' => '',
        'company_name' => '',
        'location' => '',
        'salary_range' => '',
        'job_link' => '',
        'notes' => ''
    ];

    public $columns = [
        'wishlist' => 'Wishlist',
        'applied' => 'Applied',
        'screening' => 'Screening',
        'interviewing' => 'Interviewing',
        'offer' => 'Offer',
        'not_accepting' => 'No longer Accepting',
    ];

    protected $listeners = ['updateApplicationStatus', 'wishlist-added', 'wishlist-deleted'];

    public function addToWishlist()
    {
        $validated = $this->validate([
            'newWishlist.job_title' => 'required|string|max:255',
            'newWishlist.company_name' => 'required|string|max:255',
            'newWishlist.location' => 'nullable|string|max:255',
            'newWishlist.salary_range' => 'nullable|string|max:255',
            'newWishlist.job_link' => 'nullable|url|max:255',
            'newWishlist.notes' => 'nullable|string',
        ]);

        auth()->user()->wishlists()->create($this->newWishlist);

        $this->reset('newWishlist', 'showWishlistForm');
        $this->dispatch('wishlist-added');
    }

    public function updateApplicationStatus($applicationId, $newStatus)
    {
        $application = Application::find($applicationId);
        
        if ($application && $application->user_id === auth()->id()) {
            $application->status = $newStatus;
            $application->save();
            
            $this->dispatch('application-updated');
        }
    }

    public function getWishlists(): Collection
    {
        return auth()->user()->wishlists()->latest()->get();
    }

    public function getApplications(): Collection
    {
        return auth()->user()->applications()
            ->whereNotIn('status', ['wishlist'])
            ->latest()
            ->get()
            ->groupBy('status');
    }

    public function deleteWishlist($id)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())->find($id);
        
        if ($wishlist) {
            $wishlist->delete();
            $this->dispatch('wishlist-deleted');
        }
    }

    public function render()
    {
        $wishlists = $this->getWishlists();
        $applications = $this->getApplications();

        return view('livewire.kanban-board', [
            'wishlists' => $wishlists,
            'applications' => $applications,
        ]);
    }
}