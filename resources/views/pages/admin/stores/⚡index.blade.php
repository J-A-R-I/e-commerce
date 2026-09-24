<?php
use App\Models\Store;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    use WithPagination;

    #[Url(as: 'q')]
    public string $search = '';

    #[Url]
    public string $status = '';

    public string $sortField = 'created_at';

    #[Url(as: 'dir')]
    public string $sortDirection = 'desc';
    #[Url]
    public int $perPage = 5;

    public function updateSearch(): void
    {
        $this->resetPage();
    }
    public function updatedStatus(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function stores()
    {
        return Store::query()
            ->with('user')
            ->when(
                $this->search,
                fn($query) => $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ->orWhere('phone', 'like', "%{$this->search}%")
                        ->orWhereHas('user', function ($userQuery) {
                            $userQuery->where('firstname', 'like', "%{$this->search}%")->orWhere('lastname', 'like', "%{$this->search}%");
                        });
                }),
            )
            ->when($this->status === 'active', fn($query) => $query->where('is_active', true))
            ->when($this->status === 'inactive', fn($query) => $query->where('is_active', false))
            ->orderBy('id')
            ->paginate($this->perPage);
    }

    public function delete(Store $store): void
    {
        $store->delete();
        Flux::toast(variant: 'success', text: __('Winkel verwijderd.'));
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

        <flux:button href="{{ route('stores.create') }}" variant="primary" icon="plus">
            {{ __('+ nieuwe winkel') }}
        </flux:button>
    </div>

    <flux:card>
        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{ __('Naam') }}</flux:table.column>
                <flux:table.column>{{ __('Eigenaar') }}</flux:table.column>
                <flux:table.column>{{ __('E-mailadres') }}</flux:table.column>
                <flux:table.column>{{ __('Telefoon') }}</flux:table.column>
                <flux:table.column>{{ __('Status') }}</flux:table.column>
                <flux:table.column>{{ __('Aangemaakt') }}</flux:table.column>
                <flux:table.column>{{ __('Geupdate') }}</flux:table.column>
                <flux:table.column align="end">{{ __('Acties') }}</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse ($this->stores as $store)
                    <flux:table.row :key='$store->id'>
                        <flux:table.cell class="font-medium text-zinc-900 dark:text-white">
                            {{ $store->name }}
                        </flux:table.cell>
                        <flux:table.cell>{{ $store->user?->name ?? '-' }}</flux:table.cell>
                        <flux:table.cell>{{ $store->email }}</flux:table.cell>
                        <flux:table.cell>{{ $store->phone }}</flux:table.cell>
                        <flux:table.cell>
                            <flux:badge :color="$store->is_active ? 'green' : 'zinc'" size="sm" inset="top bottom">
                                {{ $store->is_active ? __('Actief') : __('Inactief') }}
                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>{{ $store->created_at?->format('d-m-Y') }}</flux:table.cell>
                        <flux:table.cell>{{ $store->updated_at?->format('d-m-Y H:i') }}</flux:table.cell>
                        <flux:table.cell align="end">
                            <flux:button :href="route('stores.show', $store)" size="sm" icon="eye" />
                            <flux:button :href="route('stores.edit', $store)" size="sm" icon="pencil-square" />
                            <flux:button wire:click="delete({{ $store->id }})"
                                wire:confirm="{{ __('Weet je zeker dat je deze winkel wilt verwijderen?') }}"
                                size="sm" icon="trash" />
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="7" class="text-center py-8 text-zinc-500">
                            {{ __('Geen winkels gevonden.') }}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>
        <flux:table :paginate="$this->stores" />
    </flux:card>
</section>
