<?php
use App\Models\Role;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    use WithPagination;

    #[Url(as: 'q')]
    public string $search = '';

    public string $sortField = 'created_at';

    #[Url(as: 'dir')]
    public string $sortDirection = 'desc';
    #[Url]
    public int $perPage = 5;

    public function updateSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function roles()
    {
        return Role::query()
            ->when(
                $this->search,
                fn($query) => $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%");
                }),
            )
            ->orderBy('id')
            ->paginate($this->perPage);
    }

    public function delete(Role $role): void
    {
        $role->delete();
        Flux::toast(variant: 'success', text: __('User verwijderd.'));
    }
};
?>

<section>
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 py-4">
        <div class="w-full sm:w-72">
            <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass"
                placeholder="{{ __('Zoek op naam...') }}" clearable />
        </div>
        <flux:button href="{{ route('roles.create') }}" variant="primary" icon="plus">
            {{ __('nieuwe rol') }}
        </flux:button>
    </div>

    <flux:card>
        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{ __('naam') }}</flux:table.column>
                <flux:table.column>{{ __('description') }}</flux:table.column>
                <flux:table.column>{{ __('created_at') }}</flux:table.column>
                <flux:table.column>{{ __('updated_At') }}</flux:table.column>
                <flux:table.column align="end">{{ __('Actions') }}</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @foreach ($this->roles as $role)
                    <flux:table.row :key='$role->id'>
                        <flux:table.cell>{{ $role->name }}</flux:table.cell>
                        <flux:table.cell>{{ $role->description }}</flux:table.cell>
                        <flux:table.cell>{{ $role->created_at }}</flux:table.cell>
                        <flux:table.cell>{{ $role->updated_at }}</flux:table.cell>
                        <flux:table.cell align="end">
                            <flux:button :href="route('roles.show', $role)" size="sm" icon="eye" />
                            <flux:button :href="route('roles.edit', $role)" size="sm" icon="pencil-square" />
                            <flux:button wire:click="delete({{ $role->id }})" size="sm" icon="trash" />

                        </flux:table.cell>
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>
        <flux:table :paginate="$this->roles" />
    </flux:card>

</section>
