<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::card}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/card/index.blade.php}:{1789445708} ?>
<?php

use App\Models\Category;
use App\Models\Store;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {
    public Store $store;
    public Category $category;

    public function mount(Store $store, Category $category): void
    {
        $this->store = $store;
        $this->category = $category;
        abort_unless((int) $category->store_id === (int) $store->id, 404);
    }

    public function delete(): void
    {
        $this->category->delete();
        Flux::toast(variant: 'success', text: __('Categorie verwijderd.'));
        $this->redirect(route('categories', $this->store), navigate: true);
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <?php ob_start(); ?><a href="<?php echo e(route('categories', $store)); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-8 text-sm rounded-md gap-2 ps-2 pe-3 inline-flex  bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-800 dark:text-white       -ms-2">
        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?>
            <?php echo e(__('Terug naar categorieën')); ?>

        <?php echo trim(ob_get_clean()); ?></span>
    </a>
<?php echo ltrim(ob_get_clean()); ?>

        <div class="flex items-center justify-between gap-4">
            <?php ob_start(); ?><h1 class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-2xl [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2" data-flux-heading><?php ob_start(); ?><?php echo e($category->name); ?><?php echo trim(ob_get_clean()); ?></h1>

        <?php echo ltrim(ob_get_clean()); ?>

            <div class="flex items-center gap-2">
                <?php ob_start(); ?><a href="<?php echo e(route('categories.edit', [$store, $category])); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-8 text-sm rounded-md gap-2 ps-2 pe-3 inline-flex  bg-[var(--color-accent)] hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)] text-[var(--color-accent-foreground)] border border-black/10 dark:border-0 shadow-[inset_0px_1px_--theme(--color-white/.2)] [[data-flux-button-group]_&amp;]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-[1px] dark:[:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[1px]! [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[color-mix(in_srgb,var(--color-accent-foreground),transparent_85%)]" data-flux-group-target="data-flux-group-target">
        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z"/>
  <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?>
                    <?php echo e(__('Bewerken')); ?>

                <?php echo trim(ob_get_clean()); ?></span>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
                <?php ob_start(); ?><button type="button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-8 text-sm rounded-md gap-2 ps-2 pe-3 inline-flex  bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-500 text-white  shadow-[inset_0px_1px_var(--color-red-500),inset_0px_2px_--theme(--color-white/.15)] dark:shadow-none [[data-flux-button-group]_&amp;]:border-e [:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-0 [[data-flux-button-group]_&amp;]:border-red-600 dark:[[data-flux-button-group]_&amp;]:border-red-900/25 *:transition-opacity [&amp;[data-loading]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[data-flux-loading]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[data-loading]&gt;[data-flux-loading-indicator]]:opacity-100 [&amp;[data-flux-loading]&gt;[data-flux-loading-indicator]]:opacity-100 data-loading:pointer-events-none data-flux-loading:pointer-events-none" data-flux-button="data-flux-button" data-flux-group-target="data-flux-group-target" wire:target="delete" wire:loading.attr="data-flux-loading" wire:click="delete" wire:confirm="<?php echo e(__('Weet je zeker dat je deze categorie wilt verwijderen?')); ?>">
        <div class="absolute inset-0 flex items-center justify-center opacity-0" data-flux-loading-indicator>
                <svg class="shrink-0 [:where(&amp;)]:size-4 animate-spin" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" data-slot="icon">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
</svg>
                    </div>
        
                    <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?>
                    <?php echo e(__('Verwijderen')); ?>

                <?php echo trim(ob_get_clean()); ?></span>
    </button>
<?php echo ltrim(ob_get_clean()); ?>
            </div>
        </div>
    </div>

    <?php ob_start(); ?><div class="border [:where(&amp;)]:bg-white [:where(&amp;)]:border-zinc-200 dark:[:where(&amp;)]:bg-white/10 dark:[:where(&amp;)]:border-white/10 [:where(&amp;)]:p-6 [:where(&amp;)]:rounded-xl [--flux-bleed:1.5rem] space-y-3 text-sm" data-flux-card>
    <?php ob_start(); ?>
        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400"><?php echo e(__('Naam')); ?></span>
            <span class="font-medium text-zinc-900 dark:text-white"><?php echo e($category->name); ?></span>
        </div>

        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400"><?php echo e(__('Slug')); ?></span>
            <span class="font-medium text-zinc-900 dark:text-white"><?php echo e($category->slug); ?></span>
        </div>

        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400"><?php echo e(__('Afbeelding')); ?></span>
            <span class="font-medium text-zinc-900 dark:text-white"><?php echo e($category->image ?? '-'); ?></span>
        </div>

        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400"><?php echo e(__('Status')); ?></span>
            <?php if (!function_exists('_1ba6a663e9da21370dbdadbe5f266aab')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/badge/index.blade.php', $__blaze->compiledPath.'/1ba6a663e9da21370dbdadbe5f266aab.php'); require $__blaze->compiledPath.'/1ba6a663e9da21370dbdadbe5f266aab.php'; } ?>
<?php if (isset($__slots1ba6a663e9da21370dbdadbe5f266aab)) { $__slotsStack1ba6a663e9da21370dbdadbe5f266aab[] = $__slots1ba6a663e9da21370dbdadbe5f266aab; } ?>
<?php if (isset($__attrs1ba6a663e9da21370dbdadbe5f266aab)) { $__attrsStack1ba6a663e9da21370dbdadbe5f266aab[] = $__attrs1ba6a663e9da21370dbdadbe5f266aab; } ?>
<?php $__attrs1ba6a663e9da21370dbdadbe5f266aab = ['size' => 'sm','color' => $category->is_active ? 'green' : 'zinc']; ?>
<?php $__slots1ba6a663e9da21370dbdadbe5f266aab = []; ?>
<?php $__blaze->pushData($__attrs1ba6a663e9da21370dbdadbe5f266aab); ?>
<?php ob_start(); ?>
                <?php echo e($category->is_active ? __('Actief') : __('Inactief')); ?>

            <?php $__slots1ba6a663e9da21370dbdadbe5f266aab['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots1ba6a663e9da21370dbdadbe5f266aab); ?>
<?php _1ba6a663e9da21370dbdadbe5f266aab($__blaze, $__attrs1ba6a663e9da21370dbdadbe5f266aab, $__slots1ba6a663e9da21370dbdadbe5f266aab, ['color'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack1ba6a663e9da21370dbdadbe5f266aab)) { $__slots1ba6a663e9da21370dbdadbe5f266aab = array_pop($__slotsStack1ba6a663e9da21370dbdadbe5f266aab); } ?>
<?php if (! empty($__attrsStack1ba6a663e9da21370dbdadbe5f266aab)) { $__attrs1ba6a663e9da21370dbdadbe5f266aab = array_pop($__attrsStack1ba6a663e9da21370dbdadbe5f266aab); } ?>
<?php $__blaze->popData(); ?>
        </div>

        <div class="flex justify-between items-center py-1.5 border-b border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400"><?php echo e(__('Aangemaakt op')); ?></span>
            <span class="text-zinc-700 dark:text-zinc-300"><?php echo e($category->created_at?->format('d-m-Y H:i')); ?></span>
        </div>

        <div class="flex justify-between items-center py-1.5">
            <span class="text-zinc-500 dark:text-zinc-400"><?php echo e(__('Geüpdatet op')); ?></span>
            <span class="text-zinc-700 dark:text-zinc-300"><?php echo e($category->updated_at?->format('d-m-Y H:i')); ?></span>
        </div>

        <div class="pt-3 border-t border-zinc-100 dark:border-zinc-800">
            <span class="text-zinc-500 dark:text-zinc-400 block mb-1 font-medium"><?php echo e(__('Beschrijving')); ?></span>
            <p class="text-zinc-700 dark:text-zinc-300 leading-relaxed bg-zinc-50 dark:bg-zinc-800/40 p-3 rounded-lg border border-zinc-200 dark:border-zinc-700/50">
                <?php echo e($category->description ?: '-'); ?>

            </p>
        </div>
    <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
</section><?php /**PATH C:\wamp64\www\ecommerce\resources\views\pages\vendors\categories\⚡show.blade.php ENDPATH**/ ?>