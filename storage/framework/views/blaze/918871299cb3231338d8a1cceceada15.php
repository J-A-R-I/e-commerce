<?php
if (!function_exists('__918871299cb3231338d8a1cceceada15')):
function __918871299cb3231338d8a1cceceada15($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;
$__slots['slot'] ??= new \Illuminate\View\ComponentSlot('');
if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php
extract(Flux::forwardedAttributes($attributes, [
    'name',
    'descriptionTrailing',
    'description',
    'label',
    'badge',
]));
?>

<?php $descriptionTrailing = $descriptionTrailing ??= $attributes->pluck('description:trailing'); ?>

<?php
$__defaults = [
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'descriptionTrailing' => null,
    'description' => null,
    'label' => null,
    'badge' => null,
];
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
$descriptionTrailing ??= $attributes['description-trailing'] ?? $attributes['descriptionTrailing'] ?? $__defaults['descriptionTrailing']; unset($attributes['descriptionTrailing'], $attributes['description-trailing']);
$description ??= $attributes['description'] ?? $__defaults['description']; unset($attributes['description']);
$label ??= $attributes['label'] ?? $__defaults['label']; unset($attributes['label']);
$badge ??= $attributes['badge'] ?? $__defaults['badge']; unset($attributes['badge']);
unset($__defaults);
?>

<?php if (isset($label) || isset($description) || isset($descriptionTrailing)): ?>
    <?php

        $fieldAttributes = Flux::attributesAfter('field:', $attributes, []);
        $labelAttributes = Flux::attributesAfter('label:', $attributes, ['badge' => $badge]);
        $descriptionAttributes = Flux::attributesAfter('description:', $attributes, []);
        $errorAttributes = Flux::attributesAfter('error:', $attributes, ['name' => $name]);
    ?>
    <?php if (!function_exists('__77540b1a41a6d93491f1b8fc27b6a396')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/field.blade.php', $__blaze->compiledPath.'/77540b1a41a6d93491f1b8fc27b6a396.php'); require $__blaze->compiledPath.'/77540b1a41a6d93491f1b8fc27b6a396.php'; } ?>
<?php if (isset($__slots77540b1a41a6d93491f1b8fc27b6a396)) { $__slotsStack77540b1a41a6d93491f1b8fc27b6a396[] = $__slots77540b1a41a6d93491f1b8fc27b6a396; } ?>
<?php if (isset($__attrs77540b1a41a6d93491f1b8fc27b6a396)) { $__attrsStack77540b1a41a6d93491f1b8fc27b6a396[] = $__attrs77540b1a41a6d93491f1b8fc27b6a396; } ?>
<?php $__attrs77540b1a41a6d93491f1b8fc27b6a396 = ['attributes' => $fieldAttributes]; ?>
<?php $__slots77540b1a41a6d93491f1b8fc27b6a396 = []; ?>
<?php $__blaze->pushData($__attrs77540b1a41a6d93491f1b8fc27b6a396); ?>
<?php ob_start(); ?>
        <?php if (isset($label)): ?>
            <?php if (!function_exists('__a5ad589995b60c5eeba85a4a80961014')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/label.blade.php', $__blaze->compiledPath.'/a5ad589995b60c5eeba85a4a80961014.php'); require $__blaze->compiledPath.'/a5ad589995b60c5eeba85a4a80961014.php'; } ?>
<?php if (isset($__slotsa5ad589995b60c5eeba85a4a80961014)) { $__slotsStacka5ad589995b60c5eeba85a4a80961014[] = $__slotsa5ad589995b60c5eeba85a4a80961014; } ?>
<?php if (isset($__attrsa5ad589995b60c5eeba85a4a80961014)) { $__attrsStacka5ad589995b60c5eeba85a4a80961014[] = $__attrsa5ad589995b60c5eeba85a4a80961014; } ?>
<?php $__attrsa5ad589995b60c5eeba85a4a80961014 = ['attributes' => $labelAttributes]; ?>
<?php $__slotsa5ad589995b60c5eeba85a4a80961014 = []; ?>
<?php $__blaze->pushData($__attrsa5ad589995b60c5eeba85a4a80961014); ?>
<?php ob_start(); ?><?php echo e($label); ?><?php $__slotsa5ad589995b60c5eeba85a4a80961014['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slotsa5ad589995b60c5eeba85a4a80961014); ?>
<?php __a5ad589995b60c5eeba85a4a80961014($__blaze, $__attrsa5ad589995b60c5eeba85a4a80961014, $__slotsa5ad589995b60c5eeba85a4a80961014, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStacka5ad589995b60c5eeba85a4a80961014)) { $__slotsa5ad589995b60c5eeba85a4a80961014 = array_pop($__slotsStacka5ad589995b60c5eeba85a4a80961014); } ?>
<?php if (! empty($__attrsStacka5ad589995b60c5eeba85a4a80961014)) { $__attrsa5ad589995b60c5eeba85a4a80961014 = array_pop($__attrsStacka5ad589995b60c5eeba85a4a80961014); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>

        <?php if (isset($description)): ?>
            <?php if (!function_exists('__275d3c1570528d649c7bf18e004df70f')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/description.blade.php', $__blaze->compiledPath.'/275d3c1570528d649c7bf18e004df70f.php'); require $__blaze->compiledPath.'/275d3c1570528d649c7bf18e004df70f.php'; } ?>
<?php if (isset($__slots275d3c1570528d649c7bf18e004df70f)) { $__slotsStack275d3c1570528d649c7bf18e004df70f[] = $__slots275d3c1570528d649c7bf18e004df70f; } ?>
<?php if (isset($__attrs275d3c1570528d649c7bf18e004df70f)) { $__attrsStack275d3c1570528d649c7bf18e004df70f[] = $__attrs275d3c1570528d649c7bf18e004df70f; } ?>
<?php $__attrs275d3c1570528d649c7bf18e004df70f = ['attributes' => $descriptionAttributes]; ?>
<?php $__slots275d3c1570528d649c7bf18e004df70f = []; ?>
<?php $__blaze->pushData($__attrs275d3c1570528d649c7bf18e004df70f); ?>
<?php ob_start(); ?><?php echo e($description); ?><?php $__slots275d3c1570528d649c7bf18e004df70f['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots275d3c1570528d649c7bf18e004df70f); ?>
<?php __275d3c1570528d649c7bf18e004df70f($__blaze, $__attrs275d3c1570528d649c7bf18e004df70f, $__slots275d3c1570528d649c7bf18e004df70f, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack275d3c1570528d649c7bf18e004df70f)) { $__slots275d3c1570528d649c7bf18e004df70f = array_pop($__slotsStack275d3c1570528d649c7bf18e004df70f); } ?>
<?php if (! empty($__attrsStack275d3c1570528d649c7bf18e004df70f)) { $__attrs275d3c1570528d649c7bf18e004df70f = array_pop($__attrsStack275d3c1570528d649c7bf18e004df70f); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>

        <?php echo e($slot); ?>


        
        [STARTCOMPILEDUNBLAZE:P8n7DFKEnO]<?php \Livewire\Blaze\Unblaze::storeScope("P8n7DFKEnO", scope: ['attributes' => $errorAttributes->getAttributes()]) ?><?php \Livewire\Blaze\Unblaze::storeReplacement("P8n7DFKEnO", "CiAgICAgICAgPGZsdXg6ZXJyb3IgOmF0dHJpYnV0ZXM9Im5ldyBcSWxsdW1pbmF0ZVxWaWV3XENvbXBvbmVudEF0dHJpYnV0ZUJhZygkc2NvcGVbJ2F0dHJpYnV0ZXMnXSkiIC8+CiAgICAgICAg") ?>[ENDCOMPILEDUNBLAZE:P8n7DFKEnO]

        <?php if (isset($descriptionTrailing)): ?>
            <?php if (!function_exists('__275d3c1570528d649c7bf18e004df70f')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/description.blade.php', $__blaze->compiledPath.'/275d3c1570528d649c7bf18e004df70f.php'); require $__blaze->compiledPath.'/275d3c1570528d649c7bf18e004df70f.php'; } ?>
<?php if (isset($__slots275d3c1570528d649c7bf18e004df70f)) { $__slotsStack275d3c1570528d649c7bf18e004df70f[] = $__slots275d3c1570528d649c7bf18e004df70f; } ?>
<?php if (isset($__attrs275d3c1570528d649c7bf18e004df70f)) { $__attrsStack275d3c1570528d649c7bf18e004df70f[] = $__attrs275d3c1570528d649c7bf18e004df70f; } ?>
<?php $__attrs275d3c1570528d649c7bf18e004df70f = ['attributes' => $descriptionAttributes]; ?>
<?php $__slots275d3c1570528d649c7bf18e004df70f = []; ?>
<?php $__blaze->pushData($__attrs275d3c1570528d649c7bf18e004df70f); ?>
<?php ob_start(); ?><?php echo e($descriptionTrailing); ?><?php $__slots275d3c1570528d649c7bf18e004df70f['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots275d3c1570528d649c7bf18e004df70f); ?>
<?php __275d3c1570528d649c7bf18e004df70f($__blaze, $__attrs275d3c1570528d649c7bf18e004df70f, $__slots275d3c1570528d649c7bf18e004df70f, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack275d3c1570528d649c7bf18e004df70f)) { $__slots275d3c1570528d649c7bf18e004df70f = array_pop($__slotsStack275d3c1570528d649c7bf18e004df70f); } ?>
<?php if (! empty($__attrsStack275d3c1570528d649c7bf18e004df70f)) { $__attrs275d3c1570528d649c7bf18e004df70f = array_pop($__attrsStack275d3c1570528d649c7bf18e004df70f); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>
    <?php $__slots77540b1a41a6d93491f1b8fc27b6a396['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots77540b1a41a6d93491f1b8fc27b6a396); ?>
<?php __77540b1a41a6d93491f1b8fc27b6a396($__blaze, $__attrs77540b1a41a6d93491f1b8fc27b6a396, $__slots77540b1a41a6d93491f1b8fc27b6a396, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack77540b1a41a6d93491f1b8fc27b6a396)) { $__slots77540b1a41a6d93491f1b8fc27b6a396 = array_pop($__slotsStack77540b1a41a6d93491f1b8fc27b6a396); } ?>
<?php if (! empty($__attrsStack77540b1a41a6d93491f1b8fc27b6a396)) { $__attrs77540b1a41a6d93491f1b8fc27b6a396 = array_pop($__attrsStack77540b1a41a6d93491f1b8fc27b6a396); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php echo e($slot); ?>

<?php endif; ?>
<?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/with-field.blade.php ENDPATH**/ ?>