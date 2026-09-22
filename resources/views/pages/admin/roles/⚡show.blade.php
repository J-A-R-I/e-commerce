<?php

use App\Models\Role;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    public Role $role;

    public function delete(): void
    {
        $this->role->delete();
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

        <div class="flex items-center justify-between gap-4">
            <flux:heading size="xl" level="1">{{ $role->name }}</flux:heading>

            <div class="flex items-center gap-2">
                <flux:button href="{{ route('roles.edit', $role) }}" size="sm" variant="primary"
                    icon="pencil-square">
                    {{ __('Bewerken') }}
                </flux:button>
                <flux:button wire:click="delete"
                    wire:confirm="{{ __('Weet je zeker dat je deze rol wilt verwijderen?') }}" size="sm"
                    variant="danger" icon="trash">
                    {{ __('Verwijderen') }}
                </flux:button>
            </div>
        </div>
    </div>

    <flux:card class="space-y-3 text-sm">
        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Naam') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $role->name }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Beschrijving') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $role->description ?: '-' }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Aangemaakt op') }}</span>
            <span class="text-zinc-700 dark:text-zinc-300">{{ $role->created_at?->format('d-m-Y H:i') }}</span>
        </div>
    </flux:card>
</section>
