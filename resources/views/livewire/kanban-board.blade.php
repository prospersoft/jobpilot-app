<div class="kanban-board bg-white   dark:bg-neutral-900 p-6 rounded-xl shadow-lg">
    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-black  dark:!text-neutral-100">Job Applications Board</h2>
        <div class="flex flex-col gap-2 sm:flex-row sm:gap-2 w-full sm:w-auto">
        <!-- Wishlist Button -->
        <flux:button 
            wire:click="$toggle('showWishlistForm')"
            variant="primary"
            class="bg-blue-600 hover:bg-blue-700 text-white w-full sm:w-auto"
        >
            Add to Wishlist
        </flux:button>

        <!-- Add Job Button -->
        <a href="{{ route('applications.create') }}" 
        class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 rounded-lg text-white hover:bg-blue-700 transition-colors w-full sm:w-auto"
        >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Job
        </a>
    </div>
    </div>
    


    <!-- Wishlist Form Modal -->
    @if($showWishlistForm)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-neutral-900 p-6 rounded-xl w-full max-w-md mx-4 shadow-lg">
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-100 mb-4">Add to Wishlist</h3>
                <form wire:submit="addToWishlist" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Job Title</label>
                        <flux:input 
                            type="text" 
                            wire:model="newWishlist.job_title"
                            class="mt-1 w-full"
                        />
                        @error('newWishlist.job_title') 
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Company</label>
                        <flux:input 
                            type="text" 
                            wire:model="newWishlist.company_name"
                            class="mt-1 w-full"
                        />
                        @error('newWishlist.company_name') 
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-neutral-100">Notes</label>
                        <flux:textarea 
                            wire:model="newWishlist.notes"
                            rows="3"
                            class="mt-1 w-full"
                        ></flux:textarea>
                    </div>

                    <div class="flex justify-end gap-3">
                        <flux:button 
                            type="button"
                            variant="primary"
                            wire:click="$toggle('showWishlistForm')"
                            class="bg-gray-600 hover:bg-gray-700 text-white"
                        >
                            Cancel
                        </flux:button>
                        <flux:button 
                            type="submit"
                            variant="primary"
                            class="bg-blue-600 hover:bg-blue-700 text-white"
                        >
                            Add to Wishlist
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    
    <div class="flex gap-6 overflow-x-auto pb-4">
        @foreach($columns as $status => $title)
        
            <div 
                class="kanban-column bg-white dark:bg-neutral-800 rounded-lg shadow-md p-4 w-64 flex-shrink-0"
                data-status="{{ $status }}"
                x-data="dropZone"
                x-on:dragover.prevent="onDragOver($event)"
                x-on:drop="onDrop($event)"
            >
                <div class="kanban-column-header flex items-center justify-between mb-2">
                <div>
                    <span class="font-semibold text-neutral-900 dark:text-neutral-100">{{ $title }}</span>
                    <span class="ml-2 inline-flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 text-xs px-2 py-0.5">
                        {{ $applications->get($status)?->count() ?? 0 }}
                    </span>
                </div>
                @if($status === 'wishlist')
                    <flux:button
                        wire:click="$toggle('showWishlistForm')"
                        variant="primary"
                        class="ml-2 bg-blue-600 hover:bg-blue-700 text-white"
                    >
                        <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add
                    </flux:button>
                @endif
            </div>

                <div class="kanban-cards-container">
                    @forelse($applications->get($status, collect()) as $application)
                        <div
                            class="kanban-card bg-white dark:bg-neutral-800 rounded-lg shadow p-4 mb-2 cursor-pointer"
                            draggable="true"
                            data-id="{{ $application->id }}"
                            data-status="{{ $application->status }}"
                            x-on:dragstart="onDragStart($event)"
                            x-on:dragend="onDragEnd($event)"
                        >
                            <h4 class="kanban-card-title text-neutral-900 dark:text-neutral-100 font-semibold mb-1">
                                <a href="{{ route('applications.show', $application) }}" class="hover:underline">
                                    {{ $application->job_title }}
                                </a>
                                {{ $application->job_title }}
                            </h4>
                            <p class="kanban-card-company text-neutral-700 dark:text-neutral-300 text-sm mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 12l2-2m0 0l7-7m-7 2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2zm0 0l7 7m0 0l2 2m-2-2l7-7m  7 0l-2 2m-7-7l-2 2m0 0l-7 7m14 0l-7 7m0 0l-2 2m2-2l7-7" />
                                </svg>  
                                {{ $application->company_name }}
                            </p>
                            <div class="kanban-card-date">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $application->created_at->format('M j, Y') }}
                            </div>
                        </div>
                    @empty
                        <div class="text-neutral-500 text-sm text-center py-4">
                            @if($status === 'wishlist')
                                Add jobs you're interested in
                            @else
                                No applications
                            @endif
                        </div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</div>

