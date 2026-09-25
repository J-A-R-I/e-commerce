<?php

use App\Models\Category;
use App\Models\Store;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {
    public Store $store;
    public Category $category;

    public function mount(Store $store, Category $category): void
    {
        $this->store = $store;
        $this->category = $category;
        abort_unless((int) $category->store_id === (int) $store->id, 404);
    }

    public function delete(): void
    {
        $this->category->delete();
        Flux::toast(variant: 'success', text: __('Categorie verwijderd.'));
        $this->redirect(route('categories', $this->store), navigate: true);
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('categories', $store) }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar categorieën') }}
        </flux:button>

        <div class="flex items-center justify-between gap-4">
            <flux:heading size="xl" level="1">{{ $category->name }}</flux:heading>

            <div class="flex items-center gap-2">
                <flux:button href="{{ route('categories.edit', [$store, $category]) }}" size="sm" variant="primary"
                    icon="pencil-square">
                    {{ __('Bewerken') }}
                </flux:button>
                <flux:button wire:click="delete"
                    wire:confirm="{{ __('Weet je zeker dat je deze categorie wilt verwijderen?') }}" size="sm"
                    variant="danger" icon="trash">
                    {{ __('Verwijderen') }}
                </flux:button>
            </div>
        </div>
    </div>

    <flux:card class="space-y-3 text-sm">
        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Naam') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $category->name }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Slug') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $category->slug }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Afbeelding') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $category->image ?? '-' }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Status') }}</span>
            <flux:badge size="sm" :color="$category->is_active ? 'green' : 'zinc'">
                {{ $category->is_active ? __('Actief') : __('Inactief') }}
            </flux:badge>
        </div>

        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Aangemaakt op') }}</span>
            <span class="text-zinc-700 dark:text-zinc-300">{{ $category->created_at?->format('d-m-Y H:i') }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Geüpdatet op') }}</span>
            <span class="text-zinc-700 dark:text-zinc-300">{{ $category->updated_at?->format('d-m-Y H:i') }}</span>
        </div>

        <div class="pt-3 border-t border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400 block mb-1 font-medium">{{ __('Beschrijving') }}</span>
            <p class="text-zinc-700 dark:text-zinc-300 leading-relaxed bg-zinc-50 dark:bg-zinc-800/40 p-3 rounded-lg border border-zinc-200 dark:border-zinc-700/50">
                {{ $category->description ?: '-' }}
            </p>
        </div>
    </flux:card>
</section>