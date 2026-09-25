<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts.store')] class extends Component {
    use WithPagination;

    public Store $store;

    #[Url(as: 'q')]
    public string $search = '';

    #[Url]
    public string $category = '';

    public string $sortField = 'created_at';

    #[Url(as: 'dir')]
    public string $sortDirection = 'desc';

    #[Url]
    public int $perpage = 5;

    public function mount(Store $store): void
    {
        $this->store = $store;
    }

    public function updateSearch(): void
    {
        $this->resetPage();
    }

    public function updateCategory(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function products()
    {
        return Product::query()
            ->with(['category', 'store'])
            ->where('store_id', $this->store->id)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhereHas('category', function ($categoryQuery) {
                            $categoryQuery->where('name', 'like', "%{$this->search}%");
                        });
                });
            })
            ->when($this->category, fn($query) => $query->where('category_id', $this->category))
            ->orderBy('id', 'desc')
            ->paginate($this->perpage);
    }

    #[Computed]
    public function categories()
    {
        return Category::query()->where('store_id', $this->store->id)->orderBy('name')->get();
    }

    public function delete(Product $product): void
    {
        abort_unless((int) $product->store_id === (int) $this->store->id, 403);
        $product->delete();
        Flux::toast(variant: 'success', text: __('Product verwijderd.'));
    }
};
?>

<section class="space-y-4">
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
            <div class="w-full sm:w-72">
                <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass"
                    placeholder="{{ __('Zoek op productnaam...') }}" clearable />
            </div>

            <div class="w-full sm:w-52">
                <flux:select wire:model.live="category">
                    <flux:select.option value="">{{ __('Alle categorieën') }}</flux:select.option>
                    @foreach ($this->categories as $cat)
                        <flux:select.option :value="$cat->id">{{ $cat->name }}</flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>

        <flux:button href="{{ route('products.create', $store) }}" variant="primary" icon="plus">
            {{ __('Nieuw product') }}
        </flux:button>
    </div>

    <flux:card>
        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{ __('Product & SKU') }}</flux:table.column>
                <flux:table.column>{{ __('Categorie') }}</flux:table.column>
                <flux:table.column>{{ __('Prijs & Voorraad') }}</flux:table.column>
                <flux:table.column>{{ __('Datums (Gemaakt / Gewijzigd)') }}</flux:table.column>
                <flux:table.column>{{ __('Status') }}</flux:table.column>
                <flux:table.column align="end">{{ __('Acties') }}</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @foreach ($this->products as $product)
                    <flux:table.row :key='$product->id'>
                        <flux:table.cell>
                            <div class="flex items-center gap-3">
                                @if ($product->image)
                                    <img src="{{ $product->image }}" alt=""
                                        class="size-9 rounded-md object-cover border border-zinc-200 dark:border-zinc-700 shrink-0" />
                                @else
                                    <div
                                        class="size-9 rounded-md bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-400 shrink-0">
                                        <flux:icon icon="cube" class="size-5" />
                                    </div>
                                @endif

                                <div>
                                    <div class="font-medium text-zinc-900 dark:text-white leading-snug">
                                        {{ $product->name }}
                                    </div>
                                    <div class="font-mono text-xs text-zinc-500">
                                        SKU: {{ $product->sku ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <div class="text-xs text-zinc-500">
                                {{ $product->category?->name ?? '-' }}
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <div class="font-semibold text-zinc-900 dark:text-white leading-snug">
                                € {{ number_format((float) ($product->price ?? 0), 2, ',', '.') }}
                            </div>
                            <div
                                class="text-xs {{ $product->stock <= 5 ? 'text-amber-600 font-medium' : 'text-zinc-500' }}">
                                {{ $product->stock }} {{ __('stuks op voorraad') }}
                            </div>
                        </flux:table.cell>

                        <flux:table.cell class="text-xs text-zinc-500 whitespace-nowrap">
                            <div><span class="text-zinc-400">{{ __('Gemaakt:') }}</span>
                                {{ $product->created_at?->format('d-m-Y H:i') }}</div>
                            <div><span class="text-zinc-400">{{ __('Gewijzigd:') }}</span>
                                {{ $product->updated_at?->format('d-m-Y H:i') }}</div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <flux:badge size="sm" :color="$product->is_active ? 'green' : 'zinc'">
                                {{ $product->is_active ? __('Actief') : __('Inactief') }}
                            </flux:badge>
                        </flux:table.cell>

                        <flux:table.cell align="end">
                            <flux:button :href="route('products.show', [$store, $product])" size="sm"
                                icon="eye" />
                            <flux:button :href="route('products.edit', [$store, $product])" size="sm"
                                icon="pencil-square" />
                            <flux:button wire:click="delete({{ $product->id }})"
                                wire:confirm="{{ __('Weet je zeker dat je dit product wilt verwijderen?') }}"
                                size="sm" icon="trash" />
                        </flux:table.cell>
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>

        <flux:table :paginate="$this->products" />
    </flux:card>
</section>