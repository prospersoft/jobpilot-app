<x-layouts.app :title="__('User Management')">
    <div class="max-w-3xl mx-auto py-8">
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-neutral-900 dark:text-white">Team members</h2>
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400 text-sm font-semibold">
                    {{ $users->count() }} 
                </span>
            </div>
            <div class="overflow-x-auto">
                <div class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                    @foreach($users as $user)
                        <div class="flex items-center justify-between py-4 border-b border-neutral-200 dark:border-neutral-700">
                            <div class="flex items-center gap-4 min-w-0">
                                <flux:avatar name="{{ $user->name }}" />

                                <div class="flex flex-col min-w-0">
                                    <span class="font-semibold text-neutral-900 dark:text-white truncate">
                                        {{ $user->name }}
                                        @if(auth()->id() === $user->id)
                                            <flux:badge size="sm" color="blue" class="ml-1 max-sm:hidden">You</flux:badge>
                                        @endif
                                    </span>
                                    <span class="text-sm text-neutral-500 dark:text-neutral-400 truncate">{{ $user->email }}
                                    </span>
                                    <span class="text-sm text-neutral-500 dark:text-neutral-400 truncate">{{ $user->country ?: 'N/A' }}</span>
                                         
                                    </span>
                                    <span class="text-sm text-neutral-500 dark:text-neutral-400 truncate">Joined: {{ $user->created_at->format('M d, Y') }}
                                        
                                        
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2" x-data="{ showConfirmDelete: false, showConfirmUpdate: false, selectedRole: '{{ $user->role }}' }">
                                @if(auth()->user()->role === 'admin' && $user->id !== auth()->id())
                                    <!-- Update Role Button triggers confirmation modal -->
                                    <form @submit.prevent="showConfirmUpdate = true" class="flex items-center gap-2">
                                        <flux:select wire:model="Role" placeholder="{{ $user->role }}" class="w-32" x-model="selectedRole">
                                            <flux:select.option>user</flux:select.option>
                                            <flux:select.option>admin</flux:select.option>
                                        </flux:select>
                                        <flux:button size="sm" variant="primary" icon="check" type="submit" />
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
                                    <!-- Delete Button and Modal -->
                                    <flux:button type="button" variant="subtle" icon="trash" class="shrink-0" @click="showConfirmDelete = true" />
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
                                @else
                                    <flux:badge size="sm" color="gray">{{ ucfirst($user->role) }}</flux:badge>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>