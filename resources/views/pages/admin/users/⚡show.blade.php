<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user->load('role');
    }

    public function delete(): void
    {
        $this->user->delete();
        $this->redirect(route('users'), navigate: true);
        Flux::toast(variant: 'success', text: __('Gebruiker verwijderd.'));
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('users') }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar gebruikers') }}
        </flux:button>

        <div class="flex items-center justify-between gap-4">
            <flux:heading size="xl" level="1">{{ $user->firstname }} {{ $user->lastname }}</flux:heading>

            <div class="flex items-center gap-2">
                <flux:button href="{{ route('users.edit', $user) }}" size="sm" variant="primary"
                    icon="pencil-square">
                    {{ __('Bewerken') }}
                </flux:button>
                <flux:button wire:click="delete"
                    wire:confirm="{{ __('Weet je zeker dat je deze gebruiker wilt verwijderen?') }}" size="sm"
                    variant="danger" icon="trash">
                    {{ __('Verwijderen') }}
                </flux:button>
            </div>
        </div>
    </div>

    <flux:card class="space-y-3 text-sm">
        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Voornaam') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $user->firstname }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Achternaam') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $user->lastname }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('E-mailadres') }}</span>
            <span class="font-medium text-zinc-900 dark:text-white">{{ $user->email }}</span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Rol') }}</span>
            <flux:badge size="sm">{{ ucfirst($user->role?->name ?? '-') }}</flux:badge>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400">{{ __('Aangemaakt op') }}</span>
            <span class="text-zinc-700 dark:text-zinc-300">{{ $user->created_at?->format('d-m-Y H:i') }}</span>
        </div>
    </flux:card>
</section>
