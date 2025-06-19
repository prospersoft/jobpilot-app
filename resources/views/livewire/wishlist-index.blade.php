<div class="container mx-auto px-4 bg-white   dark:bg-neutral-900 p-6 rounded-xl shadow-lg sm:px-6 lg:px-8 py-8">
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold  text-neutral-900 dark:text-white">My Wishlists</h2>
        <div class="flex space-x-4">
            @livewire('add-wishlist-form')
            <a href="{{ route('applications.board') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
                View Board
            </a>
        </div>
    </div>

    @if($wishlists->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                <thead>
                    <tr class="bg-neutral-50 dark:bg-neutral-800">
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Company</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Job Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Location</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Salary Range</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                    @foreach($wishlists as $wishlist)
                        <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-semibold text-sm">{{ substr($wishlist->company_name ?: 'C', 0, 1) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-neutral-900 dark:text-white">{{ $wishlist->company_name }}</div>
                                        @if($wishlist->job_link)
                                            <a href="{{ $wishlist->job_link }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">View Job Post →</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900 dark:text-white">{{ $wishlist->job_title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-500 dark:text-neutral-400">{{ $wishlist->location }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-500 dark:text-neutral-400">{{ $wishlist->salary_range ?: 'Not specified' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-3">
                                    <button 
                                        wire:click="$dispatch('confirmDelete', { id: {{ $wishlist->id }} })"
                                        type="button"
                                        class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a href="{{ route('applications.create', ['company_name' => $wishlist->company_name, 'job_title' => $wishlist->job_title]) }}" 
                                       class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        <i class="fas fa-plus"></i> Add to Applications
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-neutral-400 dark:text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-neutral-900 dark:text-white">No items in wishlist</h3>
            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Start by adding jobs you're interested in to your wishlist.</p>
        </div>
    @endif

    @livewire('delete-wishlist-confirmation')
</div>
