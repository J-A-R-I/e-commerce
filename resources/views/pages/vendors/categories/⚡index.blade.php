<?php

use App\Models\Category;
use App\Models\Store;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {
    use WithPagination;

    public Store $store;

    #[Url(as: 'q')]
    public string $search = '';

    #[Url]
    public string $status = '';

    public string $sortField = 'created_at';

    #[Url(as: 'dir')]
    public string $sortDirection = 'desc';

    #[Url]
    public int $perPage = 5;

    public function mount(Store $store): void
    {
        $this->store = $store;
    }

    public function updateSearch(): void
    {
        $this->resetPage();
    }

    public function updatedStatus(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function categories()
    {
        return Category::query()
            ->where('store_id', $this->store->id)
            ->when(
                $this->search,
                fn($query) => $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%");
                }),
            )
            ->when($this->status === 'active', fn($query) => $query->where('is_active', true))
            ->when($this->status === 'inactive', fn($query) => $query->where('is_active', false))
            ->orderBy('id')
            ->paginate($this->perPage);
    }

    public function delete(Category $category): void
    {
        abort_unless((int) $category->store_id === (int) $this->store->id, 403);
        $category->delete();
        Flux::toast(variant: 'success', text: __('Categorie verwijderd.'));
    }
};
?>

<section>
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 py-4">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
            <div class="w-full sm:w-72">
                <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass"
                    placeholder="{{ __('Zoek op naam...') }}" clearable />
            </div>

            <div class="w-full sm:w-44">
                <flux:select wire:model.live="status">
                    <flux:select.option value="">{{ __('Alle statussen') }}</flux:select.option>
                    <flux:select.option value="active">{{ __('Alleen actief') }}</flux:select.option>
                    <flux:select.option value="inactive">{{ __('Alleen inactief') }}</flux:select.option>
                </flux:select>
            </div>
        </div>

        <flux:button href="{{ route('categories.create', $store) }}" variant="primary" icon="plus">
            {{ __('Nieuwe categorie') }}
        </flux:button>
    </div>

    <flux:card>
        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{ __('Naam') }}</flux:table.column>
                <flux:table.column>{{ __('Beschrijving') }}</flux:table.column>
                <flux:table.column>{{ __('Afbeelding') }}</flux:table.column>
                <flux:table.column>{{ __('Status') }}</flux:table.column>
                <flux:table.column>{{ __('Aangemaakt') }}</flux:table.column>
                <flux:table.column>{{ __('Ge�pdatet') }}</flux:table.column>
                <flux:table.column align="end">{{ __('Acties') }}</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse ($this->categories as $category)
                    <flux:table.row :key='$category->id'>
                        <flux:table.cell class="font-medium text-zinc-900 dark:text-white">
                            {{ $category->name }}
                        </flux:table.cell>
                        <flux:table.cell class="max-w-xs truncate" title="{{ $category->description }}">
                            {{ $category->description }}
                        </flux:table.cell>
                        <flux:table.cell>{{ $category->image ?? '-' }}</flux:table.cell>
                        <flux:table.cell>
                            <flux:badge :color="$category->is_active ? 'green' : 'zinc'" size="sm"
                                inset="top bottom">
                                {{ $category->is_active ? __('Actief') : __('Inactief') }}
                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>{{ $category->created_at?->format('d-m-Y') }}</flux:table.cell>
                        <flux:table.cell>{{ $category->updated_at?->format('d-m-Y H:i') }}</flux:table.cell>
                        <flux:table.cell align="end">
                            <flux:button :href="route('categories.show', [$store, $category])" size="sm" icon="eye" />
                            <flux:button :href="route('categories.edit', [$store, $category])" size="sm"
                                icon="pencil-square" />
                            <flux:button wire:click="delete({{ $category->id }})"
                                wire:confirm="{{ __('Weet je zeker dat je deze categorie wilt verwijderen?') }}"
                                size="sm" icon="trash" />
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="7" class="text-center py-8 text-zinc-500">
                            {{ __('Geen categorieën gevonden.') }}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>
        <flux:table :paginate="$this->categories" />
    </flux:card>
</section>