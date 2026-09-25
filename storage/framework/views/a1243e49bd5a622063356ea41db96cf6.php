<?php # [BlazeFolded]:{flux::heading}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::subheading}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/subheading.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::card}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/card/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::card}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/card/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::card}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/card/index.blade.php}:{1789445708} ?>
<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.store')] class extends Component {
    public Store $store;

    public int $totalProducts = 0;
    public int $totalCategories = 0;
    public int $activeProducts = 0;

    public function mount(Store $store): void
    {
        $this->store = $store;

        $this->totalProducts = $this->store->products()->count();
        $this->totalCategories = $this->store->categories()->count();
        $this->activeProducts = $this->store->products()->where('is_active', true)->count();
    }
};
?>

<section class="space-y-6">
    <div class="space-y-1">
        <?php ob_start(); ?><h1 class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-2xl [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2" data-flux-heading><?php ob_start(); ?><?php echo e($store->name); ?> Dashboard<?php echo trim(ob_get_clean()); ?></h1>

        <?php echo ltrim(ob_get_clean()); ?>
        <?php ob_start(); ?><div class="text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70" data-flux-subheading>
    <?php ob_start(); ?><?php echo e(__('Overzicht van :store', ['store' => $store->name])); ?><?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <?php ob_start(); ?><div class="border [:where(&amp;)]:bg-white [:where(&amp;)]:border-zinc-200 dark:[:where(&amp;)]:bg-white/10 dark:[:where(&amp;)]:border-white/10 [:where(&amp;)]:p-6 [:where(&amp;)]:rounded-xl [--flux-bleed:1.5rem] space-y-2" data-flux-card>
    <?php ob_start(); ?>
            <span class="text-xs font-medium uppercase tracking-wider text-zinc-500"><?php echo e(__('Totaal Producten')); ?></span>
            <div class="text-3xl font-extrabold text-zinc-900 dark:text-white"><?php echo e($totalProducts); ?></div>
        <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
        <?php ob_start(); ?><div class="border [:where(&amp;)]:bg-white [:where(&amp;)]:border-zinc-200 dark:[:where(&amp;)]:bg-white/10 dark:[:where(&amp;)]:border-white/10 [:where(&amp;)]:p-6 [:where(&amp;)]:rounded-xl [--flux-bleed:1.5rem] space-y-2" data-flux-card>
    <?php ob_start(); ?>
            <span class="text-xs font-medium uppercase tracking-wider text-zinc-500"><?php echo e(__('Actief in shop')); ?></span>
            <div class="text-3xl font-extrabold text-zinc-900 dark:text-white"><?php echo e($activeProducts); ?></div>
        <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
        <?php ob_start(); ?><div class="border [:where(&amp;)]:bg-white [:where(&amp;)]:border-zinc-200 dark:[:where(&amp;)]:bg-white/10 dark:[:where(&amp;)]:border-white/10 [:where(&amp;)]:p-6 [:where(&amp;)]:rounded-xl [--flux-bleed:1.5rem] space-y-2" data-flux-card>
    <?php ob_start(); ?>
            <span
                class="text-xs font-medium uppercase tracking-wider text-zinc-500"><?php echo e(__('Totaal Categories')); ?></span>
            <div class="text-3xl font-extrabold text-zinc-900 dark:text-white"><?php echo e($totalCategories); ?></div>
        <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
    </div>
</section>
<?php /**PATH C:\wamp64\www\ecommerce\resources\views\pages\⚡dashboard.blade.php ENDPATH**/ ?>