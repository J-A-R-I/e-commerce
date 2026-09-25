<?php
if (!function_exists('__864530665760ff6cccd8cda230119a7b')):
function __864530665760ff6cccd8cda230119a7b($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'length' => null,
    'private' => false,
];
$length ??= $attributes['length'] ?? $__defaults['length']; unset($attributes['length']);
$private ??= $attributes['private'] ?? $__defaults['private']; unset($attributes['private']);
unset($__defaults);
?>

<?php
    $classes = Flux::classes()
        ->add('flex items-center gap-2 isolate w-fit')
        ->add('[&_[data-flux-input-group]]:w-auto')
?>

<?php if (!function_exists('__918871299cb3231338d8a1cceceada15')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/with-field.blade.php', $__blaze->compiledPath.'/918871299cb3231338d8a1cceceada15.php'); require $__blaze->compiledPath.'/918871299cb3231338d8a1cceceada15.php'; } ?>
<?php if (isset($__slots918871299cb3231338d8a1cceceada15)) { $__slotsStack918871299cb3231338d8a1cceceada15[] = $__slots918871299cb3231338d8a1cceceada15; } ?>
<?php if (isset($__attrs918871299cb3231338d8a1cceceada15)) { $__attrsStack918871299cb3231338d8a1cceceada15[] = $__attrs918871299cb3231338d8a1cceceada15; } ?>
<?php $__attrs918871299cb3231338d8a1cceceada15 = ['attributes' => $attributes]; ?>
<?php $__slots918871299cb3231338d8a1cceceada15 = []; ?>
<?php $__blaze->pushData($__attrs918871299cb3231338d8a1cceceada15); ?>
<?php ob_start(); ?>
    <ui-otp
        <?php echo e($attributes->class($classes)); ?>

        data-flux-otp
        data-flux-control
        role="group"
        data-flux-input-aria-label="<?php echo e(__('Character {current} of {total}')); ?>"
    >
        <?php if($slot->isEmpty() && $length): ?>
            <?php for($i = 0; $i < $length; $i++): ?>
                <?php if (!function_exists('__7b527d9597a479802bdcf423de1927a3')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/otp/input.blade.php', $__blaze->compiledPath.'/7b527d9597a479802bdcf423de1927a3.php'); require $__blaze->compiledPath.'/7b527d9597a479802bdcf423de1927a3.php'; } ?>
<?php $__blaze->pushData([]); ?>
<?php __7b527d9597a479802bdcf423de1927a3($__blaze, [], [], [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
            <?php endfor; ?>
        <?php else: ?>
            <?php echo e($slot); ?>

        <?php endif; ?>
    </ui-otp>
<?php $__slots918871299cb3231338d8a1cceceada15['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots918871299cb3231338d8a1cceceada15); ?>
<?php __918871299cb3231338d8a1cceceada15($__blaze, $__attrs918871299cb3231338d8a1cceceada15, $__slots918871299cb3231338d8a1cceceada15, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack918871299cb3231338d8a1cceceada15)) { $__slots918871299cb3231338d8a1cceceada15 = array_pop($__slotsStack918871299cb3231338d8a1cceceada15); } ?>
<?php if (! empty($__attrsStack918871299cb3231338d8a1cceceada15)) { $__attrs918871299cb3231338d8a1cceceada15 = array_pop($__attrsStack918871299cb3231338d8a1cceceada15); } ?>
<?php $__blaze->popData(); ?><?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/otp/index.blade.php ENDPATH**/ ?>