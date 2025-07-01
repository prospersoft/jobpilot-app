<x-layouts.app :title="__('My Resumes')">
    <div class="max-w-5xl mx-auto py-10" x-data="{ show: false, form: null }">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-neutral-900 dark:text-white">My Resumes</h1>
            <a href="{{ route('resume.create') }}" class="inline-flex items-center px-5 py-2 rounded-lg font-semibold bg-blue-600 hover:bg-blue-700 text-white border border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Resume
            </a>
        </div>

        @if($resumes->isEmpty())
            <div class="text-center text-neutral-500 dark:text-neutral-400 py-20">
                <svg class="mx-auto h-16 w-16 text-neutral-300 dark:text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 014-4h4m0 0V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2h6a2 2 0 002-2z" />
                </svg>
                <p class="mt-4 text-lg">You have not created any resumes yet.</p>
                <a href="{{ route('resume.create') }}" class="mt-6 inline-block px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold">Create Your First Resume</a>
            </div>
        @else
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($resumes as $resume)
                    <div class="bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-700 rounded-xl shadow-sm p-4 sm:p-6 flex flex-col justify-between h-full min-w-0">
                        <div>
                            <div class="flex items-center justify-between mb-2 gap-2">
                                <h2 class="text-lg sm:text-xl font-bold text-neutral-900 dark:text-white truncate max-w-[60%]">{{ $resume->full_name }}</h2>
                                <span class="inline-block px-2 py-0.5 rounded text-xs font-semibold bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300 max-w-[40%] truncate">{{ $resume->professional_title }}</span>
                            </div>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400 mb-2 line-clamp-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $resume->summary }}</p>
                            <div class="flex flex-wrap gap-2 text-xs text-neutral-500 dark:text-neutral-400 mb-4">
                                @if($resume->email)
                                    <span class="inline-flex items-center min-w-0 truncate">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2h6a2 2 0 002-2z"></path></svg>
                                        {{ $resume->email }}
                                    </span>
                                @endif
                                @if($resume->phone)
                                    <span class="inline-flex items-center min-w-0 truncate">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        {{ $resume->phone }}
                                    </span>
                                @endif
                                @if($resume->location)
                                    <span class="inline-flex items-center min-w-0 truncate">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $resume->location }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-row  mt-4 w-full justify-between">
                            <a href="{{ route('resume.show', $resume) }}" class="flex-1 min-w-0 inline-flex items-center justify-center py-2 rfont-semibold text-sm text-center">
                                <i class="fas fa-eye mr-1 text-purple-500"></i>
                            </a>
                            <a href="{{ route('resume.edit', $resume) }}" class="flex-1 min-w-0 inline-flex items-center justify-center py-2 font-semibold text-sm text-center">
                                <i class="fas fa-edit text-yellow-500"></i>
                            </a>
                            <form action="{{ route('resume.destroy', $resume) }}" method="POST" class="flex-1 min-w-0" data-delete @submit.prevent="form = $event.target; show = true;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full inline-flex items-center justify-center py-2  font-semibold text-sm text-center">
                                    <i class="fas fa-trash-alt text-red-500"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Delete Confirmation Modal -->
        <div x-show="show" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overlay">
            <div class="bg-white dark:bg-neutral-900 rounded-lg shadow-lg p-6 w-full max-w-sm">
                <h2 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Delete Resume</h2>
                <p class="mb-6 text-neutral-700 dark:text-neutral-300">Are you sure you want to delete this resume? This action cannot be undone.</p>
                <div class="flex justify-end gap-2">
                    <flux:button type="button" @click="show = false">Cancel</flux:button>
                    <flux:button type="button" variant="danger" @click="form.submit(); show = false">Yes</flux:button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
