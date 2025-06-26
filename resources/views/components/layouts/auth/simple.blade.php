<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-black">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <div class="">
                        <img src="/images/jp.png" alt="JobProfi Logo" class="w-10 h-10">
                        <!-- <i class="fas fa-rocket text-black"></i> -->
                    </div>
                    <!-- <span class="text-2xl font-bold font-mono text-blue-600 bg-clip-text text-transparent">
                        JOBPROFI
                    </span> -->
                </div>
                <span class="sr-only">{{ config('app.name', 'JobProfi') }}</span>
            </a>
            <div class="flex flex-col gap-6">
                {{ $slot }}
            </div>
        </div>
    </div>
    @fluxScripts
</body>
</html>
