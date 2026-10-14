<?php

use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;


new #[Layout('layouts.app')] class extends Component {
use WithFileUploads;

    public string $name = '';
    public string $user_id = '';
    public string $email = '';
    public string $phone = '';
    public string $slug = '';
    public string $description = '';
    public bool $is_active = true;
    public $logo = null;
    public $banner = null;
    
    #[Computed]
    public function users()
    {
        return User::query()->orderBy('id')->get();
    }

    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function save(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'slug' => 'required|string|max:255|alpha_dash|unique:stores,slug',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'description' => 'nullable|string|max:2000',
            'logo' => ['nullable', 'image', 'max:5120'],
            'banner' => ['nullable', 'image', 'max:5120'],
            'is_active' => 'boolean',
        ]);

        
        $logo = $validated['logo'] ?? null;
        unset($validated['logo']);

        
        $banner = $validated['banner'] ?? null;
        unset($validated['banner']);
        
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


        $this->redirect(route('stores'), navigate: true);
        Flux::toast(variant: 'success', text: __('Store aangemaakt.'));
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('stores') }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar stores') }}
        </flux:button>

        <flux:heading size="xl" level="1">{{ __('Nieuwe Store') }}</flux:heading>
        <flux:subheading>{{ __('Maak een nieuwe store aan en wijs een rol toe.') }}</flux:subheading>
    </div>

    <flux:card>
        <form wire:submit="save" class="space-y-6">
            <div class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <flux:input wire:model.live.debounce.300ms="name" :label="__('Winkelnaam')"
                        placeholder="{{ __('Bijv. Tech Store') }}" required />

                    <flux:input wire:model="slug" :label="__('Slug')" placeholder="{{ __('tech-store') }}"
                        required />

                    <flux:select wire:model="user_id" :label="__('Eigenaar')" required>
                        <flux:select.option value="">{{ __('Kies een eigenaar...') }}</flux:select.option>
                        @foreach ($this->users as $user)
                            <flux:select.option :value="$user->id">
                                {{ $user->name }}
                            </flux:select.option>
                        @endforeach
                    </flux:select>

                    <flux:input wire:model="email" type="email" :label="__('E-mailadres')"
                        placeholder="{{ __('winkel@voorbeeld.nl') }}" />

                    <flux:input wire:model="phone" type="tel" :label="__('Telefoonnummer')"
                        placeholder="{{ __('+31 6 12345678') }}" />

                    <div class="flex items-center sm:pt-6">
                        <flux:switch wire:model="is_active" :label="__('Actief')" />
                    </div>

                    <div class="sm:col-span-2">
                        <flux:textarea wire:model="description" :label="__('Beschrijving')"
                            placeholder="{{ __('Korte omschrijving van de winkel...') }}" rows="3" />
                    </div>

                    <div>
                    <p>logo</p>
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
                    </div>

                        <div>
                        <p>banner</p>
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('stores') }}" variant="ghost">
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Winkel aanmaken') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>
