<?php
if (!function_exists('_73c4f8ef330657f289659c660f32895f')):
function _73c4f8ef330657f289659c660f32895f($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
$__defaults = [
    'variant' => null,
    'size' => null,
    'name' => null,
];
$variant ??= $attributes['variant'] ?? $__defaults['variant']; unset($attributes['variant']);
$size ??= $attributes['size'] ?? $__defaults['size']; unset($attributes['size']);
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
unset($__defaults);
?>

<?php
// We only want to show the name attribute on the radio if it has been set
// manually, but not if it has been set from the wire:model attribute...
$showName = isset($name);

if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$classes = Flux::classes()
    ->add('flex flex-wrap gap-2')
    ;
?>

<?php if (!function_exists('_918871299cb3231338d8a1cceceada15')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/with-field.blade.php', $__blaze->compiledPath.'/918871299cb3231338d8a1cceceada15.php'); require $__blaze->compiledPath.'/918871299cb3231338d8a1cceceada15.php'; } ?>
<?php if (isset($__slots918871299cb3231338d8a1cceceada15)) { $__slotsStack918871299cb3231338d8a1cceceada15[] = $__slots918871299cb3231338d8a1cceceada15; } ?>
<?php if (isset($__attrs918871299cb3231338d8a1cceceada15)) { $__attrsStack918871299cb3231338d8a1cceceada15[] = $__attrs918871299cb3231338d8a1cceceada15; } ?>
<?php $__attrs918871299cb3231338d8a1cceceada15 = ['attributes' => $attributes]; ?>
<?php $__slots918871299cb3231338d8a1cceceada15 = []; ?>
<?php $__blaze->pushData($__attrs918871299cb3231338d8a1cceceada15); ?>
<?php ob_start(); ?>
    <ui-radio-group <?php echo e($attributes->class($classes)); ?> <?php if($showName): ?> name="<?php echo e($name); ?>" <?php endif; ?> data-flux-radio-group-buttons>
        <?php echo e($slot); ?>

    </ui-radio-group>
<?php $__slots918871299cb3231338d8a1cceceada15['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots918871299cb3231338d8a1cceceada15); ?>
<?php _918871299cb3231338d8a1cceceada15($__blaze, $__attrs918871299cb3231338d8a1cceceada15, $__slots918871299cb3231338d8a1cceceada15, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack918871299cb3231338d8a1cceceada15)) { $__slots918871299cb3231338d8a1cceceada15 = array_pop($__slotsStack918871299cb3231338d8a1cceceada15); } ?>
<?php if (! empty($__attrsStack918871299cb3231338d8a1cceceada15)) { $__attrs918871299cb3231338d8a1cceceada15 = array_pop($__attrsStack918871299cb3231338d8a1cceceada15); } ?>
<?php $__blaze->popData(); ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\radio\group\variants\buttons.blade.php ENDPATH**/ ?>