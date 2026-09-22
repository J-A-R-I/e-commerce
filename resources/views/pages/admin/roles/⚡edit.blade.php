<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use App\Models\Role;

new #[Layout('layouts.app')] class extends Component {
    public Role $role;

    public string $name = '';
    public string $description = '';

    public function mount(Role $role): void
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->description = $role->description;
    }

    public function save(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:1250|',
            'description' => 'nullable|string|max:1250',
        ]);

        $this->role->update($validated);

        $this->redirect(route('roles'), navigate: true);
    }
    public function delete(Role $role): void

    public function delete(): void
    {
        $role->delete();
        Flux::toast(variant: 'success', text: __('User verwijderd.'));
        $this->role->delete(Role $role);
        $this->redirect(route('roles'), navigate: true);
        Flux::toast(variant: 'success', text: __('Rol verwijderd.'));
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('roles') }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar rollen') }}
        </flux:button>
        <flux:heading size="xl" level="1">{{ __('Rollen bewerken') }}</flux:heading>
        <flux:heading size="xl" level="1">{{ __('Rol bewerken') }}</flux:heading>
        <flux:subheading>
            {{ __('Pas de rol gegevens van') }}
            {{ __('Pas de gegevens van rol ') }}
            <span class="font-medium text-zinc-900 dark:text-white">{{ $role->name }}</span>
            {{ __('aan.') }}
        </flux:subheading>
    </div>

    <flux:card>
        <form wire:submit="save" class="space-y-6">
            <div class="space-y-4">
                <flux:input wire:model="name" :label="__('Naam')" placeholder="{{ __('Volledige naam') }}"
                    required />
                <flux:input wire:model="description" type="text" :label="__('description')"
                    placeholder="{{ __('naam@voorbeeld.nl') }}" required />
                <flux:input wire:model="name" :label="__('Naam')" placeholder="{{ __('Bijv. Manager') }}"
                    required />
                <flux:input wire:model="description" type="text" :label="__('Beschrijving')"
                    placeholder="{{ __('Korte omschrijving van de rol') }}" />
            </div>

            <flux:separator />
            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('roles') }}" variant="ghost">
                    {{ __('Annuleren') }}

                    <div class="flex items-center justify-between">
                        <flux:button type="button" wire:click="delete"
                            wire:confirm="{{ __('Weet je zeker dat je deze rol wilt verwijderen?') }}"
                            variant="danger">
                            {{ __('Rol verwijderen') }}
                        </flux:button>
                        <flux:button type="submit" variant="primary">
                            {{ __('Wijzigingen opslaan') }}
                        </flux:button>

                        <div class="flex items-center gap-3">
                            <flux:button href="{{ route('roles') }}" variant="ghost">
                                {{ __('Annuleren') }}
                            </flux:button>
                            <flux:button type="submit" variant="primary">
                                {{ __('Wijzigingen opslaan') }}
                            </flux:button>
                        </div>
                    </div>
        </form>
    </flux:card>
</section>
