<x-layouts.app :title="__('User Management')">
    <div class="max-w-3xl mx-auto py-8">
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-6">
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white mb-6">User Management</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-600 dark:text-neutral-300 uppercase">Name</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-600 dark:text-neutral-300 uppercase">Email</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-600 dark:text-neutral-300 uppercase">Country</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-600 dark:text-neutral-300 uppercase">Joined</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-600 dark:text-neutral-300 uppercase">Role</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @foreach($users as $user)
                            <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                <td class="px-4 py-3 text-neutral-900 dark:text-white">{{ $user->name }}</td>
                                <td class="px-4 py-3 text-neutral-700 dark:text-neutral-300">{{ $user->email }}</td>
                                <td class="px-4 py-3 text-neutral-700 dark:text-neutral-300">{{ $user->country ?? '-' }}</td>
                                <td class="px-4 py-3 text-neutral-700 dark:text-neutral-300">
                                    {{ $user->created_at ? $user->created_at->format('M d, Y') : '-' }}
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium
                                        @if($user->role === 'admin') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400
                                        @else bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400
                                        @endif">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    @if(auth()->user()->role === 'admin' && $user->id !== auth()->id())
                                        <div x-data="{ showConfirmDelete: false, showConfirmUpdate: false, selectedRole: '{{ $user->role }}' }" class="flex items-center gap-2">
                                            <!-- Update Role Button triggers confirmation modal -->
                                            <form @submit.prevent="showConfirmUpdate = true" class="flex items-center gap-2">
                                               <flux:select name="role" class="w-28" x-model="selectedRole">
                                                    <option value="user" :selected="selectedRole === 'user'">User</option>
                                                    <option value="admin" :selected="selectedRole === 'admin'">Admin</option>
                                                </flux:select>
                                                <flux:button type="submit" variant="primary" class="px-3 py-1 text-xs">
                                                    Update
                                                </flux:button>
                                            </form>
                                            <!-- Update Confirmation Modal -->
                                            <div x-show="showConfirmUpdate" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
                                                <div class="bg-white dark:bg-neutral-900 rounded-lg shadow-lg p-6 w-full max-w-sm">
                                                    <h2 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Update Role</h2>
                                                    <p class="mb-6 text-neutral-700 dark:text-neutral-300">
                                                        Are you sure you want to update this user's role?
                                                    </p>
                                                    <div class="flex justify-end gap-2">
                                                        <flux:button type="button" @click="showConfirmUpdate = false">Cancel</flux:button>
                                                        <form action="{{ route('users.updateRole', $user) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="role" :value="selectedRole">
                                                            <flux:button type="submit" variant="primary">Yes, Update</flux:button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Button and Modal unchanged -->
                                            <flux:button type="button" variant="danger" class="px-3 py-1 text-xs"
                                                @click="showConfirmDelete = true">
                                                Delete
                                            </flux:button>
                                            <div x-show="showConfirmDelete" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
                                                <div class="bg-white dark:bg-neutral-900 rounded-lg shadow-lg p-6 w-full max-w-sm">
                                                    <h2 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Delete User</h2>
                                                    <p class="mb-6 text-neutral-700 dark:text-neutral-300">
                                                        Are you sure you want to delete this user and all their data? This action cannot be undone.
                                                    </p>
                                                    <div class="flex justify-end gap-2">
                                                        <flux:button type="button" @click="showConfirmDelete = false">Cancel</flux:button>
                                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <flux:button type="submit" variant="danger">Yes, Delete</flux:button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-xs text-neutral-400">—</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>