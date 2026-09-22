<?php
use App\Models\User;
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

    #[Url]
    public string $role = '';

    public string $sortField = 'created_at';

    #[Url(as: 'dir')]
    public string $sortDirection = 'desc';
    #[Url]
    public int $perPage = 5;

    public function updateSearch(): void
    {
        $this->resetPage();
    }
    public function updateRole(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function users()
    {
        return User::query()
            ->with('role')
            ->when(
                $this->search,
                fn($query) => $query->where(function ($q) {
                    $q->where('firstname', 'like', "%{$this->search}%")
                        ->orWhere('lastname', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                }),
            )
            ->when($this->role, fn($query) => $query->where('role_id', $this->role))
            ->orderBy('id')
            ->paginate($this->perPage);
    }

    #[Computed]
    public function roles()
    {
        return Role::query()->orderBy('name')->get();
    }

    public function delete(User $user): void
    {
        $user->delete();
        Flux::toast(variant: 'success', text: __('User verwijderd.'));
    }
};
?>

<section>
    <div class="flex sm:flex-row items-center justify-between gap-3 py-4">
        <div class="flex gap-3">
            <div class="w-full sm:w-72">
                <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass"
                    placeholder="{{ __('Zoek op naam of e-mail...') }}" clearable />
            </div>

            <div class="w-full sm:w-48">
                <flux:select wire:model.live="role">
                    <flux:select.option value="">{{ __('Alle rollen') }}</flux:select.option>
                    @foreach ($this->roles as $rol)
                        <flux:select.option :value="$rol->id">{{ $rol->name }}</flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>
        <flux:button href="{{ route('users.create') }}" variant="primary" icon="plus">
            {{ __('nieuwe gebruiker') }}
        </flux:button>
    </div>

    <flux:card>
        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{ __('Voornaam') }}</flux:table.column>
                <flux:table.column>{{ __('Achternaam') }}</flux:table.column>
                <flux:table.column>{{ __('Email') }}</flux:table.column>
                <flux:table.column>{{ __('role') }}</flux:table.column>
                <flux:table.column>{{ __('created_at') }}</flux:table.column>
                <flux:table.column>{{ __('updated_At') }}</flux:table.column>
                <flux:table.column align="end">{{ __('Actions') }}</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @foreach ($this->users as $user)
                    <flux:table.row :key='$user->id'>
                        <flux:table.cell>{{ $user->firstname }}</flux:table.cell>
                        <flux:table.cell>{{ $user->lastname }}</flux:table.cell>
                        <flux:table.cell>{{ $user->email }}</flux:table.cell>
                        <flux:table.cell>{{ $user->role?->name ?? '-' }}</flux:table.cell>
                        <flux:table.cell>{{ $user->created_at }}</flux:table.cell>
                        <flux:table.cell>{{ $user->updated_at }}</flux:table.cell>
                        <flux:table.cell align="end">
                            <flux:button :href="route('users.show', $user)" size="sm" icon="eye" />
                            <flux:button :href="route('users.edit', $user)" size="sm" icon="pencil-square" />
                            <flux:button wire:click="delete({{ $user->id }})" size="sm" icon="trash" />

                        </flux:table.cell>
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>
        <flux:table :paginate="$this->users" />
    </flux:card>

</section>
