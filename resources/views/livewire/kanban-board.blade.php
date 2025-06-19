<div class="kanban-board bg-white dark:bg-neutral-900 p-6 rounded-xl shadow-lg h-[calc(100vh-6rem)]">
    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-black dark:!text-neutral-100">Job Applications Board</h2>
        <div class="flex flex-col gap-2 sm:flex-row sm:gap-2 w-full sm:w-auto">
        

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
    
    <div class="flex gap-6 overflow-x-auto pb-4 h-[calc(100vh-12rem)]
        scrollbar-thin scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 
        scrollbar-track-gray-200 dark:scrollbar-track-gray-800 
        hover:scrollbar-thumb-gray-500 dark:hover:scrollbar-thumb-gray-500">
        @foreach($columns as $status => $title)
        
            <div 
                class="kanban-column bg-white dark:bg-neutral-800 rounded-lg shadow-md p-4 w-64 flex-shrink-0 flex flex-col"
                data-status="{{ $status }}"
                x-data="dropZone"
                x-on:dragover.prevent="onDragOver($event)"
                x-on:drop="onDrop($event)"
            >
                <div class="kanban-column-header flex items-center justify-between mb-2">
                <div>
                    <span class="font-semibold text-neutral-900 dark:text-neutral-100">{{ $title }}</span>
                    <span class="ml-2 inline-flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 text-xs px-2 py-0.5">
                        @if($status === 'wishlist')
                            {{ $wishlists->count() }}
                        @else
                            {{ $applications->get($status)?->count() ?? 0 }}
                        @endif
                    </span>
                </div>
                
            </div>

                <div class="kanban-cards-container overflow-y-auto h-[calc(100vh-12rem)] pr-2 
                    scrollbar-thin scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 
                    scrollbar-track-gray-200 dark:scrollbar-track-gray-800 
                    hover:scrollbar-thumb-gray-500 dark:hover:scrollbar-thumb-gray-500">
                    @if($status === 'wishlist')
                        @forelse($wishlists as $item)
                            <div class="kanban-card bg-white dark:bg-neutral-800 rounded-lg shadow p-4 mb-2">
                                <div class="flex justify-between items-start">
                                    <h4 class="kanban-card-title text-neutral-900 dark:text-neutral-100 font-semibold mb-1">
                                        {{ $item->job_title }}
                                    </h4>
                                    
                                </div>
                                <p class="kanban-card-company text-neutral-700 dark:text-neutral-300 text-sm mb-2">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    {{ $item->company_name }}
                                </p>
                                @if($item->location)
                                    <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $item->location }}
                                        <div class="kanban-card-date text-sm text-neutral-600 dark:text-neutral-400">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $item->created_at->format('M j, Y') }}
                                        </div>
                                    </p>
                                @endif
                                <div class="mt-2 flex justify-end">
                                    <a href="{{ route('applications.create', ['from_wishlist' => $item->id]) }}" 
                                       class="text-blue-600 hover:text-blue-800 text-sm">
                                        Convert to Application →
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-neutral-500 text-sm text-center py-4">
                                Add jobs you're interested in
                            </div>
                        @endforelse
                    @else
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
                                </h4>
                                <p class="kanban-card-company text-neutral-700 dark:text-neutral-300 text-sm mb-2">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    {{ $application->company_name }}
                                </p>
                                <div class="kanban-card-date text-sm text-neutral-600 dark:text-neutral-400">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $application->created_at->format('M j, Y') }}
                                </div>
                            </div>
                        @empty
                            <div class="text-neutral-500 text-sm text-center py-4">
                                No applications
                            </div>
                        @endforelse
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
