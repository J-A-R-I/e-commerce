<?php

use App\Models\Role;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    public string $name = '';
    public string $description = '';

    public function save(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:1250|',
        ]);

        Role::create($validated);

        $this->redirect(route('roles'), navigate: true);
        Flux::toast(variant: 'success', text: __('Rol aangemaakt.'));
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
                <flux:input wire:model="name" :label="__('Naam')" placeholder="{{ __('Volledige naam') }}"
                    required />

                <flux:input wire:model="description" type="text" :label="__('description')"
                    placeholder="{{ __('description hier') }}" />

            </div>

            <flux:separator />

            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('roles') }}" variant="ghost">
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Gebruiker aanmaken') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>
