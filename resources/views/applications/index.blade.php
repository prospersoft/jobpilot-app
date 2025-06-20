<x-layouts.app :title="__('Applications')">
      <style>
        .notification-container {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            z-index: 50;
        }

        .notification {
            min-width: 300px;
            transform: translateY(0);
            opacity: 1;
            transition: all 0.3s ease-in-out;
        }

        .notification.hiding {
            transform: translateY(100%);
            opacity: 0;
        }

        
    </style>
   <div class="flex flex-col gap-4" x-data="{ show: false, form: null }">
        <!-- Notification Container -->
        <div class="notification-container">
            @if (session('success'))
            <div id="success-alert" class="notification bg-black text-white px-4 py-3 rounded-lg shadow-lg flex items-center justify-between mb-4 relative">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-300 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
                <button type="button" onclick="document.getElementById('success-alert').remove()" class="ml-4 text-white hover:text-gray-300 focus:outline-none">
                    <i class="fa-solid fa-xmark fa-lg"></i>
                </button>
            </div>
        @endif
        </div>
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Applications</h1>
            <a href="{{ route('applications.create') }}">
                <flux:button variant="primary" class="bg-blue-600 hover:bg-blue-700 text-white border !border-blue-600">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Application
                </flux:button>
            </a>
        </div>

        <form method="GET" action="{{ route('applications.index') }}" class="mb-4 flex flex-col md:flex-row gap-2">
            <flux:input type="text" name="search" value="{{ request('search') }}" placeholder="Search company or job title"
                class="w-full md:w-1/3" />
            <flux:select name="status" class="w-full md:w-auto">
                <option value="">All Statuses</option>
                @foreach(['applied', 'screening', 'interviewing', 'offer', 'rejected', 'withdrawn', 'not_accepting', 'accepted', 'wishlist'] as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                @endforeach
            </flux:select>
            <flux:button type="submit" variant="primary" class="bg-blue-600 hover:bg-blue-700 text-white border !border-blue-600">Filter</flux:button>
        </form>

        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <!-- ...thead... -->
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
                                <td class="px-6 py-4 whitespace-nowrap">{{ optional($application->created_at)->format('M j') ?? 'No date' }}</td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('applications.show', $application) }}">
                                        <button variant="primary" class="px-2 py-1 text-xs  text-white">
                                            <i class="fa fa-eye text-blue-400"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('applications.edit', $application) }}">
                                        <button  class="px-2 py-1 text-xs text-white">
                                            <i class="fa-solid fa-pen-to-square text-green-400"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('applications.destroy', $application) }}" method="POST" class="inline" data-delete
                                        @submit.prevent="form = $event.target; show = true;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  class="px-2 py-1 text-xs">
                                            <i class="fas fa-trash-alt text-red-400"></i>
                                        </button>
                                    </form>
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

        <!-- Delete Confirmation Modal -->
        <div x-show="show" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overlay">
            <div class="bg-white dark:bg-neutral-900 rounded-lg shadow-lg p-6 w-full max-w-sm">
                <h2 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Delete Application</h2>
                <p class="mb-6 text-neutral-700 dark:text-neutral-300">Are you sure you want to delete this application? This action cannot be undone.</p>
                <div class="flex justify-end gap-2">
                    <flux:button type="button" @click="show = false">Cancel</flux:button>
                    <flux:button type="button" variant="danger" @click="form.submit(); show = false">Yes</flux:button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ['error-alert', 'success-alert'].forEach(id => {
                const alert = document.getElementById(id);
                if (alert) {
                    setTimeout(() => {
                        alert.classList.add('hiding');
                        setTimeout(() => alert.remove(), 300);
                    }, 7000);
                }
            });
        });
    </script>
    @endpush
</x-layouts.app>