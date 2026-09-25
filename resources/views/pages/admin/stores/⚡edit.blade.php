<?php

use App\Models\Store;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    public Store $store;

    public string $name = '';
    public string $user_id = '';
    public string $email = '';
    public string $phone = '';
    public string $slug = '';
    public ?string $description = '';
    public ?string $logo = '';
    public ?string $banner = '';
    public bool $is_active = true;

    public function mount(Store $store): void
    {
        $this->store = $store;
        $this->name = $store->name;
        $this->user_id = (string) $store->user_id;
        $this->email = $store->email;
        $this->phone = $store->phone;
        $this->slug = $store->slug;
        $this->description = $store->description ?? '';
        $this->logo = $store->logo ?? '';
        $this->banner = $store->banner ?? '';
        $this->is_active = (bool) $store->is_active;
    }

    #[Computed]
    public function users()
    {
        return User::query()->orderBy('firstname')->get();
    }

    public function save(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'slug' => 'required|string|max:255|alpha_dash|unique:stores,slug,' . $this->store->id,
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'description' => 'nullable|string|max:2000',
            'logo' => 'nullable|string|max:255',
            'banner' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $this->store->update($validated);

        Flux::toast(variant: 'success', text: __('Store aangepast.'));
        $this->redirect(route('stores'), navigate: true);
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('stores') }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar stores') }}
        </flux:button>

        <flux:heading size="xl" level="1">{{ __('Store bewerken') }}</flux:heading>
        <flux:subheading>{{ __('Pas de gegevens van de store aan.') }}</flux:subheading>
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

                    <flux:input wire:model="logo" :label="__('Logo (URL)')"
                        placeholder="{{ __('pad/naar/logo.png') }}" />

                    <flux:input wire:model="banner" :label="__('Banner (URL)')"
                        placeholder="{{ __('pad/naar/banner.jpg') }}" />

                    <div class="sm:col-span-2">
                        <flux:textarea wire:model="description" :label="__('Beschrijving')"
                            placeholder="{{ __('Korte omschrijving van de winkel...') }}" rows="3" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('stores') }}" variant="ghost">
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Winkel opslaan') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>
