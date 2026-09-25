<?php # [BlazeFolded]:{flux::input}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/input/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::select.option}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/select/option/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::select.option}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/select/option/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::select}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/select/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.column}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/column.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.column}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/column.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.column}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/column.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.column}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/column.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.column}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/column.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.column}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/column.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.columns}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/columns.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::icon}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.cell}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/cell.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.cell}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/cell.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.cell}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/cell.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.cell}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/cell.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.cell}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/cell.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.cell}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/cell.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.row}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/row.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table.rows}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/rows.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::table}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::card}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/card/index.blade.php}:{1789445708} ?>
<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts.store')] class extends Component {
    use WithPagination;

    public Store $store;

    #[Url(as: 'q')]
    public string $search = '';

    #[Url]
    public string $category = '';

    public string $sortField = 'created_at';

    #[Url(as: 'dir')]
    public string $sortDirection = 'desc';

    #[Url]
    public int $perpage = 5;

    public function mount(Store $store): void
    {
        $this->store = $store;
    }

    public function updateSearch(): void
    {
        $this->resetPage();
    }

    public function updateCategory(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function products()
    {
        return Product::query()
            ->with(['category', 'store'])
            ->where('store_id', $this->store->id)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhereHas('category', function ($categoryQuery) {
                            $categoryQuery->where('name', 'like', "%{$this->search}%");
                        });
                });
            })
            ->when($this->category, fn($query) => $query->where('category_id', $this->category))
            ->orderBy('id', 'desc')
            ->paginate($this->perpage);
    }

    #[Computed]
    public function categories()
    {
        return Category::query()->where('store_id', $this->store->id)->orderBy('name')->get();
    }

    public function delete(Product $product): void
    {
        abort_unless((int) $product->store_id === (int) $this->store->id, 403);
        $product->delete();
        Flux::toast(variant: 'success', text: __('Product verwijderd.'));
    }
};
?>

<section class="space-y-4">
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
            <div class="w-full sm:w-72">
                <?php ob_start(); ?><div class="w-full relative block group/input" data-flux-input>
                            <div class="pointer-events-none absolute top-0 bottom-0 border-s border-transparent flex items-center justify-center text-xs text-zinc-400/75 dark:text-white/60 ps-3 start-0">
                    <svg class="shrink-0 [:where(&amp;)]:size-5" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd"/>
</svg>

                        </div>
            
            <input
                type="text"
                
                class="w-full border block disabled:shadow-none dark:shadow-none appearance-none text-base sm:text-sm rounded-lg py-2 h-10 leading-[1.375rem] ps-10 pe-10 bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 disabled:text-zinc-500 placeholder-zinc-400 disabled:placeholder-zinc-400/70 dark:text-zinc-300 dark:disabled:text-zinc-400 dark:placeholder-zinc-400 dark:disabled:placeholder-zinc-500 shadow-xs border-zinc-200 border-b-zinc-300/80 disabled:border-b-zinc-200 dark:border-white/10 dark:disabled:border-white/5 data-invalid:shadow-none data-invalid:border-red-500 dark:data-invalid:border-red-500 disabled:data-invalid:border-red-500 dark:disabled:data-invalid:border-red-500" wire:model.live.debounce.300ms="search" placeholder="<?php echo e(__('Zoek op productnaam...')); ?>"                 name="search"                                                 <?php if (isset($scope)) $__scope = $scope; ?><?php $scope = array (
  'name' => 'search',
  'invalid' => false,
); ?>
                <?php if ($scope['invalid'] || ($scope['name'] && $errors->has($scope['name']))): ?>
                aria-invalid="true" data-invalid
                <?php endif; ?>
                <?php if (isset($__scope)) { $scope = $__scope; unset($__scope); } ?>
                data-flux-control
                data-flux-group-target
                 wire:loading.class="pe-16"                  wire:target="search"             >

                            <div class="absolute top-0 bottom-0 flex items-center gap-x-1.5 pe-2 border-e border-transparent end-0 text-xs text-zinc-400">
                    
                                            <svg class="shrink-0 [:where(&amp;)]:size-5 animate-spin" wire:loading="" wire:target="search" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" data-slot="icon">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
