<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Auth::user()->wishlists()->latest()->get();
        return view('wishlists.index', compact('wishlists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'job_title' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'location' => 'nullable|string|max:255',
                'salary_range' => 'nullable|string|max:255',
                'job_link' => 'nullable|url|max:255',
                'notes' => 'nullable|string',
            ]);

            $wishlist = Auth::user()->wishlists()->create($validated);

            return response()->json([
                'redirect' => redirect()->route('wishlists.index'),
                'message' => 'Job added to wishlist successfully!',
                'wishlist' => $wishlist
            ], 201);
        } catch (\Exception $e) {
            Log::error('Failed to create wishlist item', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'message' => 'Failed to add job to wishlist',
                'errors' => [$e->getMessage()]
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        $wishlists = Wishlist::where('user_id', auth()->id())
        ->latest()
        ->paginate(10);

    return view('wishlists.index', compact('wishlists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        if ($wishlist->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        try {
            $validated = $request->validate([
                'job_title' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'location' => 'nullable|string|max:255',
                'salary_range' => 'nullable|string|max:255',
                'job_link' => 'nullable|url|max:255',
                'notes' => 'nullable|string',
            ]);

            $wishlist->update($validated);

            return response()->json([
                'message' => 'Wishlist updated successfully!',
                'wishlist' => $wishlist
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update wishlist item', [
                'error' => $e->getMessage(),
                'wishlist_id' => $wishlist->id,
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'message' => 'Failed to update wishlist item',
                'errors' => [$e->getMessage()]
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        if ($wishlist->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        try {
            $wishlist->delete();
            return response()->json(['message' => 'Wishlist item removed successfully!']);
        } catch (\Exception $e) {
            Log::error('Failed to delete wishlist item', [
                'error' => $e->getMessage(),
                'wishlist_id' => $wishlist->id,
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'message' => 'Failed to remove wishlist item',
                'errors' => [$e->getMessage()]
            ], 422);
        }
    }
}
