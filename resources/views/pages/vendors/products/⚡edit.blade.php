<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {

    use WithFileUploads;

    public Store $store;
    public Product $product;

    public string $name = '';
    public ?int $category_id = null;
    public string $slug = '';
    public ?string $description = null;
    public ?string $price = null;
    public int $stock = 0;
    public ?string $sku = null;
    public bool $is_active = true;
    public $photo = null;

    public function mount(Store $store, Product $product): void
    {
        $this->store = $store;
        $this->product = $product;
        abort_unless((int) $product->store_id === (int) $store->id, 404);
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->price = $product->price !== null ? (string) $product->price : null;
        $this->stock = (int) $product->stock;
        $this->sku = $product->sku;
        $this->image = $product->image;
        $this->is_active = (bool) $product->is_active;
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
            'slug' => ['required', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($this->product->id)],
            'description' => 'nullable|string|max:5000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sku' => ['nullable', 'string', 'max:255', Rule::unique('products', 'sku')->ignore($this->product->id)],
            'is_active' => 'boolean',
            'photo' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120',],
            ]);

            $photo = $validated['photo'] ?? null;
            unset($validated['photo']);
            
            $this->product->update($validated);

            if ($photo) {
                $this->product->addMedia($photo->getRealPath())
                    ->usingFileName($photo->getClientOriginalName())
                    ->toMediaCollection('product');
            }

            Flux::toast(variant: 'success', text: __('Product aangepast.'));
            $this->redirect(route('products', $this->store), navigate: true);
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <flux:button href="{{ route('products', $store) }}" variant="ghost" size="sm" icon="arrow-left" class="-ms-2">
            {{ __('Terug naar producten') }}
        </flux:button>

        <flux:heading size="xl" level="1">{{ __('Product bewerken') }}</flux:heading>
        <flux:subheading>{{ __('Pas de gegevens van het product aan.') }}</flux:subheading>
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
                        placeholder="{{ __('prijs') }}" required />

                    <flux:input wire:model="stock" type="number" min="0" :label="__('Voorraad')"
                        placeholder="{{ __('10') }}" required />

                    <div class="flex items-center sm:pt-6">
                        <flux:switch wire:model="is_active" :label="__('Actief')" />
                    </div>

                    <div class="sm:col-span-3">
                        <flux:textarea wire:model="description" :label="__('Beschrijving')"
                            placeholder="{{ __('Korte omschrijving van het product...') }}" rows="3" />
                    </div>

                    <div class="space-y-2">
                        <label
                            for="photo"
                            class="block text-sm font-medium text-zinc-900 dark:text-white"
                        >
                            Productfoto
                        </label>

                        <input
                            id="photo"
                            type="file"
                            wire:model="photo"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full text-sm text-zinc-500
                                file:mr-4 file:rounded-lg file:border-0
                                file:bg-zinc-100 file:px-4 file:py-2
                                file:font-medium file:text-zinc-900
                                hover:file:bg-zinc-200
                                dark:file:bg-zinc-800 dark:file:text-white"
                        />

                        @error('photo')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <div wire:loading wire:target="photo">
                            <p class="text-sm text-zinc-500">
                                Foto wordt geüpload...
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <flux:button href="{{ route('products', $store) }}" variant="ghost">
                    {{ __('Annuleren') }}
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ __('Product opslaan') }}
                </flux:button>
            </div>
        </form>
    </flux:card>
</section>
