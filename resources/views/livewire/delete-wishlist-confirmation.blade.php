<div>
    @if($showDeleteModal)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-neutral-900 p-6 rounded-xl w-full max-w-md mx-4">
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">Delete Wishlist Item</h3>
                <p class="text-neutral-600 dark:text-neutral-400 mb-4">
                    Are you sure you want to delete this wishlist item? This action cannot be undone.
                </p>
                <div class="flex justify-end space-x-3">
                    <button 
                        type="button" 
                        wire:click="$set('showDeleteModal', false)"
                        class="px-4 py-2 bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-800 dark:hover:bg-neutral-700 text-neutral-700 dark:text-neutral-300 rounded-md"
                    >
                        Cancel
                    </button>
                    <button 
                        type="button"
                        wire:click="delete"
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
