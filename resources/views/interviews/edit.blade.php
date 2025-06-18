<x-layouts.app :title="__('Edit Interview')">
    <div class="max-w-lg mx-auto py-8">
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-6">
            <h2 class="text-xl font-bold mb-4 text-neutral-900 dark:text-white">Edit Interview</h2>
            <form action="{{ route('interviews.update', $interview) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
                    <input type="text" name="title" value="{{ old('title', $interview->title) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-neutral-800 dark:border-neutral-700 p-2" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date & Time</label>
                    <input type="datetime-local" name="scheduled_at"
                        value="{{ old('scheduled_at', $interview->scheduled_at ? $interview->scheduled_at->format('Y-m-d\TH:i') : '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-neutral-800 dark:border-neutral-700 p-2" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Notes</label>
                    <textarea name="notes" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-neutral-800 dark:border-neutral-700 p-2">{{ old('notes', $interview->notes) }}</textarea>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('interviews.calendar') }}" class="px-4 py-2 bg-neutral-200 text-neutral-700 rounded hover:bg-neutral-300">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>