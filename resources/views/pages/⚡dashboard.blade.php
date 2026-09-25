<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {
    public Store $store;

    public int $totalProducts = 0;
    public int $totalCategories = 0;
    public int $activeProducts = 0;

    public function mount(Store $store): void
    {
        $this->store = $store;

        $this->totalProducts = $this->store->products()->count();
        $this->totalCategories = $this->store->categories()->count();
        $this->activeProducts = $this->store->products()->where('is_active', true)->count();
    }
};
?>

<section class="space-y-6">
    <div class="space-y-1">
        <flux:heading size="xl" level="1">{{ $store->name }} Dashboard</flux:heading>
        <flux:subheading>{{ __('Overzicht van :store', ['store' => $store->name]) }}</flux:subheading>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <flux:card class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-wider text-zinc-500">{{ __('Totaal Producten') }}</span>
            <div class="text-3xl font-extrabold text-zinc-900 dark:text-white">{{ $totalProducts }}</div>
        </flux:card>
        <flux:card class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-wider text-zinc-500">{{ __('Actief in shop') }}</span>
            <div class="text-3xl font-extrabold text-zinc-900 dark:text-white">{{ $activeProducts }}</div>
        </flux:card>
        <flux:card class="space-y-2">
            <span
                class="text-xs font-medium uppercase tracking-wider text-zinc-500">{{ __('Totaal Categories') }}</span>
            <div class="text-3xl font-extrabold text-zinc-900 dark:text-white">{{ $totalCategories }}</div>
        </flux:card>
    </div>
</section>
