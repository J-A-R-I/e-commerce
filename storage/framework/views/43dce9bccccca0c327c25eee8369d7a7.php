<?php # [BlazeFolded]:{flux::main}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/main.blade.php}:{1789445708} ?>
<?php if (isset($component)) { $__componentOriginal4aac0cbe64f2c897d078c2a5047bbebd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4aac0cbe64f2c897d078c2a5047bbebd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'f4ac99e09542ff494432bc959d4fee61::frontend.header','data' => ['title' => $title ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts::frontend.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title ?? null)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php ob_start(); ?><div class="[grid-area:main] p-6 lg:p-8 [[data-flux-container]_&amp;]:px-0 mx-auto w-full [:where(&amp;)]:max-w-7xl flex flex-col flex-1 justify-between" data-flux-main>
    <?php ob_start(); ?>
        <?php echo e($slot); ?>

    <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4aac0cbe64f2c897d078c2a5047bbebd)): ?>
<?php $attributes = $__attributesOriginal4aac0cbe64f2c897d078c2a5047bbebd; ?>
<?php unset($__attributesOriginal4aac0cbe64f2c897d078c2a5047bbebd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4aac0cbe64f2c897d078c2a5047bbebd)): ?>
<?php $component = $__componentOriginal4aac0cbe64f2c897d078c2a5047bbebd; ?>
<?php unset($__componentOriginal4aac0cbe64f2c897d078c2a5047bbebd); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\ecommerce\resources\views\layouts\frontend.blade.php ENDPATH**/ ?>