<x-layouts.app :title="__('Applications')">
    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Applications</h1>
            <a href="{{ route('applications.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 rounded-lg text-white hover:bg-blue-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Application
            </a>
        </div>

        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-neutral-200 dark:border-neutral-700">
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Company</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Position</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Applied Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse ($applications as $application)
                            <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $application->company_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $application->job_title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($application->status === 'applied') bg-blue-100 text-blue-800
                                        @elseif($application->status === 'screening') bg-yellow-100 text-yellow-800
                                        @elseif($application->status === 'interviewing') bg-purple-100 text-purple-800
                                        @elseif($application->status === 'offer') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $application->applied_date->format('M j, Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('applications.edit', $application) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                    <button type="button" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-neutral-500">
                                    No applications found. Start by adding your first application!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-3">
                {{ $applications->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>