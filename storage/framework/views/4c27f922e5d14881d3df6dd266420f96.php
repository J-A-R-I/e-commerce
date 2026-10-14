<?php # [BlazeFolded]:{flux::heading}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::icon}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::label}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/label.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::description}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/description.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::link}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/link.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
?>

<section class="w-full">
    <?php echo $__env->make('partials.settings-heading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php ob_start(); ?><h2 class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-sm [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 sr-only" data-flux-heading><?php ob_start(); ?><?php echo e(__('Profile settings')); ?><?php echo trim(ob_get_clean()); ?></h2>

        <?php echo ltrim(ob_get_clean()); ?>

    <?php if (isset($component)) { $__componentOriginal47c6e5d793050babb6edb764210472f1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47c6e5d793050babb6edb764210472f1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'af6a29d55d306249cfe5b80ece79872b::settings.layout','data' => ['heading' => __('Profile'),'subheading' => __('Update your name and email address')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pages::settings.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Profile')),'subheading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Update your name and email address'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <div class="flex items-center gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->hasMedia('profile_picture')): ?>
                    <img 
                        src="<?php echo e(auth()->user()->getFirstMediaUrl('profile_picture', 'avatar')); ?>"
                        alt="<?php echo e(auth()->user()->name); ?>"
                        class="size-16 rounded-full object-cover border border-zinc-200 dark:border-zinc-700 shrink-0" 
                        loading="lazy"
                    />
                <?php else: ?>
                    <div class="size-16 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-400 shrink-0">
                        <?php ob_start(); ?><svg class="shrink-0 [:where(&amp;)]:size-6 size-8" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
</svg>

        <?php echo ltrim(ob_get_clean()); ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="flex-1">
                    <?php ob_start(); ?><ui-label class="inline-flex items-center text-sm font-medium  [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white [&amp;:has([data-flux-label-trailing])]:flex" for="photo" data-flux-label>
    <?php ob_start(); ?><?php echo e(__('Profielfoto')); ?><?php echo trim(ob_get_clean()); ?>


    
    
    </ui-label>
<?php echo ltrim(ob_get_clean()); ?>
                    <?php ob_start(); ?><ui-description class="text-sm text-zinc-500 dark:text-white/60  mb-1 text-xs" data-flux-description>
    <?php ob_start(); ?><?php echo e(__('Optioneel. Maximaal 5MB (JPG, PNG, WebP).')); ?><?php echo trim(ob_get_clean()); ?>

</ui-description>
<?php echo ltrim(ob_get_clean()); ?>
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
                    <?php if (!function_exists('_cbd1fe236b0fd59094f26ce3280fabbd')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/error.blade.php', $__blaze->compiledPath.'/cbd1fe236b0fd59094f26ce3280fabbd.php'); require $__blaze->compiledPath.'/cbd1fe236b0fd59094f26ce3280fabbd.php'; } ?>
<?php $__blaze->pushData(['name' => 'photo']); ?>
<?php _cbd1fe236b0fd59094f26ce3280fabbd($__blaze, ['name' => 'photo'], [], [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <?php if (!function_exists('_205395226ef5a10927c9e81d13a34aec')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/input/index.blade.php', $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'); require $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'; } ?>
<?php $__blaze->pushData(['wire:model' => 'firstname','label' => __('Voornaam'),'type' => 'text','required' => true,'autofocus' => true,'autocomplete' => 'given-name']); ?>
<?php _205395226ef5a10927c9e81d13a34aec($__blaze, ['wire:model' => 'firstname','label' => __('Voornaam'),'type' => 'text','required' => true,'autofocus' => true,'autocomplete' => 'given-name'], [], ['label', 'required', 'autofocus'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
                <?php if (!function_exists('_205395226ef5a10927c9e81d13a34aec')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/input/index.blade.php', $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'); require $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'; } ?>
<?php $__blaze->pushData(['wire:model' => 'lastname','label' => __('Achternaam'),'type' => 'text','required' => true,'autocomplete' => 'family-name']); ?>
<?php _205395226ef5a10927c9e81d13a34aec($__blaze, ['wire:model' => 'lastname','label' => __('Achternaam'),'type' => 'text','required' => true,'autocomplete' => 'family-name'], [], ['label', 'required'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
            </div>

            <div>
                <?php if (!function_exists('_205395226ef5a10927c9e81d13a34aec')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/input/index.blade.php', $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'); require $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'; } ?>
<?php $__blaze->pushData(['wire:model' => 'email','label' => __('Email'),'type' => 'email','required' => true,'autocomplete' => 'email']); ?>
<?php _205395226ef5a10927c9e81d13a34aec($__blaze, ['wire:model' => 'email','label' => __('Email'),'type' => 'email','required' => true,'autocomplete' => 'email'], [], ['label', 'required'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->hasUnverifiedEmail): ?>
                    <div>
                        <?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 mt-4" data-flux-text ><?php ob_start(); ?>
                            <?php echo e(__('Your email address is unverified.')); ?>


                            <?php ob_start(); ?><a class="inline font-medium underline-offset-[6px] hover:decoration-current underline [[data-color]&gt;&amp;]:text-inherit [[data-color]&gt;&amp;]:decoration-current/20 dark:[[data-color]&gt;&amp;]:decoration-current/50 [[data-color]&gt;&amp;]:hover:decoration-current text-[var(--color-accent-content)] decoration-[color-mix(in_oklab,var(--color-accent-content),transparent_80%)] text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification" data-flux-link ><?php ob_start(); ?>
                                <?php echo e(__('Click here to re-send the verification email.')); ?>

                            <?php echo trim(ob_get_clean()); ?></a><?php echo ltrim(ob_get_clean()); ?>
                        <?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status') === 'verification-link-sent'): ?>
                            <?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 mt-2 font-medium !dark:text-green-400 !text-green-600" data-flux-text ><?php ob_start(); ?>
                                <?php echo e(__('A new verification link has been sent to your email address.')); ?>

                            <?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <?php ob_start(); ?><button type="submit" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-10 text-sm rounded-lg gap-2 ps-4 pe-4 inline-flex  bg-[var(--color-accent)] hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)] text-[var(--color-accent-foreground)] border border-black/10 dark:border-0 shadow-[inset_0px_1px_--theme(--color-white/.2)] [[data-flux-button-group]_&amp;]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-[1px] dark:[:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[1px]! [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[color-mix(in_srgb,var(--color-accent-foreground),transparent_85%)] *:transition-opacity [&amp;[disabled]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[disabled]&gt;[data-flux-loading-indicator]]:opacity-100 [&amp;[disabled]]:pointer-events-none   w-full" data-flux-button="data-flux-button" data-flux-group-target="data-flux-group-target" data-test="update-profile-button">
        <div class="absolute inset-0 flex items-center justify-center opacity-0" data-flux-loading-indicator>
                <svg class="shrink-0 [:where(&amp;)]:size-4 animate-spin" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" data-slot="icon">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
</svg>
                    </div>
        
        
                    
            
            <span><?php ob_start(); ?>
                        <?php echo e(__('Save')); ?>

                    <?php echo trim(ob_get_clean()); ?></span>
    </button>
<?php echo ltrim(ob_get_clean()); ?>
                </div>

            </div>
        </form>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->showDeleteUser): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages::settings.delete-user-form', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-63816644-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47c6e5d793050babb6edb764210472f1)): ?>
<?php $attributes = $__attributesOriginal47c6e5d793050babb6edb764210472f1; ?>
<?php unset($__attributesOriginal47c6e5d793050babb6edb764210472f1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47c6e5d793050babb6edb764210472f1)): ?>
<?php $component = $__componentOriginal47c6e5d793050babb6edb764210472f1; ?>
<?php unset($__componentOriginal47c6e5d793050babb6edb764210472f1); ?>
<?php endif; ?>
</section><?php /**PATH C:\wamp64\www\ecommerce\storage\framework\views/livewire/views/ab80bfb6.blade.php ENDPATH**/ ?>