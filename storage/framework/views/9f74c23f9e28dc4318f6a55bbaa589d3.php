<?php # [BlazeFolded]:{flux::icon}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::card}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/card/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::icon}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::card}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/card/index.blade.php}:{1789445708} ?>
<?php

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts.frontend')] class extends Component {
    public function with(): array
    {
        return [
            'user' => Auth::user(),
        ];
    }
};
?>

<div class="flex flex-col flex-1 justify-center w-full max-w-4xl mx-auto py-12 sm:py-16">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            <div class="grid grid-cols-1 <?php echo e($user->isAdmin() ? 'md:grid-cols-2' : ''); ?> gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->isAdmin()): ?>
                    <?php ob_start(); ?><div class="border [:where(&amp;)]:bg-white [:where(&amp;)]:border-zinc-200 dark:[:where(&amp;)]:bg-white/10 dark:[:where(&amp;)]:border-white/10 [:where(&amp;)]:p-6 [:where(&amp;)]:rounded-xl [--flux-bleed:1.5rem] flex flex-col justify-between p-6 hover:border-zinc-400 dark:hover:border-zinc-600 transition space-y-6" data-flux-card>
    <?php ob_start(); ?>
                        <div class="space-y-3">
                            <div
                                class="size-12 rounded-xl bg-amber-500/10 dark:bg-amber-400/10 text-amber-600 dark:text-amber-400 flex items-center justify-center">
                                <?php ob_start(); ?><svg class="shrink-0 [:where(&amp;)]:size-6 size-6" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
</svg>

        <?php echo ltrim(ob_get_clean()); ?>
                            </div>
                            <?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-base [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2" data-flux-heading><?php ob_start(); ?><?php echo e(__('Platform Beheer')); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?>
                            <?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 text-sm" data-flux-text ><?php ob_start(); ?>
                                <?php echo e(__('Krijg volledig inzicht in verkopers, gebruikers en systeeminstellingen.')); ?>

                            <?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?>
                        </div>

                        <?php ob_start(); ?><a href="<?php echo e(route('backend')); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-10 text-sm rounded-lg gap-2 ps-4 pe-3 inline-flex  bg-[var(--color-accent)] hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)] text-[var(--color-accent-foreground)] border border-black/10 dark:border-0 shadow-[inset_0px_1px_--theme(--color-white/.2)] [[data-flux-button-group]_&amp;]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-[1px] dark:[:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[1px]! [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[color-mix(in_srgb,var(--color-accent-foreground),transparent_85%)]    w-full" data-flux-group-target="data-flux-group-target">
        <span><?php ob_start(); ?>
                            <?php echo e(__('Open Admin Backend')); ?>

                        <?php echo trim(ob_get_clean()); ?></span>
        
        
                    
                        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
</svg>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
                    <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->isVendor() || $user->isAdmin()): ?>
                    <?php ob_start(); ?><div class="border [:where(&amp;)]:bg-white [:where(&amp;)]:border-zinc-200 dark:[:where(&amp;)]:bg-white/10 dark:[:where(&amp;)]:border-white/10 [:where(&amp;)]:p-6 [:where(&amp;)]:rounded-xl [--flux-bleed:1.5rem] flex flex-col justify-between p-6 hover:border-zinc-400 dark:hover:border-zinc-600 transition space-y-6" data-flux-card>
    <?php ob_start(); ?>
                        <div class="space-y-3">
                            <div
                                class="size-12 rounded-xl bg-indigo-500/10 dark:bg-indigo-400/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                                <?php ob_start(); ?><svg class="shrink-0 [:where(&amp;)]:size-6 size-6" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/>
</svg>

        <?php echo ltrim(ob_get_clean()); ?>
                            </div>

                            <div>
                                <?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-base [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2" data-flux-heading><?php ob_start(); ?>
                                    <?php echo e($user->store ? $user->store->name : __('Jouw eigen winkel')); ?>

                                <?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?>
                                <span class="text-xs font-mono text-zinc-500">
                                    <?php echo e($user->store ? __('Winkel eigenaar') : __('Start met verkopen')); ?>

                                </span>
                            </div>

                            <?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 text-sm" data-flux-text ><?php ob_start(); ?>
                                <?php echo e(__('Voeg producten toe, beheer je voorraad en optimaliseer je prijzen via je persoonlijke dashboard.')); ?>

                            <?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->store): ?>
                            <?php if (!function_exists('_fb729f1fbb168c8ea37cb7f1e91b394a')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php', $__blaze->compiledPath.'/fb729f1fbb168c8ea37cb7f1e91b394a.php'); require $__blaze->compiledPath.'/fb729f1fbb168c8ea37cb7f1e91b394a.php'; } ?>
<?php if (isset($__slotsfb729f1fbb168c8ea37cb7f1e91b394a)) { $__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a[] = $__slotsfb729f1fbb168c8ea37cb7f1e91b394a; } ?>
<?php if (isset($__attrsfb729f1fbb168c8ea37cb7f1e91b394a)) { $__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a[] = $__attrsfb729f1fbb168c8ea37cb7f1e91b394a; } ?>
<?php $__attrsfb729f1fbb168c8ea37cb7f1e91b394a = ['href' => e(route('dashboard', $user->store)),'variant' => e($user->isAdmin() ? 'outline' : 'primary'),'iconTrailing' => 'arrow-right','class' => 'w-full']; ?>
<?php $__slotsfb729f1fbb168c8ea37cb7f1e91b394a = []; ?>
<?php $__blaze->pushData($__attrsfb729f1fbb168c8ea37cb7f1e91b394a); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Naar :store Dashboard', ['store' => $user->store->name])); ?>

                            <?php $__slotsfb729f1fbb168c8ea37cb7f1e91b394a['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsfb729f1fbb168c8ea37cb7f1e91b394a); ?>
<?php _fb729f1fbb168c8ea37cb7f1e91b394a($__blaze, $__attrsfb729f1fbb168c8ea37cb7f1e91b394a, $__slotsfb729f1fbb168c8ea37cb7f1e91b394a, [], ['iconTrailing' => 'icon-trailing'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a)) { $__slotsfb729f1fbb168c8ea37cb7f1e91b394a = array_pop($__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a); } ?>
<?php if (! empty($__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a)) { $__attrsfb729f1fbb168c8ea37cb7f1e91b394a = array_pop($__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a); } ?>
<?php $__blaze->popData(); ?>
                        <?php else: ?>
                            <?php ob_start(); ?><a href="<?php echo e(route('frontend.stores.create')); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-10 text-sm rounded-lg gap-2 ps-3 pe-4 inline-flex  bg-[var(--color-accent)] hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)] text-[var(--color-accent-foreground)] border border-black/10 dark:border-0 shadow-[inset_0px_1px_--theme(--color-white/.2)] [[data-flux-button-group]_&amp;]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-[1px] dark:[:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[1px]! [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[color-mix(in_srgb,var(--color-accent-foreground),transparent_85%)]    w-full" data-flux-group-target="data-flux-group-target" wire:navigate="">
        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?>
                                <?php echo e(__('Direct winkel openen')); ?>

                            <?php echo trim(ob_get_clean()); ?></span>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php /**PATH C:\wamp64\www\ecommerce\resources\views\pages\⚡welcome.blade.php ENDPATH**/ ?>