</svg>
                            
                                            <button type="button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-8 text-sm rounded-md gap-2 w-8 inline-flex -ms-1.5 -me-1.5 bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white       -me-1 [[data-flux-input]:has(input:placeholder-shown)_&amp;]:hidden [[data-flux-input]:has(input[disabled])_&amp;]:hidden" data-flux-button="data-flux-button" x-data="fluxInputClearable" x-on:click="clear()" tabindex="-1" aria-label="Clear input" data-flux-clear-button="data-flux-clear-button">
        <svg class="shrink-0 [:where(&amp;)]:size-5" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"/>
</svg>
    </button>
                    
                    
                    
                    
                    
                                    </div>
                    </div>
<?php echo ltrim(ob_get_clean()); ?>
            </div>

            <div class="w-full sm:w-52">
                <?php ob_start(); ?><?php $__blaze->pushData(['wire:model.live' => 'category']); $__env->pushConsumableComponentData(['wire:model.live' => 'category']); ?><select
    class="appearance-none [:where(&amp;)]:w-full ps-3 pe-10 block h-10 py-2 text-base sm:text-sm leading-[1.375rem] rounded-lg shadow-xs border bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 dark:text-zinc-300 disabled:text-zinc-500 dark:disabled:text-zinc-400 has-[option.placeholder:checked]:text-zinc-400 dark:has-[option.placeholder:checked]:text-zinc-400 dark:[&amp;_option]:bg-zinc-700 dark:[&amp;_option]:text-white disabled:shadow-none border border-zinc-200 border-b-zinc-300/80 dark:border-white/10" wire:model.live="category"
         name="category"         data-flux-control
    data-flux-select-native
    data-flux-group-target
>
    
    <?php ob_start(); ?>
                    <?php ob_start(); ?><option
    
     value=""      <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = ''; ?>wire:key="" ><?php ob_start(); ?><?php echo e(__('Alle categorieën')); ?><?php echo trim(ob_get_clean()); ?></option><?php echo ltrim(ob_get_clean()); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php ob_start(); ?><option
    
     value="<?php echo e($cat->id); ?>"      <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = ''.e($cat->id).''; ?>wire:key="<?php echo e($cat->id); ?>" ><?php ob_start(); ?><?php echo e($cat->name); ?><?php echo trim(ob_get_clean()); ?></option><?php echo ltrim(ob_get_clean()); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php echo trim(ob_get_clean()); ?>

</select>
<?php $__blaze->popData(); $__env->popConsumableComponentData(); ?><?php echo ltrim(ob_get_clean()); ?>
            </div>
        </div>

        <?php ob_start(); ?><a href="<?php echo e(route('products.create', $store)); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-10 text-sm rounded-lg gap-2 ps-3 pe-4 inline-flex  bg-[var(--color-accent)] hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)] text-[var(--color-accent-foreground)] border border-black/10 dark:border-0 shadow-[inset_0px_1px_--theme(--color-white/.2)] [[data-flux-button-group]_&amp;]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-[1px] dark:[:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[1px]! [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[color-mix(in_srgb,var(--color-accent-foreground),transparent_85%)]" data-flux-group-target="data-flux-group-target">
        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?>
            <?php echo e(__('Nieuw product')); ?>

        <?php echo trim(ob_get_clean()); ?></span>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
    </div>

    <?php ob_start(); ?><div class="border [:where(&amp;)]:bg-white [:where(&amp;)]:border-zinc-200 dark:[:where(&amp;)]:bg-white/10 dark:[:where(&amp;)]:border-white/10 [:where(&amp;)]:p-6 [:where(&amp;)]:rounded-xl [--flux-bleed:1.5rem]" data-flux-card>
    <?php ob_start(); ?>
        <?php ob_start(); ?><div class="flex flex-col  ">
    

    <ui-table-scroll-area class="overflow-auto">
        <table class="[:where(&amp;)]:min-w-full table-fixed border-separate border-spacing-0 isolate text-zinc-800 whitespace-nowrap [&amp;_dialog]:whitespace-normal [&amp;_[popover]]:whitespace-normal" data-flux-table>
            <?php ob_start(); ?>
            <?php ob_start(); ?><thead class="" data-flux-columns>
    <tr >
        <?php ob_start(); ?>
                <?php ob_start(); ?><th class="py-3 px-3 first:ps-0 last:pe-0 text-start text-sm font-medium text-zinc-800 dark:text-white border-b border-zinc-800/10 dark:border-white/20    **:data-flux-table-sortable:last:me-0" data-flux-column>
            <div class="flex in-[.group\/center-align]:justify-center in-[.group\/end-align]:justify-end"><?php ob_start(); ?><?php echo e(__('Product & SKU')); ?><?php echo trim(ob_get_clean()); ?></div>
    </th>
