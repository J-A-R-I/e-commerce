<?php

use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public int $role_id = 0;

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
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create($validated);

        $this->redirect(route('users'), navigate: true);
        Flux::toast(variant: 'success', text: __('User aangemaakt.'));
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('users') }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar gebruikers') }}
        </flux:button>

        <flux:heading size="xl" level="1">{{ __('Nieuwe gebruiker') }}</flux:heading>
        <flux:subheading>{{ __('Maak een nieuw gebruikersaccount aan en wijs een rol toe.') }}</flux:subheading>
    </div>

    <flux:card>
        <form wire:submit="save" class="space-y-6">
            <div class="space-y-4">
                <flux:input wire:model="firstname" :label="__('Voornaam')" placeholder="{{ __('Voornaam') }}"
                    required />
                <flux:input wire:model="lastname" :label="__('Achternaam')" placeholder="{{ __('Achternaam ') }}"
                    required />

                <flux:input wire:model="email" type="email" :label="__('E-mailadres')"
                    placeholder="{{ __('naam@voorbeeld.nl') }}" required />

                <flux:input wire:model="password" type="password" :label="__('Wachtwoord')"
                    placeholder="{{ __('Minimaal 8 tekens') }}" required />

                <flux:select wire:model="role_id" :label="__('Rol')">
                    <flux:select.option value="">{{ __('Kies een rol...') }}</flux:select.option>
                    @foreach ($this->roles as $role)
                        <flux:select.option :value="$role->id">
                            {{ ucfirst($role->name) }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
            </div>

            <flux:separator />

            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('users') }}" variant="ghost">
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Gebruiker aanmaken') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>
