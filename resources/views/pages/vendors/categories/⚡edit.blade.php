<?php

use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {
    public Store $store;
    public Category $category;

    public string $name = '';
    public string $slug = '';
    public ?string $description = null;
    public ?string $image = null;
    public bool $is_active = true;

    public function mount(Store $store, Category $category): void
    {
        $this->store = $store;
        $this->category = $category;
        abort_unless((int) $category->store_id === (int) $store->id, 404);
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;
        $this->image = $category->image;
        $this->is_active = (bool) $category->is_active;
    }

    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function save(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('categories', 'slug')->ignore($this->category->id)],
            'description' => 'nullable|string|max:2000',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $this->category->update($validated);

        Flux::toast(variant: 'success', text: __('Categorie aangepast.'));
        $this->redirect(route('categories', $this->store), navigate: true);
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('categories', $store) }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar categorieën') }}
        </flux:button>

        <flux:heading size="xl" level="1">{{ __('Categorie bewerken') }}</flux:heading>
        <flux:subheading>{{ __('Pas de gegevens van de categorie aan.') }}</flux:subheading>
    </div>

    <flux:card>
        <form wire:submit="save" class="space-y-6">
            <div class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <flux:input wire:model.live.debounce.300ms="name" :label="__('Naam')"
                        placeholder="{{ __('Bijv. Elektronica') }}" required />

                    <flux:input wire:model="slug" :label="__('Slug')" placeholder="{{ __('elektronica') }}"
                        required />

                    <flux:input wire:model="image" :label="__('Afbeelding (URL)')"
                        placeholder="{{ __('pad/naar/afbeelding.jpg') }}" />

                    <div class="flex items-center sm:pt-6">
                        <flux:switch wire:model="is_active" :label="__('Actief')" />
                    </div>

                    <div class="sm:col-span-2">
                        <flux:textarea wire:model="description" :label="__('Beschrijving')"
                            placeholder="{{ __('Korte omschrijving van de categorie...') }}" rows="3" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('categories', $store) }}" variant="ghost">
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Categorie opslaan') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>