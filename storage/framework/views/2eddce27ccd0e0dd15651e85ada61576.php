<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'sidebar' => false,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'sidebar' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sidebar): ?>
    <?php if (!function_exists('_1099cba05aa706dacbf566e275ce6655')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/brand.blade.php', $__blaze->compiledPath.'/1099cba05aa706dacbf566e275ce6655.php'); require $__blaze->compiledPath.'/1099cba05aa706dacbf566e275ce6655.php'; } ?>
<?php if (isset($__slots1099cba05aa706dacbf566e275ce6655)) { $__slotsStack1099cba05aa706dacbf566e275ce6655[] = $__slots1099cba05aa706dacbf566e275ce6655; } ?>
<?php if (isset($__attrs1099cba05aa706dacbf566e275ce6655)) { $__attrsStack1099cba05aa706dacbf566e275ce6655[] = $__attrs1099cba05aa706dacbf566e275ce6655; } ?>
<?php $__attrs1099cba05aa706dacbf566e275ce6655 = ['name' => config('app.name', 'Laravel'),'attributes' => $attributes]; ?>
<?php $__slots1099cba05aa706dacbf566e275ce6655 = []; ?>
<?php $__blaze->pushData($__attrs1099cba05aa706dacbf566e275ce6655); ?>
<?php ob_start(); ?>
         <?php ob_start(); ?>
            <?php if (isset($component)) { $__componentOriginal159d6670770cb479b1921cea6416c26c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal159d6670770cb479b1921cea6416c26c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-logo-icon','data' => ['class' => 'size-5 fill-current text-white dark:text-black']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-logo-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 fill-current text-white dark:text-black']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $attributes = $__attributesOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__attributesOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $component = $__componentOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__componentOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
        <?php $__slots1099cba05aa706dacbf566e275ce6655['logo'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), ['class' => 'flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground']); ?>
    <?php $__slots1099cba05aa706dacbf566e275ce6655['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots1099cba05aa706dacbf566e275ce6655); ?>
<?php _1099cba05aa706dacbf566e275ce6655($__blaze, $__attrs1099cba05aa706dacbf566e275ce6655, $__slots1099cba05aa706dacbf566e275ce6655, ['name', 'attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack1099cba05aa706dacbf566e275ce6655)) { $__slots1099cba05aa706dacbf566e275ce6655 = array_pop($__slotsStack1099cba05aa706dacbf566e275ce6655); } ?>
<?php if (! empty($__attrsStack1099cba05aa706dacbf566e275ce6655)) { $__attrs1099cba05aa706dacbf566e275ce6655 = array_pop($__attrsStack1099cba05aa706dacbf566e275ce6655); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php if (!function_exists('_a76af6f0bf2bddb029c72098b5752922')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/brand.blade.php', $__blaze->compiledPath.'/a76af6f0bf2bddb029c72098b5752922.php'); require $__blaze->compiledPath.'/a76af6f0bf2bddb029c72098b5752922.php'; } ?>
<?php if (isset($__slotsa76af6f0bf2bddb029c72098b5752922)) { $__slotsStacka76af6f0bf2bddb029c72098b5752922[] = $__slotsa76af6f0bf2bddb029c72098b5752922; } ?>
<?php if (isset($__attrsa76af6f0bf2bddb029c72098b5752922)) { $__attrsStacka76af6f0bf2bddb029c72098b5752922[] = $__attrsa76af6f0bf2bddb029c72098b5752922; } ?>
<?php $__attrsa76af6f0bf2bddb029c72098b5752922 = ['name' => config('app.name', 'Laravel'),'attributes' => $attributes]; ?>
<?php $__slotsa76af6f0bf2bddb029c72098b5752922 = []; ?>
<?php $__blaze->pushData($__attrsa76af6f0bf2bddb029c72098b5752922); ?>
<?php ob_start(); ?>
         <?php ob_start(); ?>
            <?php if (isset($component)) { $__componentOriginal159d6670770cb479b1921cea6416c26c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal159d6670770cb479b1921cea6416c26c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-logo-icon','data' => ['class' => 'size-5 fill-current text-white dark:text-black']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-logo-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 fill-current text-white dark:text-black']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $attributes = $__attributesOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__attributesOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $component = $__componentOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__componentOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
        <?php $__slotsa76af6f0bf2bddb029c72098b5752922['logo'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), ['class' => 'flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground']); ?>
    <?php $__slotsa76af6f0bf2bddb029c72098b5752922['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsa76af6f0bf2bddb029c72098b5752922); ?>
<?php _a76af6f0bf2bddb029c72098b5752922($__blaze, $__attrsa76af6f0bf2bddb029c72098b5752922, $__slotsa76af6f0bf2bddb029c72098b5752922, ['name', 'attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStacka76af6f0bf2bddb029c72098b5752922)) { $__slotsa76af6f0bf2bddb029c72098b5752922 = array_pop($__slotsStacka76af6f0bf2bddb029c72098b5752922); } ?>
<?php if (! empty($__attrsStacka76af6f0bf2bddb029c72098b5752922)) { $__attrsa76af6f0bf2bddb029c72098b5752922 = array_pop($__attrsStacka76af6f0bf2bddb029c72098b5752922); } ?>
<?php $__blaze->popData(); ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\wamp64\www\ecommerce\resources\views/components/app-logo.blade.php ENDPATH**/ ?>