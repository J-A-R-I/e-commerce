<?php

use App\Models\Store;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.frontend')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $slug = '';
    public string $description = '';

    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function save(): void
    {
        // Voorkom dat gebruikers met een winkel nog eentje aanmaken
        if (auth()->user()->store) {
            $this->redirect(route('home'), navigate: true);
            return;
        }

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:stores,slug',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'description' => 'nullable|string|max:2000',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['is_active'] = true;

        $store = Store::create($validated);

        $this->redirect(route('dashboard', $store), navigate: true);
        Flux::toast(variant: 'success', text: __('Gefeliciteerd! Je winkel is aangemaakt.'));
    }
};
?>

<section class="max-w-2xl mx-auto space-y-8 py-10">
    <div class="space-y-2 text-center">
        <flux:heading size="xl" level="1">{{ __('Jouw eigen winkel starten') }}</flux:heading>
        <flux:subheading>{{ __('Vul de details in om direct te beginnen met verkopen.') }}</flux:subheading>
    </div>

    <flux:card>
        <form wire:submit="save" class="space-y-6">
            <div class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <flux:input wire:model.live.debounce.300ms="name" :label="__('Winkelnaam')"
                        placeholder="{{ __('Bijv. Mijn Hippe Webshop') }}" required />

                    <flux:input wire:model="slug" :label="__('Winkel URL (Slug)')" placeholder="{{ __('mijn-hippe-webshop') }}"
                        required />

                    <flux:input wire:model="email" type="email" :label="__('E-mailadres (openbaar)')"
                        placeholder="{{ __('contact@mijnwinkel.nl') }}" />

                    <flux:input wire:model="phone" type="tel" :label="__('Telefoonnummer')"
                        placeholder="{{ __('+31 6 12345678') }}" />

                    <div class="sm:col-span-2">
                        <flux:textarea wire:model="description" :label="__('Korte beschrijving')"
                            placeholder="{{ __('Wat verkoop je? Waar staat je winkel voor?') }}" rows="4" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-800">
                <flux:button href="{{ route('home') }}" variant="ghost" wire:navigate>
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Winkel aanmaken & Naar Dashboard') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>
