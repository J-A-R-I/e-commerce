<?php

use App\Models\Store;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    public Store $store;

    public function mount(Store $store): void
    {
        $this->store = $store->load('user');
    }

    public function delete(): void
    {
        $this->store->delete();
        $this->redirect(route('stores'), navigate: true);
        Flux::toast(variant: 'success', text: __('Store verwijderd.'));
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('stores') }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar gebruikers') }}
        </flux:button>

        <div class="flex items-center justify-between gap-4">
            <flux:heading size="xl" level="1">{{ $store->name }}</flux:heading>

            <div class="flex items-center gap-2">
                <flux:button href="{{ route('stores.edit', $store) }}" size="sm" variant="primary"
                    icon="pencil-square">
                    {{ __('Bewerken') }}
                </flux:button>
                <flux:button wire:click="delete"
                    wire:confirm="{{ __('Weet je zeker dat je deze gebruiker wilt verwijderen?') }}" size="sm"
                    variant="danger" icon="trash">
                    {{ __('Verwijderen') }}
                </flux:button>
            </div>
        </div>
    </div>

    <flux:card class="space-y-3 text-sm">
        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Winkelnaam') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $store->name }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Eigenaar') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $store->user?->firstname }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Phone') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $store->phone }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Slug') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $store->slug }}</span>
        </div>
        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Description') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $store->description }}</span>
        </div>
        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Logo') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white"> @if ($store->hasMedia('store_logo'))
                                <img 
                                src="{{ $store->getFirstMediaUrl('store_logo', 'thumb') }}"
                                alt="{{ $store->name }}"
                                class="size-9 rounded-md object-cover border border-zinc-200 dark:border-zinc-700 shrink-0" 
                                loading="lazy"
                                />
                                @else
                                <div class="size-9 rounded-md bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-400 shrink-0">
                                    <flux:icon icon="cube" class="size-5" />
                                </div>
                                @endif</span>
        </div>
        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Banner') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white"> @if ($store->hasMedia('store_banner'))
                                <img 
                                src="{{ $store->getFirstMediaUrl('store_banner', 'thumb') }}"
                                alt="{{ $store->name }}"
                                class="size-9 rounded-md object-cover border border-zinc-200 dark:border-zinc-700 shrink-0" 
                                loading="lazy"
                                />
                                @else
                                <div class="size-9 rounded-md bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-400 shrink-0">
                                    <flux:icon icon="cube" class="size-5" />
                                </div>
                                @endif</span>
        </div>
        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Active?') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $store->is_active ? 'ja' : 'nee' }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Aangemaakt op') }}</span>
            <span class="text-zinc-700 dark:text-zinc-300">{{ $store->created_at?->format('d-m-Y H:i') }}</span>
        </div>
        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('geupdate op') }}</span>
            <span class="text-zinc-700 dark:text-zinc-300">{{ $store->updated_at?->format('d-m-Y H:i') }}</span>
        </div>
    </flux:card>
</section>
