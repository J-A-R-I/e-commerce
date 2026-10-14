<?php

use App\Models\Store;
use Flux\Flux;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts.frontend')] class extends Component {
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $slug = '';
    public string $description = '';
    public $logo = null;
    public $banner = null;

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
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'banner' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $logo = $validated['logo'] ?? null;
        unset($validated['logo']);

        $banner = $validated['banner'] ?? null;
        unset($validated['banner']);

        $validated['user_id'] = auth()->id();
        $validated['is_active'] = true;

        $store = Store::create($validated);

        if ($logo) {
            $store->addMedia($logo->getRealPath())
                ->usingFileName($logo->getClientOriginalName())
                ->toMediaCollection('store_logo');
        }

        if ($banner) {
            $store->addMedia($banner->getRealPath())
                ->usingFileName($banner->getClientOriginalName())
                ->toMediaCollection('store_banner');
        }

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

                    <div>
                        <flux:label for="logo">{{ __('Winkellogo') }}</flux:label>
                        <flux:description class="mb-2">{{ __('Optioneel. Maximaal 5MB (JPG, PNG, WebP).') }}</flux:description>
                        <input
                            id="logo"
                            type="file"
                            wire:model="logo"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full text-sm text-zinc-500
                                file:mr-4 file:rounded-lg file:border-0
                                file:bg-zinc-100 file:px-4 file:py-2
                                file:font-medium file:text-zinc-900
                                hover:file:bg-zinc-200
                                dark:file:bg-zinc-800 dark:file:text-white"
                        />
                        <flux:error name="logo" />
                    </div>

                    <div>
                        <flux:label for="banner">{{ __('Winkelbanner') }}</flux:label>
                        <flux:description class="mb-2">{{ __('Optioneel. Maximaal 5MB (JPG, PNG, WebP).') }}</flux:description>
                        <input
                            id="banner"
                            type="file"
                            wire:model="banner"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full text-sm text-zinc-500
                                file:mr-4 file:rounded-lg file:border-0
                                file:bg-zinc-100 file:px-4 file:py-2
                                file:font-medium file:text-zinc-900
                                hover:file:bg-zinc-200
                                dark:file:bg-zinc-800 dark:file:text-white"
                        />
                        <flux:error name="banner" />
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
