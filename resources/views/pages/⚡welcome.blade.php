<?php

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts.frontend')] class extends Component {
    public function with(): array
    {
        return [
            'user' => Auth::user(),
        ];
    }
};
?>

<div class="flex flex-col flex-1 justify-center w-full max-w-4xl mx-auto py-12 sm:py-16">
        @auth
            <div class="grid grid-cols-1 {{ $user->isAdmin() ? 'md:grid-cols-2' : '' }} gap-6">
                @if ($user->isAdmin())
                    <flux:card
                        class="flex flex-col justify-between p-6 hover:border-zinc-400 dark:hover:border-zinc-600 transition space-y-6">
                        <div class="space-y-3">
                            <div
                                class="size-12 rounded-xl bg-amber-500/10 dark:bg-amber-400/10 text-amber-600 dark:text-amber-400 flex items-center justify-center">
                                <flux:icon icon="shield-check" class="size-6" />
                            </div>
                            <flux:heading size="lg">{{ __('Platform Beheer') }}</flux:heading>
                            <flux:text class="text-sm">
                                {{ __('Krijg volledig inzicht in verkopers, gebruikers en systeeminstellingen.') }}
                            </flux:text>
                        </div>

                        <flux:button href="{{ route('backend') }}" variant="primary" icon-trailing="arrow-right"
                            class="w-full">
                            {{ __('Open Admin Backend') }}
                        </flux:button>
                    </flux:card>
                @endif

                @if ($user->isVendor() || $user->isAdmin())
                    <flux:card
                        class="flex flex-col justify-between p-6 hover:border-zinc-400 dark:hover:border-zinc-600 transition space-y-6">
                        <div class="space-y-3">
                            <div
                                class="size-12 rounded-xl bg-indigo-500/10 dark:bg-indigo-400/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                                <flux:icon icon="building-storefront" class="size-6" />
                            </div>

                            <div>
                                <flux:heading size="lg">
                                    {{ $user->store ? $user->store->name : __('Jouw eigen winkel') }}
                                </flux:heading>
                                <span class="text-xs font-mono text-zinc-500">
                                    {{ $user->store ? __('Winkel eigenaar') : __('Start met verkopen') }}
                                </span>
                            </div>

                            <flux:text class="text-sm">
                                {{ __('Voeg producten toe, beheer je voorraad en optimaliseer je prijzen via je persoonlijke dashboard.') }}
                            </flux:text>
                        </div>

                        @if ($user->store)
                            <flux:button href="{{ route('dashboard', $user->store) }}"
                                variant="{{ $user->isAdmin() ? 'outline' : 'primary' }}"
                                icon-trailing="arrow-right" class="w-full">
                                {{ __('Naar :store Dashboard', ['store' => $user->store->name]) }}
                            </flux:button>
                        @else
                            <flux:button href="{{ route('frontend.stores.create') }}" variant="primary" icon="plus"
                                class="w-full" wire:navigate>
                                {{ __('Direct winkel openen') }}
                            </flux:button>
                        @endif
                    </flux:card>
                @endif
            </div>
        @endauth
    </div>
