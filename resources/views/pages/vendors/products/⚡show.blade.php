<?php

use App\Models\Product;
use App\Models\Store;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {
    public Store $store;
    public Product $product;

    public function mount(Store $store, Product $product): void
    {
        $this->store = $store;
        $this->product = $product->load('category');
        abort_unless((int) $product->store_id === (int) $store->id, 404);
    }

    public function delete(): void
    {
        $this->product->delete();
        Flux::toast(variant: 'success', text: __('Product verwijderd.'));
        $this->redirect(route('products', $this->store), navigate: true);
    }
};
?>

<section class="max-w-4xl mx-auto space-y-4">
    <div class="space-y-2">
        <flux:button href="{{ route('products', $store) }}" variant="ghost" size="sm"
            icon="arrow-left" class="-ms-2">
            {{ __('Terug naar producten') }}
        </flux:button>
        <div class="flex items-center justify-between gap-4">
            <flux:heading size="xl" level="1">{{ $product->name }}</flux:heading>
            <div class="flex items-center gap-2">
                <flux:button href="{{ route('products.edit', [$store, $product]) }}" size="sm"
                    variant="primary" icon="pencil-square">
                    {{ __('Bewerken') }}
                </flux:button>
                <flux:button wire:click="delete"
                    wire:confirm="{{ __('Weet je zeker dat je dit product wilt verwijderen?') }}" size="sm"
                    variant="danger" icon="trash">
                    {{ __('Verwijderen') }}
                </flux:button>
            </div>
        </div>
    </div>
    <flux:card class="space-y-4 text-sm">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-1">
            <div class="space-y-1">
                <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('Naam') }}</span>
                    <span class="font-medium text-zinc-900 dark:text-white">{{ $product->name }}</span>
                </div>
                <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('Prijs') }}</span>
                    <span class="font-medium text-zinc-900 dark:text-white">€
                        {{ number_format((float) ($product->price ?? 0), 2, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('Categorie') }}</span>
                    <span
                        class="font-medium text-zinc-900 dark:text-white">{{ $product->category?->name ?? '-' }}</span>
                </div>
                <div class="flex justify-between items-center py-1.5">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('Slug') }}</span>
                    <span class="font-medium text-zinc-900 dark:text-white truncate max-w-[200px]"
                        title="{{ $product->slug }}">
                        {{ $product->slug }}
                    </span>
                </div>
            </div>
            <div class="space-y-1">
                <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('Voorraad') }}</span>
                    <span class="font-medium text-zinc-900 dark:text-white">{{ $product->stock }}</span>
                </div>
                <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('SKU') }}</span>
                    <span class="font-medium text-zinc-900 dark:text-white">{{ $product->sku ?? '-' }}</span>
                </div>
                <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('Status') }}</span>
                    <flux:badge size="sm" :color="$product->is_active ? 'green' : 'zinc'">
                        {{ $product->is_active ? 'actief' : 'inactief' }}
                    </flux:badge>
                </div>
                <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('Aangemaakt op') }}</span>
                    <span
                        class="text-zinc-700 dark:text-zinc-300">{{ $product->created_at?->format('d-m-Y H:i') }}</span>
                </div>
                <div class="flex justify-between items-center py-1.5">
                    <span class="text-zinc-500 dark:text-zinc-400">{{ __('Ge�pdatet op') }}</span>
                    <span
                        class="text-zinc-700 dark:text-zinc-300">{{ $product->updated_at?->format('d-m-Y H:i') }}</span>
                </div>
            </div>
        </div>
        <div class="pt-3 border-t border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400 block mb-1 font-medium">{{ __('Beschrijving') }}</span>
            <p
                class="text-zinc-700 dark:text-zinc-300 leading-relaxed bg-zinc-50 dark:bg-zinc-800/40 p-3 rounded-lg border border-zinc-200 dark:border-zinc-700/50">
                {{ $product->description ?: '-' }}
            </p>
        </div>
    </flux:card>
</section>