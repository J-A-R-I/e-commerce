<?php
if (!function_exists('_ed51986c447f9ef00cafc3a18d70236d')):
function _ed51986c447f9ef00cafc3a18d70236d($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
$classes = Flux::classes()
    ->add('*:data-flux-field:mb-3')
    ->add('[&>[data-flux-field]:has(>[data-flux-description])]:mb-4')
    ->add('[&>[data-flux-field]:last-child]:mb-0!')
    ;

// Support adding the .self modifier to the wire:model directive...
if (($wireModel = $attributes->wire('model')) && $wireModel->directive && ! $wireModel->hasModifier('self')) {
    unset($attributes[$wireModel->directive]);

    $wireModel->directive .= '.self';

    $attributes = $attributes->merge([$wireModel->directive => $wireModel->value]);
}
?>

<?php if (!function_exists('_918871299cb3231338d8a1cceceada15')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/with-field.blade.php', $__blaze->compiledPath.'/918871299cb3231338d8a1cceceada15.php'); require $__blaze->compiledPath.'/918871299cb3231338d8a1cceceada15.php'; } ?>
<?php if (isset($__slots918871299cb3231338d8a1cceceada15)) { $__slotsStack918871299cb3231338d8a1cceceada15[] = $__slots918871299cb3231338d8a1cceceada15; } ?>
<?php if (isset($__attrs918871299cb3231338d8a1cceceada15)) { $__attrsStack918871299cb3231338d8a1cceceada15[] = $__attrs918871299cb3231338d8a1cceceada15; } ?>
<?php $__attrs918871299cb3231338d8a1cceceada15 = ['attributes' => $attributes]; ?>
<?php $__slots918871299cb3231338d8a1cceceada15 = []; ?>
<?php $__blaze->pushData($__attrs918871299cb3231338d8a1cceceada15); ?>
<?php ob_start(); ?>
    <ui-checkbox-group <?php echo e($attributes->class($classes)); ?> data-flux-checkbox-group>
        <?php echo e($slot); ?>

    </ui-checkbox-group>
<?php $__slots918871299cb3231338d8a1cceceada15['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots918871299cb3231338d8a1cceceada15); ?>
<?php _918871299cb3231338d8a1cceceada15($__blaze, $__attrs918871299cb3231338d8a1cceceada15, $__slots918871299cb3231338d8a1cceceada15, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack918871299cb3231338d8a1cceceada15)) { $__slots918871299cb3231338d8a1cceceada15 = array_pop($__slotsStack918871299cb3231338d8a1cceceada15); } ?>
<?php if (! empty($__attrsStack918871299cb3231338d8a1cceceada15)) { $__attrs918871299cb3231338d8a1cceceada15 = array_pop($__attrsStack918871299cb3231338d8a1cceceada15); } ?>
<?php $__blaze->popData(); ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\checkbox\group\variants\default.blade.php ENDPATH**/ ?>