<?php echo ltrim(ob_get_clean()); ?>
                <?php ob_start(); ?><th class="py-3 px-3 first:ps-0 last:pe-0 text-start text-sm font-medium text-zinc-800 dark:text-white border-b border-zinc-800/10 dark:border-white/20    **:data-flux-table-sortable:last:me-0" data-flux-column>
            <div class="flex in-[.group\/center-align]:justify-center in-[.group\/end-align]:justify-end"><?php ob_start(); ?><?php echo e(__('Categorie')); ?><?php echo trim(ob_get_clean()); ?></div>
    </th>
<?php echo ltrim(ob_get_clean()); ?>
                <?php ob_start(); ?><th class="py-3 px-3 first:ps-0 last:pe-0 text-start text-sm font-medium text-zinc-800 dark:text-white border-b border-zinc-800/10 dark:border-white/20    **:data-flux-table-sortable:last:me-0" data-flux-column>
            <div class="flex in-[.group\/center-align]:justify-center in-[.group\/end-align]:justify-end"><?php ob_start(); ?><?php echo e(__('Prijs & Voorraad')); ?><?php echo trim(ob_get_clean()); ?></div>
    </th>
<?php echo ltrim(ob_get_clean()); ?>
                <?php ob_start(); ?><th class="py-3 px-3 first:ps-0 last:pe-0 text-start text-sm font-medium text-zinc-800 dark:text-white border-b border-zinc-800/10 dark:border-white/20    **:data-flux-table-sortable:last:me-0" data-flux-column>
            <div class="flex in-[.group\/center-align]:justify-center in-[.group\/end-align]:justify-end"><?php ob_start(); ?><?php echo e(__('Datums (Gemaakt / Gewijzigd)')); ?><?php echo trim(ob_get_clean()); ?></div>
    </th>
<?php echo ltrim(ob_get_clean()); ?>
                <?php ob_start(); ?><th class="py-3 px-3 first:ps-0 last:pe-0 text-start text-sm font-medium text-zinc-800 dark:text-white border-b border-zinc-800/10 dark:border-white/20    **:data-flux-table-sortable:last:me-0" data-flux-column>
            <div class="flex in-[.group\/center-align]:justify-center in-[.group\/end-align]:justify-end"><?php ob_start(); ?><?php echo e(__('Status')); ?><?php echo trim(ob_get_clean()); ?></div>
    </th>
<?php echo ltrim(ob_get_clean()); ?>
                <?php ob_start(); ?><th class="py-3 px-3 first:ps-0 last:pe-0 text-start text-sm font-medium text-zinc-800 dark:text-white border-b border-zinc-800/10 dark:border-white/20 group/end-align   **:data-flux-table-sortable:last:me-0" data-flux-column>
            <div class="flex in-[.group\/center-align]:justify-center in-[.group\/end-align]:justify-end"><?php ob_start(); ?><?php echo e(__('Acties')); ?><?php echo trim(ob_get_clean()); ?></div>
    </th>
<?php echo ltrim(ob_get_clean()); ?>
            <?php echo trim(ob_get_clean()); ?>

    </tr>
