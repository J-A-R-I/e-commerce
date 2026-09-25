<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {
    public Store $store;

    public string $name = '';
    public ?int $category_id = null;
    public string $slug = '';
    public ?string $description = null;
    public ?string $price = null;
    public int $stock = 0;
    public ?string $sku = null;
    public ?string $image = null;
    public bool $is_active = true;

    public function mount(Store $store): void
    {
        $this->store = $store;
    }

    #[Computed]
    public function categories()
    {
        return Category::query()->where('store_id', $this->store->id)->orderBy('name')->get();
    }

    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function save(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string|max:5000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['store_id'] = $this->store->id;
        Product::create($validated);

        Flux::toast(variant: 'success', text: __('Product aangemaakt.'));
        $this->redirect(route('products', $this->store), navigate: true);
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('products', $store) }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar producten') }}
        </flux:button>

        <flux:heading size="xl" level="1">{{ __('Nieuw Product') }}</flux:heading>
        <flux:subheading>{{ __('Maak een nieuw product aan voor :store.', ['store' => $store->name]) }}
        </flux:subheading>
    </div>

    <flux:card>
        <form wire:submit="save" class="space-y-6">
            <div class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <flux:input wire:model.live.debounce.300ms="name" :label="__('Productnaam')"
                        placeholder="{{ __('Bijv. Draadloze Muis') }}" required />

                    <flux:input wire:model="slug" :label="__('Slug')" placeholder="{{ __('draadloze-muis') }}"
                        required />

                    <flux:input wire:model="sku" :label="__('SKU nummer')" placeholder="{{ __('Bijv. SKU-1001') }}" />

                    <flux:select wire:model="category_id" :label="__('Categorie')" required>
                        <flux:select.option value="">{{ __('Kies een categorie...') }}</flux:select.option>
                        @foreach ($this->categories as $category)
                            <flux:select.option :value="$category->id">
                                {{ $category->name }}
                            </flux:select.option>
                        @endforeach
                    </flux:select>

                    <flux:input wire:model="price" type="number" step="0.01" min="0" :label="__('Prijs (€)')"
                        placeholder="{{ __('29.99') }}" required />

                    <flux:input wire:model="stock" type="number" min="0" :label="__('Voorraad')"
                        placeholder="{{ __('10') }}" required />

                    <flux:input wire:model="image" :label="__('Foto')" placeholder="{{ __('Foto URL of pad') }}" />

                    <div class="flex items-center sm:pt-6">
                        <flux:switch wire:model="is_active" :label="__('Actief')" />
                    </div>

                    <div class="sm:col-span-3">
                        <flux:textarea wire:model="description" :label="__('Beschrijving')"
                            placeholder="{{ __('Korte omschrijving van het product...') }}" rows="3" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('products', $store) }}" variant="ghost">
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Product aanmaken') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>
