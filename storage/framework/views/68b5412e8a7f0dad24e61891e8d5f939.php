<?php
if (!function_exists('_68b5412e8a7f0dad24e61891e8d5f939')):
function _68b5412e8a7f0dad24e61891e8d5f939($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'name' => null,
    'variant' => null,
];
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
$variant ??= $attributes['variant'] ?? $__defaults['variant']; unset($attributes['variant']);
unset($__defaults);
?>

<?php
// We only want to show the name attribute it has been set manually
// but not if it has been set from the `wire:model` attribute...
$showName = isset($name);
if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$classes = Flux::classes()
    // Adjust spacing between fields...
    ->add('*:data-flux-field:mb-3')
    ->add('[&>[data-flux-field]:has(>[data-flux-description])]:mb-4')
    ->add('[&>[data-flux-field]:last-child]:mb-0!')
    ;
?>

<?php if (!function_exists('_918871299cb3231338d8a1cceceada15')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/with-field.blade.php', $__blaze->compiledPath.'/918871299cb3231338d8a1cceceada15.php'); require $__blaze->compiledPath.'/918871299cb3231338d8a1cceceada15.php'; } ?>
<?php if (isset($__slots918871299cb3231338d8a1cceceada15)) { $__slotsStack918871299cb3231338d8a1cceceada15[] = $__slots918871299cb3231338d8a1cceceada15; } ?>
<?php if (isset($__attrs918871299cb3231338d8a1cceceada15)) { $__attrsStack918871299cb3231338d8a1cceceada15[] = $__attrs918871299cb3231338d8a1cceceada15; } ?>
<?php $__attrs918871299cb3231338d8a1cceceada15 = ['attributes' => $attributes]; ?>
<?php $__slots918871299cb3231338d8a1cceceada15 = []; ?>
<?php $__blaze->pushData($__attrs918871299cb3231338d8a1cceceada15); ?>
<?php ob_start(); ?>
    <ui-radio-group <?php echo e($attributes->class($classes)); ?> <?php if($showName): ?> name="<?php echo e($name); ?>" <?php endif; ?> data-flux-radio-group>
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
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\radio\group\variants\default.blade.php ENDPATH**/ ?>