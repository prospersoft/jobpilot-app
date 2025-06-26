<x-layouts.app :title="__('Application Details')">
    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Application Details</h1>
            <div class="flex gap-2">
                <a href="{{ route('applications.index') }}">
                    <flux:button variant="primary" class="bg-gray-600 hover:bg-gray-700 text-white">
                        <i class="fa fa-arrow-left"></i>
                    </flux:button>
                </a>
                <a href="{{ route('applications.edit', $application) }}">
                    <flux:button variant="primary" class="bg-green-600 hover:bg-green-700 text-white">
                        Edit
                    </flux:button>
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-6">
            <!-- Application Details -->
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Company</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-white">{{ $application->company_name }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Position</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-white">{{ $application->job_title }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                    <dd class="mt-1">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if($application->status === 'applied') bg-blue-100 text-blue-800
                            @elseif($application->status === 'screening') bg-yellow-100 text-yellow-800
                            @elseif($application->status === 'interviewing') bg-purple-100 text-purple-800
                            @elseif($application->status === 'offer') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($application->status) }}
                        </span>
                    </dd>
                </div>

                 <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Job Type</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-white">{{ $application->job_type }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-white">{{ $application->category }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Applied Date</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-white">{{ $application->applied_date->format('M j, Y') }}</dd>
                </div>
            </dl>

            <!-- Documents Section -->
            @if($application->documents->isNotEmpty())
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Documents</h3>
                    <div class="space-y-4">
                        @foreach($application->documents as $document)
                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-neutral-800 rounded-lg">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ ucfirst($document->type) }}: {{ $document->original_filename }}
                                    </span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('applications.documents.download', $document) }}">
                                        <flux:button variant="primary" class="text-xs bg-blue-600 hover:bg-blue-700 text-white border !border-blue-600">
                                            <i class="fa fa-download"></i>
                                            Download
                                        </flux:button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>