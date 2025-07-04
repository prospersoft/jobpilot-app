<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')

        <style>
            @layer utilities {
                .custom-scrollbar {
                    @apply max-h-[400px] overflow-y-auto !important;
                }
                .custom-scrollbar::-webkit-scrollbar {
                    @apply w-2 !important;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb {
                    @apply bg-gray-700 rounded-full !important;
                }
                .custom-scrollbar::-webkit-scrollbar-track {
                    @apply bg-gray-800 !important;
                }
            }
        </style>
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center  rtl:space-x-reverse" wire:navigate>
                <div class="">
                    <img src="/images/jpb2.png" alt="JobProfi Logo" class="w-10 h-10 block dark:hidden">
                    <img src="/images/jpw.png" alt="JobProfi Logo" class="w-10 h-10 hidden dark:block">
                    <!-- <i class="fas fa-rocket text-black"></i> -->
                </div>
                <span class="text-2xl  font-mono 
                gradienttext-zinc-900 dark:text-white bg-clip-text">
                    JOBPROFI
                </span>
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="document-text" 
                        :href="route('applications.index')" 
                        :current="request()->routeIs('applications.index') || request()->routeIs('applications.create') || request()->routeIs('applications.edit')" 
                        wire:navigate
                        class="mt-2"
                    >
                        {{ __('Applications') }}
                        <span class="ml-auto inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-blue-600 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-200">
                            {{ auth()->user()->applications()->count() }}
                        </span>
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="heart" 
                        :href="route('wishlists.index')" 
                        :current="request()->routeIs('wishlists.*')" 
                        wire:navigate
                        class="mt-2"
                    >
                        {{ __('Wishlists') }}
                        <span class="ml-auto inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-900 bg-red-400 rounded-full dark:bg-red-00 dark:text-red-200">
                            {{ auth()->user()->wishlists()->count() }}
                        </span>
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="layout-grid" 
                        :href="route('applications.board')" 
                        :current="request()->routeIs('applications.board')" 
                        class="mt-3" 
                        wire:navigate
                    >
                        {{ __('Kanban Board') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="calendar" 
                        :href="route('interviews.calendar')" 
                        :current="request()->routeIs('interviews.calendar')" 
                        class="mt-3" 
                        wire:navigate
                    >
                        {{ __('Interview Calendar') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="document-text" 
                        :href="route('resume.create')" 
                        :current="request()->routeIs('resume.create')" 
                        class="mt-3" 
                        wire:navigate
                    >
                        {{ __('Resume Builder') }}
                    </flux:navlist.item>

                    
                    @if(auth()->user() && auth()->user()->role === 'admin')
                    <flux:navlist.item 
                        icon="users" 
                        :href="route('users.index')" 
                        :current="request()->routeIs('users.index')" 
                        class="mt-3" 
                        wire:navigate
                    >
                        {{ __('Users') }}
                    </flux:navlist.item>
                    @endif
                </flux:navlist.group>
            </flux:navlist>

            <!-- Add the follow-ups section here -->
            <div class="px-4 mt-6 h-[calc(100vh-24rem)] overflow-y-auto custom-scrollbar">
                <flux:navlist.group :heading="__('Follow-ups')" class="grid">
                    <div class="space-y-3">
                        @forelse($pendingFollowUps ?? [] as $followUp)
                            <div class="p-3 bg-neutral-50 dark:bg-neutral-800 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium text-neutral-900 dark:text-white text-sm">
                                            {{ $followUp->application?->company_name ?? 'Application Deleted' }}
                                        </p>
                                        <p class="text-xs text-neutral-600 dark:text-neutral-400">
                                            Due: {{ $followUp->follow_up_date->format('M j') }}
                                        </p>
                                    </div>
                                    <button 
                                        onclick="markFollowUpComplete({{ $followUp->id }})" 
                                        class="text-green-600 hover:text-green-800 dark:text-green-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                No pending follow-ups
                            </p>
                        @endforelse
                    </div>
                </flux:navlist.group>
            </div>


            
            <flux:spacer />

           

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <flux:menu.item 
                            as="button" 
                            type="submit" 
                            icon="power"
                            class="w-full text-left text-red-600 hover:bg-red-50 dark:hover:bg-red-950"
                        >
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                   <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <flux:menu.item 
                        as="button" 
                        type="submit" 
                        icon="power" 
                        class="w-full text-left text-red-600 hover:bg-red-50 dark:hover:bg-red-950"
                    >
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @livewire('livewire-ui-modal')
        @fluxScripts
    </body>
</html>
