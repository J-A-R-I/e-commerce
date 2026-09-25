<?php # [BlazeFolded]:{flux::main}:{C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/main.blade.php}:{1789445708} ?>
<?php if (isset($component)) { $__componentOriginalada107b1759097483d287896490b23ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalada107b1759097483d287896490b23ec = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'f4ac99e09542ff494432bc959d4fee61::store.sidebar','data' => ['title' => $title ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts::store.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title ?? null)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php ob_start(); ?><div class="[grid-area:main] p-6 lg:p-8 [[data-flux-container]_&amp;]:px-0" data-flux-main>
    <?php ob_start(); ?>
        <?php echo e($slot); ?>

    <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalada107b1759097483d287896490b23ec)): ?>
<?php $attributes = $__attributesOriginalada107b1759097483d287896490b23ec; ?>
<?php unset($__attributesOriginalada107b1759097483d287896490b23ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalada107b1759097483d287896490b23ec)): ?>
<?php $component = $__componentOriginalada107b1759097483d287896490b23ec; ?>
<?php unset($__componentOriginalada107b1759097483d287896490b23ec); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\ecommerce\resources\views\layouts\store.blade.php ENDPATH**/ ?>