</thead>
<?php echo ltrim(ob_get_clean()); ?>

            <?php ob_start(); ?><tbody  data-flux-rows>
    <?php ob_start(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php ob_start(); ?><tr  <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'table-'.e($product->id).''; ?>wire:key="table-<?php echo e($product->id); ?>"  class="" data-flux-row>
    <?php ob_start(); ?>
                        <?php ob_start(); ?><td class="[:where(&amp;)]:py-3 [:where(&amp;)]:px-3 first:ps-0 last:pe-0 text-sm  text-zinc-500 dark:text-zinc-300  not-in-[tr:first-child]:border-t border-zinc-800/10 dark:border-white/20" data-flux-cell>
    <?php ob_start(); ?>
                            <div class="flex items-center gap-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->image): ?>
                                    <img src="<?php echo e($product->image); ?>" alt=""
                                        class="size-9 rounded-md object-cover border border-zinc-200 dark:border-zinc-700 shrink-0" />
                                <?php else: ?>
                                    <div
                                        class="size-9 rounded-md bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-400 shrink-0">
                                        <?php ob_start(); ?><svg class="shrink-0 [:where(&amp;)]:size-6 size-5" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>
</svg>

        <?php echo ltrim(ob_get_clean()); ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <div>
                                    <div class="font-medium text-zinc-900 dark:text-white leading-snug">
                                        <?php echo e($product->name); ?>

                                    </div>
                                    <div class="font-mono text-xs text-zinc-500">
                                        SKU: <?php echo e($product->sku ?? '-'); ?>

                                    </div>
                                </div>
                            </div>
                        <?php echo trim(ob_get_clean()); ?>

</td>
<?php echo ltrim(ob_get_clean()); ?>

                        <?php ob_start(); ?><td class="[:where(&amp;)]:py-3 [:where(&amp;)]:px-3 first:ps-0 last:pe-0 text-sm  text-zinc-500 dark:text-zinc-300  not-in-[tr:first-child]:border-t border-zinc-800/10 dark:border-white/20" data-flux-cell>
    <?php ob_start(); ?>
                            <div class="text-xs text-zinc-500">
                                <?php echo e($product->category?->name ?? '-'); ?>

                            </div>
                        <?php echo trim(ob_get_clean()); ?>

</td>
<?php echo ltrim(ob_get_clean()); ?>

                        <?php ob_start(); ?><td class="[:where(&amp;)]:py-3 [:where(&amp;)]:px-3 first:ps-0 last:pe-0 text-sm  text-zinc-500 dark:text-zinc-300  not-in-[tr:first-child]:border-t border-zinc-800/10 dark:border-white/20" data-flux-cell>
    <?php ob_start(); ?>
                            <div class="font-semibold text-zinc-900 dark:text-white leading-snug">
                                € <?php echo e(number_format((float) ($product->price ?? 0), 2, ',', '.')); ?>

                            </div>
                            <div
                                class="text-xs <?php echo e($product->stock <= 5 ? 'text-amber-600 font-medium' : 'text-zinc-500'); ?>">
                                <?php echo e($product->stock); ?> <?php echo e(__('stuks op voorraad')); ?>

                            </div>
                        <?php echo trim(ob_get_clean()); ?>

</td>
<?php echo ltrim(ob_get_clean()); ?>

                        <?php ob_start(); ?><td class="[:where(&amp;)]:py-3 [:where(&amp;)]:px-3 first:ps-0 last:pe-0 text-sm  text-zinc-500 dark:text-zinc-300  not-in-[tr:first-child]:border-t border-zinc-800/10 dark:border-white/20 text-xs text-zinc-500 whitespace-nowrap" data-flux-cell>
    <?php ob_start(); ?>
                            <div><span class="text-zinc-400"><?php echo e(__('Gemaakt:')); ?></span>
                                <?php echo e($product->created_at?->format('d-m-Y H:i')); ?></div>
                            <div><span class="text-zinc-400"><?php echo e(__('Gewijzigd:')); ?></span>
                                <?php echo e($product->updated_at?->format('d-m-Y H:i')); ?></div>
                        <?php echo trim(ob_get_clean()); ?>

</td>
<?php echo ltrim(ob_get_clean()); ?>

                        <?php ob_start(); ?><td class="[:where(&amp;)]:py-3 [:where(&amp;)]:px-3 first:ps-0 last:pe-0 text-sm  text-zinc-500 dark:text-zinc-300  not-in-[tr:first-child]:border-t border-zinc-800/10 dark:border-white/20" data-flux-cell>
    <?php ob_start(); ?>
                            <?php if (!function_exists('_1ba6a663e9da21370dbdadbe5f266aab')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/badge/index.blade.php', $__blaze->compiledPath.'/1ba6a663e9da21370dbdadbe5f266aab.php'); require $__blaze->compiledPath.'/1ba6a663e9da21370dbdadbe5f266aab.php'; } ?>
<?php if (isset($__slots1ba6a663e9da21370dbdadbe5f266aab)) { $__slotsStack1ba6a663e9da21370dbdadbe5f266aab[] = $__slots1ba6a663e9da21370dbdadbe5f266aab; } ?>
<?php if (isset($__attrs1ba6a663e9da21370dbdadbe5f266aab)) { $__attrsStack1ba6a663e9da21370dbdadbe5f266aab[] = $__attrs1ba6a663e9da21370dbdadbe5f266aab; } ?>
<?php $__attrs1ba6a663e9da21370dbdadbe5f266aab = ['size' => 'sm','color' => $product->is_active ? 'green' : 'zinc']; ?>
<?php $__slots1ba6a663e9da21370dbdadbe5f266aab = []; ?>
<?php $__blaze->pushData($__attrs1ba6a663e9da21370dbdadbe5f266aab); ?>
<?php ob_start(); ?>
                                <?php echo e($product->is_active ? __('Actief') : __('Inactief')); ?>

                            <?php $__slots1ba6a663e9da21370dbdadbe5f266aab['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots1ba6a663e9da21370dbdadbe5f266aab); ?>
<?php _1ba6a663e9da21370dbdadbe5f266aab($__blaze, $__attrs1ba6a663e9da21370dbdadbe5f266aab, $__slots1ba6a663e9da21370dbdadbe5f266aab, ['color'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack1ba6a663e9da21370dbdadbe5f266aab)) { $__slots1ba6a663e9da21370dbdadbe5f266aab = array_pop($__slotsStack1ba6a663e9da21370dbdadbe5f266aab); } ?>
<?php if (! empty($__attrsStack1ba6a663e9da21370dbdadbe5f266aab)) { $__attrs1ba6a663e9da21370dbdadbe5f266aab = array_pop($__attrsStack1ba6a663e9da21370dbdadbe5f266aab); } ?>
<?php $__blaze->popData(); ?>
                        <?php echo trim(ob_get_clean()); ?>

</td>
<?php echo ltrim(ob_get_clean()); ?>

                        <?php ob_start(); ?><td class="[:where(&amp;)]:py-3 [:where(&amp;)]:px-3 first:ps-0 last:pe-0 text-sm text-end [&amp;&gt;*]:ms-auto text-zinc-500 dark:text-zinc-300  not-in-[tr:first-child]:border-t border-zinc-800/10 dark:border-white/20" data-flux-cell>
    <?php ob_start(); ?>
                            <?php ob_start(); ?><a href="<?php echo e(route('products.show', [$store, $product])); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-8 text-sm rounded-md gap-2 w-8 inline-flex  bg-white hover:bg-zinc-50 dark:bg-zinc-700 dark:hover:bg-zinc-600/75 text-zinc-800 dark:text-white border border-zinc-200 hover:border-zinc-200 disabled:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-600 dark:hover:border-zinc-600 dark:disabled:border-zinc-600 shadow-xs [[data-flux-button-group]_&amp;]:border-s-0 [:is([data-flux-button-group]&gt;&amp;:first-child,_[data-flux-button-group]_:first-child&gt;&amp;)]:border-s-[1px]" data-flux-group-target="data-flux-group-target">
        <svg class="shrink-0 [:where(&amp;)]:size-5" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
  <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" clip-rule="evenodd"/>
</svg>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
                            <?php ob_start(); ?><a href="<?php echo e(route('products.edit', [$store, $product])); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-8 text-sm rounded-md gap-2 w-8 inline-flex  bg-white hover:bg-zinc-50 dark:bg-zinc-700 dark:hover:bg-zinc-600/75 text-zinc-800 dark:text-white border border-zinc-200 hover:border-zinc-200 disabled:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-600 dark:hover:border-zinc-600 dark:disabled:border-zinc-600 shadow-xs [[data-flux-button-group]_&amp;]:border-s-0 [:is([data-flux-button-group]&gt;&amp;:first-child,_[data-flux-button-group]_:first-child&gt;&amp;)]:border-s-[1px]" data-flux-group-target="data-flux-group-target">
        <svg class="shrink-0 [:where(&amp;)]:size-5" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"/>
  <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"/>
</svg>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
                            <?php ob_start(); ?><button type="button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-8 text-sm rounded-md gap-2 w-8 inline-flex  bg-white hover:bg-zinc-50 dark:bg-zinc-700 dark:hover:bg-zinc-600/75 text-zinc-800 dark:text-white border border-zinc-200 hover:border-zinc-200 disabled:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-600 dark:hover:border-zinc-600 dark:disabled:border-zinc-600 shadow-xs [[data-flux-button-group]_&amp;]:border-s-0 [:is([data-flux-button-group]&gt;&amp;:first-child,_[data-flux-button-group]_:first-child&gt;&amp;)]:border-s-[1px] *:transition-opacity [&amp;[data-loading]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[data-flux-loading]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[data-loading]&gt;[data-flux-loading-indicator]]:opacity-100 [&amp;[data-flux-loading]&gt;[data-flux-loading-indicator]]:opacity-100 data-loading:pointer-events-none data-flux-loading:pointer-events-none" data-flux-button="data-flux-button" data-flux-group-target="data-flux-group-target" wire:target="delete(<?php echo e($product->id); ?>)" wire:loading.attr="data-flux-loading" wire:click="delete(<?php echo e($product->id); ?>)" wire:confirm="<?php echo e(__('Weet je zeker dat je dit product wilt verwijderen?')); ?>">
        <div class="absolute inset-0 flex items-center justify-center opacity-0" data-flux-loading-indicator>
                <svg class="shrink-0 [:where(&amp;)]:size-5 animate-spin" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" data-slot="icon">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
</svg>
                    </div>
        
                    <svg class="shrink-0 [:where(&amp;)]:size-5" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd"/>
</svg>
    </button>
<?php echo ltrim(ob_get_clean()); ?>
                        <?php echo trim(ob_get_clean()); ?>

</td>
<?php echo ltrim(ob_get_clean()); ?>
                    <?php echo trim(ob_get_clean()); ?>

</tr>
<?php echo ltrim(ob_get_clean()); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <?php echo trim(ob_get_clean()); ?>

</tbody>
<?php echo ltrim(ob_get_clean()); ?>
        <?php echo trim(ob_get_clean()); ?>

        </table>
    </ui-table-scroll-area>

    

    </div>
<?php echo ltrim(ob_get_clean()); ?>

        <?php if (!function_exists('_f03eacb017552548f488c6a1c94b6a5a')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/table/index.blade.php', $__blaze->compiledPath.'/f03eacb017552548f488c6a1c94b6a5a.php'); require $__blaze->compiledPath.'/f03eacb017552548f488c6a1c94b6a5a.php'; } ?>
<?php $__blaze->pushData(['paginate' => $this->products]); ?>
<?php _f03eacb017552548f488c6a1c94b6a5a($__blaze, ['paginate' => $this->products], [], ['paginate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
    <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
</section><?php /**PATH C:\wamp64\www\ecommerce\resources\views\pages\vendors\products\⚡index.blade.php ENDPATH**/ ?>