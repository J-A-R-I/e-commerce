<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::subheading}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/subheading.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::select.option}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/select/option/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1789445708} ?>
<?php # [BlazeFolded]:{flux::card}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/card/index.blade.php}:{1789445708} ?>
<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use App\Models\User;
use App\Models\Role;

new #[Layout('layouts.app')] class extends Component {
    public User $user;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $role_id = 0;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
    }

    #[Computed]
    public function roles()
    {
        return Role::query()->orderBy('name')->get();
    }

    public function save(): void
    {
        $validated = $this->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $this->user->update($validated);
        $this->store->touch();

        $this->redirect(route('users'), navigate: true);
        Flux::toast(variant: 'success', text: __('User aangepast.'));
    }
};
?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="space-y-2">
        <?php ob_start(); ?><a href="<?php echo e(route('users')); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-8 text-sm rounded-md gap-2 ps-2 pe-3 inline-flex  bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-800 dark:text-white       -ms-2">
        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?>
            <?php echo e(__('Terug naar gebruikers')); ?>

        <?php echo trim(ob_get_clean()); ?></span>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
        <?php ob_start(); ?><h1 class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-2xl [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2" data-flux-heading><?php ob_start(); ?><?php echo e(__('Gebruiker bewerken')); ?><?php echo trim(ob_get_clean()); ?></h1>

        <?php echo ltrim(ob_get_clean()); ?>
        <?php ob_start(); ?><div class="text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70" data-flux-subheading>
    <?php ob_start(); ?>
            <?php echo e(__('Pas de accountgegevens en rechten van ')); ?>

            <span class="font-medium text-zinc-900 dark:text-white"><?php echo e($user->name); ?></span>
            <?php echo e(__('aan.')); ?>

        <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
    </div>
    <?php ob_start(); ?><div class="border [:where(&amp;)]:bg-white [:where(&amp;)]:border-zinc-200 dark:[:where(&amp;)]:bg-white/10 dark:[:where(&amp;)]:border-white/10 [:where(&amp;)]:p-6 [:where(&amp;)]:rounded-xl [--flux-bleed:1.5rem]" data-flux-card>
    <?php ob_start(); ?>
        <form wire:submit="save" class="space-y-6">
            <div class="space-y-4">
                <?php if (!function_exists('_205395226ef5a10927c9e81d13a34aec')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/input/index.blade.php', $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'); require $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'; } ?>
<?php $__blaze->pushData(['wire:model' => 'firstname','label' => __('Voornaam'),'placeholder' => e(__('Achternaam')),'required' => true]); ?>
<?php _205395226ef5a10927c9e81d13a34aec($__blaze, ['wire:model' => 'firstname','label' => __('Voornaam'),'placeholder' => e(__('Achternaam')),'required' => true], [], ['label', 'required'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
                <?php if (!function_exists('_205395226ef5a10927c9e81d13a34aec')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/input/index.blade.php', $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'); require $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'; } ?>
<?php $__blaze->pushData(['wire:model' => 'lastname','label' => __('achternaam'),'placeholder' => e(__('Voornaam')),'required' => true]); ?>
<?php _205395226ef5a10927c9e81d13a34aec($__blaze, ['wire:model' => 'lastname','label' => __('achternaam'),'placeholder' => e(__('Voornaam')),'required' => true], [], ['label', 'required'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
                <?php if (!function_exists('_205395226ef5a10927c9e81d13a34aec')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/input/index.blade.php', $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'); require $__blaze->compiledPath.'/205395226ef5a10927c9e81d13a34aec.php'; } ?>
<?php $__blaze->pushData(['wire:model' => 'email','type' => 'email','label' => __('E-mailadres'),'placeholder' => e(__('naam@voorbeeld.nl')),'required' => true]); ?>
<?php _205395226ef5a10927c9e81d13a34aec($__blaze, ['wire:model' => 'email','type' => 'email','label' => __('E-mailadres'),'placeholder' => e(__('naam@voorbeeld.nl')),'required' => true], [], ['label', 'required'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
                <?php if (!function_exists('_7a7ae1bafbfd4c2befe64162cc1aedb4')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/select/index.blade.php', $__blaze->compiledPath.'/7a7ae1bafbfd4c2befe64162cc1aedb4.php'); require $__blaze->compiledPath.'/7a7ae1bafbfd4c2befe64162cc1aedb4.php'; } ?>
<?php if (isset($__slots7a7ae1bafbfd4c2befe64162cc1aedb4)) { $__slotsStack7a7ae1bafbfd4c2befe64162cc1aedb4[] = $__slots7a7ae1bafbfd4c2befe64162cc1aedb4; } ?>
<?php if (isset($__attrs7a7ae1bafbfd4c2befe64162cc1aedb4)) { $__attrsStack7a7ae1bafbfd4c2befe64162cc1aedb4[] = $__attrs7a7ae1bafbfd4c2befe64162cc1aedb4; } ?>
<?php $__attrs7a7ae1bafbfd4c2befe64162cc1aedb4 = ['wire:model' => 'role_id','label' => __('Rol')]; ?>
<?php $__slots7a7ae1bafbfd4c2befe64162cc1aedb4 = []; ?>
<?php $__blaze->pushData($__attrs7a7ae1bafbfd4c2befe64162cc1aedb4); ?>
<?php ob_start(); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php ob_start(); ?><option
    
     value="<?php echo e($role->id); ?>"      <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = ''.e($role->id).''; ?>wire:key="<?php echo e($role->id); ?>" ><?php ob_start(); ?>
                            <?php echo e(ucfirst($role->name)); ?>

                        <?php echo trim(ob_get_clean()); ?></option><?php echo ltrim(ob_get_clean()); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php $__slots7a7ae1bafbfd4c2befe64162cc1aedb4['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots7a7ae1bafbfd4c2befe64162cc1aedb4); ?>
<?php _7a7ae1bafbfd4c2befe64162cc1aedb4($__blaze, $__attrs7a7ae1bafbfd4c2befe64162cc1aedb4, $__slots7a7ae1bafbfd4c2befe64162cc1aedb4, ['label'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack7a7ae1bafbfd4c2befe64162cc1aedb4)) { $__slots7a7ae1bafbfd4c2befe64162cc1aedb4 = array_pop($__slotsStack7a7ae1bafbfd4c2befe64162cc1aedb4); } ?>
<?php if (! empty($__attrsStack7a7ae1bafbfd4c2befe64162cc1aedb4)) { $__attrs7a7ae1bafbfd4c2befe64162cc1aedb4 = array_pop($__attrsStack7a7ae1bafbfd4c2befe64162cc1aedb4); } ?>
<?php $__blaze->popData(); ?>
            </div>
            <div class="flex items-center justify-end gap-3">
                <?php ob_start(); ?><a href="<?php echo e(route('users')); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-10 text-sm rounded-lg gap-2 ps-4 pe-4 inline-flex  bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-800 dark:text-white">
        <?php ob_start(); ?>
                    <?php echo e(__('Annuleren')); ?>

                <?php echo trim(ob_get_clean()); ?>

    </a>
<?php echo ltrim(ob_get_clean()); ?>
                <?php ob_start(); ?><button type="submit" class="relative items-center font-medium justify-center whitespace-nowrap disabled:opacity-50 dark:disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none disabled:shadow-none justify-center h-10 text-sm rounded-lg gap-2 ps-4 pe-4 inline-flex  bg-[var(--color-accent)] hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)] text-[var(--color-accent-foreground)] border border-black/10 dark:border-0 shadow-[inset_0px_1px_--theme(--color-white/.2)] [[data-flux-button-group]_&amp;]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-[1px] dark:[:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[1px]! [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[color-mix(in_srgb,var(--color-accent-foreground),transparent_85%)] *:transition-opacity [&amp;[disabled]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[disabled]&gt;[data-flux-loading-indicator]]:opacity-100 [&amp;[disabled]]:pointer-events-none" data-flux-button="data-flux-button" data-flux-group-target="data-flux-group-target">
        <div class="absolute inset-0 flex items-center justify-center opacity-0" data-flux-loading-indicator>
                <svg class="shrink-0 [:where(&amp;)]:size-4 animate-spin" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" data-slot="icon">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
</svg>
                    </div>
        
        
                    
            
            <span><?php ob_start(); ?>
                    <?php echo e(__('Wijzigingen opslaan')); ?>

                <?php echo trim(ob_get_clean()); ?></span>
    </button>
<?php echo ltrim(ob_get_clean()); ?>
            </div>
        </form>
    <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
</section>
<?php /**PATH C:\wamp64\www\ecommerce\resources\views\pages\admin\users\⚡edit.blade.php ENDPATH**/ ?>