<div>
    <div>
        <button
            type="button"
            wire:click="$toggle('showModal')"
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700"
        >
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add to Wishlist
        </button>
    </div>

    @if($showModal)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-neutral-900 p-6 rounded-xl w-full max-w-md mx-4">
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">Add to Wishlist</h3>
                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label for="job_title" class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Job Title*</label>
                        <flux:input type="text" id="job_title" wire:model="job_title" />
                        @error('job_title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="company_name" class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Company Name*</label>
                        <flux:input type="text" id="company_name" wire:model="company_name" />
                        @error('company_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Location</label>
                        <flux:input type="text" id="location" wire:model="location" />
                        @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="salary_range" class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Salary Range</label>
                        <flux:input type="text" id="salary_range" wire:model="salary_range" />
                        @error('salary_range') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="job_link" class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Job Link</label>
                        <flux:input type="url" id="job_link" wire:model="job_link"
                        placeholder="https://" />
                        @error('job_link') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Notes</label>
                        <flux:textarea id="notes" wire:model="notes" rows="3" />
                        @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" wire:click="$toggle('showModal')" class="px-4 py-2 bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-800 dark:hover:bg-neutral-700 text-neutral-700 dark:text-neutral-300 rounded-md">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
