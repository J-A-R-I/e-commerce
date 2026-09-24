<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use App\Models\User;
use App\Models\Role;

new #[Layout('layouts.app')] class extends Component {
    public User $user;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $role_id = 0;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
    }

    #[Computed]
    public function roles()
    {
        return Role::query()->orderBy('name')->get();
    }

    public function save(): void
    {
        $validated = $this->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $this->user->update($validated);
        $this->store->touch();

        $this->redirect(route('users'), navigate: true);
        Flux::toast(variant: 'success', text: __('User aangepast.'));
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('users') }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar gebruikers') }}
        </flux:button>
        <flux:heading size="xl" level="1">{{ __('Gebruiker bewerken') }}</flux:heading>
        <flux:subheading>
            {{ __('Pas de accountgegevens en rechten van ') }}
            <span class="font-medium text-zinc-900 dark:text-white">{{ $user->name }}</span>
            {{ __('aan.') }}
        </flux:subheading>
    </div>
    <flux:card>
        <form wire:submit="save" class="space-y-6">
            <div class="space-y-4">
                <flux:input wire:model="firstname" :label="__('Voornaam')" placeholder="{{ __('Achternaam') }}"
                    required />
                <flux:input wire:model="lastname" :label="__('achternaam')" placeholder="{{ __('Voornaam') }}"
                    required />
                <flux:input wire:model="email" type="email" :label="__('E-mailadres')"
                    placeholder="{{ __('naam@voorbeeld.nl') }}" required />
                <flux:select wire:model="role_id" :label="__('Rol')">
                    @foreach ($this->roles as $role)
                        <flux:select.option :value="$role->id">
                            {{ ucfirst($role->name) }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('users') }}" variant="ghost">
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Wijzigingen opslaan') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>
