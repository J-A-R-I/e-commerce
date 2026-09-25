<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased flex flex-col">
    <flux:header container class="border-b border-zinc-200 bg-white/70 dark:border-zinc-800 dark:bg-zinc-900/70 backdrop-blur-md sticky top-0 z-50">
        <flux:sidebar.toggle class="lg:hidden mr-2" icon="bars-2" inset="left" />

        <div class="flex items-center gap-3">
            <x-app-logo-icon class="size-8 fill-current text-zinc-900 dark:text-white" />
            <span class="font-bold text-lg tracking-tight">{{ config('app.name', 'E-Commerce') }}</span>
        </div>

        <flux:navbar class="-mb-px max-lg:hidden ml-6">
            <flux:navbar.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                {{ __('Home') }}
            </flux:navbar.item>
        </flux:navbar>

        <flux:spacer />

        <div class="flex items-center gap-3">
            @auth
                <x-desktop-user-menu />
            @else
                <flux:button href="{{ route('login') }}" variant="ghost" size="sm" wire:navigate>
                    {{ __('Inloggen') }}
                </flux:button>
                <flux:button href="{{ route('register') }}" variant="primary" size="sm" wire:navigate>
                    {{ __('Registreren') }}
                </flux:button>
            @endauth
        </div>
    </flux:header>

    <!-- Mobile Menu -->
    <flux:sidebar collapsible="mobile" sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.header>
            <div class="flex items-center gap-3">
                <x-app-logo-icon class="size-8 fill-current text-zinc-900 dark:text-white" />
                <span class="font-bold text-lg tracking-tight">{{ config('app.name', 'E-Commerce') }}</span>
            </div>
            <flux:sidebar.collapse class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                {{ __('Home') }}
            </flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>

    {{ $slot }}

    @persist('toast')
        <flux:toast.group>
            <flux:toast />
        </flux:toast.group>
    @endpersist

    @fluxScripts
</body>

</html>
