<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Top Stats Cards -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Total Applications Card -->
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Total Applications</p>
                        <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ $totalApplications ?? 0 }}</p>
                        <p class="text-sm text-green-600 dark:text-green-400">
                            <span class="inline-flex items-center">
                                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17H7V7"></path>
                                </svg>
                                +{{ $weeklyIncrease ?? 0 }}% this week
                            </span>
                        </p>
                    </div>
                    <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900/20">
                        <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Interviews Card -->
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Active Interviews</p>
                        <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ $activeInterviews ?? 0 }}</p>
                        <p class="text-sm text-green-600 dark:text-green-400 mt-1">
                            {{ $upcomingInterviews ?? 0 }} upcoming this week
                        </p>
                    </div>
                    <div class="rounded-full bg-green-100 p-3 dark:bg-green-900/20">
                        <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Response Rate Card -->
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Response Rate</p>
                        <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ $responseRate ?? 0 }}%</p>
                        <p class="text-sm text-orange-600 dark:text-orange-400">
                            {{ $pendingResponses ?? 0 }} pending responses
                        </p>
                    </div>
                    <div class="rounded-full bg-orange-100 p-3 dark:bg-orange-900/20">
                        <svg class="h-8 w-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 00-2-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-900">
            <div class="grid h-full grid-cols-1 lg:grid-cols-3 gap-6 p-6">
                <!-- Application Pipeline -->
                <div class="lg:col-span-2">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-2">Application Pipeline</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $applied ?? 0 }}</div>
                                <div class="text-sm text-neutral-600 dark:text-neutral-400">Applied</div>
                            </div>
                            <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ $screening ?? 0 }}</div>
                                <div class="text-sm text-neutral-600 dark:text-neutral-400">Screening</div>
                            </div>
                            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $interviewing ?? 0 }}</div>
                                <div class="text-sm text-neutral-600 dark:text-neutral-400">Interviewing</div>
                            </div>
                            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $offers ?? 0 }}</div>
                                <div class="text-sm text-neutral-600 dark:text-neutral-400">Offers</div>
                            </div>
                            <div class="!bg-red-200 dark:bg-red-200/20 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-red-800 dark:text-red-800">{{ $notAccepting ?? 0 }}</div>
                                <div class="text-sm text-black dark:text-black">No longer Accepting</div>
                            </div>
                            <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-green-600 dark:text-green-400">Accepted</p>
                                    <p class="text-2xl font-bold text-green-800 dark:text-green-300">
                                        {{ $accepted ?? 0 }}
                                    </p>
                                </div>
                                <div class="p-3 bg-green-100 dark:bg-green-800/40 rounded-full">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                            <div class="!bg-orange-200 dark:bg-orange-200/20 p-4 rounded-lg">
                            <div class="text-2xl font-bold !text-orange-800 dark:!text-orange-800 mb-2">
                                {{ $mostAppliedRoles->sum('total') ?? 0 }}
                            </div>
                            <div class="text-sm text-black dark:text-black font-semibold mb-1">Most Applied Roles</div>
                            <ul class="mt-2 space-y-1">
                                @forelse($mostAppliedRoles as $role)
                                    <li class="flex justify-between items-center">
                                        <span class="text-xs !text-black text-neutral-900 dark:text-neutral-100">{{ $role->job_title }}</span>
                                        <span class="text-xs font-bold text-orange-800 dark:text-orange-400">{{ $role->total }}</span>
                                    </li>
                                @empty
                                    <li class="text-xs text-neutral-500 !text-black dark:text-neutral-400">No repeated roles yet</li>
                                @endforelse
                            </ul>
                        </div>
                        </div>
                    </div>

                    <!-- Recent Applications -->
                    <div class="flex-1 min-h-0 "> <!-- Add flex-1 and min-h-0 to ensure proper height calculation -->
                        <div class="flex items-center justify-between mb-4 ">
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Recent Applications</h3>
                            <a href="{{ route('applications.index') }}">
                                <flux:button  class="text-sm !bg-blue-600 hover:!bg-blue-700 text-white border !border-blue-600">
                                    View all
                                </flux:button>
                            </a>
                        </div>
                        <div class="h-[calc(100vh-24rem)] overflow-y-auto px-1
                            scrollbar scrollbar-thin scrollbar-thumb-rounded-md
                            scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 
                            scrollbar-track-gray-200 dark:scrollbar-track-gray-800 
                            hover:scrollbar-thumb-gray-500 dark:hover:scrollbar-thumb-gray-500">
                            @forelse($recentApplications ?? [] as $application)
                                <div class="flex items-center justify-between p-4 bg-neutral-50 dark:bg-neutral-800 rounded-lg mb-3">
                                    <div class="flex items-center space-x-4">
                                        <flux:avatar name="{{ $application->company_name }}" />
                                        

                                        <div>
                                            <h4 class="font-medium text-neutral-900 dark:text-white">{{ $application->job_title ?? 'Job Title' }}</h4>
                                            <p class="text-sm text-neutral-600 dark:text-neutral-400">{{ $application->company_name ?: 'Company Not Specified' }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if(($application->status ?? 'applied') === 'applied') bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400
                                            @elseif(($application->status ?? 'applied') === 'interviewing') bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-400
                                            @elseif(($application->status ?? 'applied') === 'offer') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400
                                            @elseif(($application->status ?? 'applied') === 'not_accepting') !bg-red-200 !text-red-800/90 dark:bg-red-200/20 dark:text-red-900
                                            @elseif(($application->status ?? 'applied') === 'wishlist') bg-red-100 text-red-800 dark:bg-purple-300/20 dark:text-purple-300

                                            @else bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400
                                            @endif">
                                            {{ ucfirst($application->status ?? 'Applied') }}
                                        </span>
                                        <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">{{ ($application->created_at ?? now())->format('M j') }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <svg class="mx-auto h-12 w-12 text-neutral-400 dark:text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">No applications yet</p>
                                    <a href="{{ route('applications.create') }}">
                                        <flux:button class="mt-2 text-sm !bg-blue-600 hover:!bg-blue-700 text-white">
                                            Add your first application
                                        </flux:button>
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                </div>

                

                <!-- Sidebar -->
                                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div>
                        <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('applications.create') }}" class="">
                                <flux:button class="w-full mb-2 flex items-center bg-blue-50 dark:bg-blue-900/20">
                                    <svg class="h-5 w-5 text-blue-600 dark:text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add Application
                                </flux:button>
                            </a>
                            <a href="{{ route('interviews.calendar') }}">
                                <flux:button  class="w-full flex items-center bg-green-50 dark:bg-green-900/20">
                                    <svg class="h-5 w-5 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                    </svg>
                                    Schedule Interview
                                </flux:button>
                            </a>
                            <a href="{{ route('contacts.index') }}">
                                <!-- <flux:button  class="w-full mt-2 flex items-center bg-purple-50 dark:bg-purple-900/20">
                                    <svg class="h-5 w-5 text-purple-600 dark:text-purple-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Add Contact
                                </flux:button> -->
                            </a>
                        </div>
                    </div>

                    <!-- Upcoming Interviews -->
                    <div>
                        <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">Upcoming Interviews</h3>
                        <div class="space-y-3">
                            @forelse($upcomingInterviewsList ?? [] as $interview)
                                <div class="p-3 bg-neutral-50 dark:bg-neutral-800 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-medium text-neutral-900 dark:text-white text-sm">
                                                {{ $interview->title ?? 'Interview' }}
                                            </p>
                                            @if(!empty($interview->company_name) || !empty($interview->job_title))
                                                <p class="text-xs text-neutral-600 dark:text-neutral-400">
                                                    {{ $interview->company_name ?? '' }}{{ $interview->company_name && $interview->job_title ? ' — ' : '' }}{{ $interview->job_title ?? '' }}
                                                </p>
                                            @endif
                                            @if(!empty($interview->notes))
                                                <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1 italic">
                                                    {{ Str::limit($interview->notes, 40) }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="text-right space-y-1">
                                            <p class="text-xs font-medium text-neutral-900 dark:text-white">
                                                {{ optional($interview->scheduled_at)->format('M j') }}
                                            </p>
                                            <p class="text-xs text-neutral-600 dark:text-neutral-400">
                                                {{ optional($interview->scheduled_at)->format('g:i A') }}
                                            </p>
                                            <div class="flex items-center justify-end gap-2 mt-1">
                                                <a href="{{ route('interviews.edit', $interview) }}">
                                                    <button class="">
                                                        <i class="fa-solid fa-pen-to-square  text-blue-400"></i>
                                                    </button>
                                                </a>
                                                <form action="{{ route('interviews.destroy', $interview) }}" method="POST" class="inline" onsubmit="return confirm('Delete this interview?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="">
                                                         <i class="fas fa-trash-alt text-red-400"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <svg class="mx-auto h-8 w-8 text-neutral-400 dark:text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="mt-2 text-xs text-neutral-600 dark:text-neutral-400">No upcoming interviews</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Goals Progress -->
                    <div>
                        <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">Weekly Goals</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-neutral-600 dark:text-neutral-400">Applications</span>
                                    <span class="text-sm font-medium text-neutral-900 dark:text-white">{{ $weeklyApplications ?? 0 }}/{{ $weeklyGoal ?? 5 }}</span>
                                </div>
                                <div class="w-full bg-neutral-200 dark:bg-neutral-700 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ min(100, (($weeklyApplications ?? 0) / ($weeklyGoal ?? 5)) * 100) }}%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2 ">
                                    <span class="text-sm text-neutral-600 dark:text-neutral-400">Follow-ups</span>
                                    <span class="text-sm font-medium text-neutral-900 dark:text-white">{{ $weeklyFollowups ?? 0 }}/{{ $followupGoal ?? 3 }}</span>
                                </div>
                                <div class="w-full bg-neutral-200 dark:bg-neutral-700 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full" style="width: {{ min(100, (($weeklyFollowups ?? 0) / ($followupGoal ?? 3)) * 100) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>               
                </div>
                
            </div>
        </div>
    </div>


</x-layouts.app>