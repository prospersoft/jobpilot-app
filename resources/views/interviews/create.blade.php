<x-layouts.app :title="__('Schedule Interview')">
    <div class="max-w-lg mx-auto py-8">
        <div class="bg-gray-100 dark:bg-neutral-900 rounded-xl shadow p-6">
            <h2 class="text-xl font-bold mb-4 text-neutral-900 dark:text-white">Schedule Interview</h2>
            <form action="{{ route('interviews.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
                    <flux:input type="text" name="title" value="{{ old('title') }}" required
                        class="mt-1 block w-full" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date & Time</label>
                    <flux:input type="datetime-local" name="scheduled_at"
                        value="{{ old('scheduled_at', isset($date) ? $date . 'T09:00' : '') }}"
                        required
                        class="mt-1 block w-full" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Notes</label>
                    <flux:textarea name="notes" rows="3"
                        class="mt-1 block w-full">{{ old('notes') }}</flux:textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('interviews.calendar') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                        Cancel
                    </a>
                    <flux:button type="submit" variant="primary"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Schedule
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>