<?php
if (!function_exists('_d3fc8fc8a9b450146e1f5683c1ae1fcd')):
function _d3fc8fc8a9b450146e1f5683c1ae1fcd($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'tooltipPosition',
    'tooltipKbd',
    'tooltip',
]));
?>

<?php $tooltipPosition = $tooltipPosition ??= $attributes->pluck('tooltip:position'); ?>
<?php $tooltipKbd = $tooltipKbd ??= $attributes->pluck('tooltip:kbd'); ?>
<?php $tooltip = $tooltip ??= $attributes->pluck('tooltip'); ?>

<?php
$__defaults = [
    'tooltipPosition' => 'top',
    'tooltipKbd' => null,
    'tooltip' => null,
];
$tooltipPosition ??= $attributes['tooltip-position'] ?? $attributes['tooltipPosition'] ?? $__defaults['tooltipPosition']; unset($attributes['tooltipPosition'], $attributes['tooltip-position']);
$tooltipKbd ??= $attributes['tooltip-kbd'] ?? $attributes['tooltipKbd'] ?? $__defaults['tooltipKbd']; unset($attributes['tooltipKbd'], $attributes['tooltip-kbd']);
$tooltip ??= $attributes['tooltip'] ?? $__defaults['tooltip']; unset($attributes['tooltip']);
unset($__defaults);
?>

<?php if ($tooltip): ?>
    <?php if (!function_exists('_6d25880f36f3c7fd95605087d23b27de')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/index.blade.php', $__blaze->compiledPath.'/6d25880f36f3c7fd95605087d23b27de.php'); require $__blaze->compiledPath.'/6d25880f36f3c7fd95605087d23b27de.php'; } ?>
<?php if (isset($__slots6d25880f36f3c7fd95605087d23b27de)) { $__slotsStack6d25880f36f3c7fd95605087d23b27de[] = $__slots6d25880f36f3c7fd95605087d23b27de; } ?>
<?php if (isset($__attrs6d25880f36f3c7fd95605087d23b27de)) { $__attrsStack6d25880f36f3c7fd95605087d23b27de[] = $__attrs6d25880f36f3c7fd95605087d23b27de; } ?>
<?php $__attrs6d25880f36f3c7fd95605087d23b27de = ['class' => 'inline-flex','content' => $tooltip,'position' => $tooltipPosition,'kbd' => $tooltipKbd]; ?>
<?php $__slots6d25880f36f3c7fd95605087d23b27de = []; ?>
<?php $__blaze->pushData($__attrs6d25880f36f3c7fd95605087d23b27de); ?>
<?php ob_start(); ?>
        <?php echo e($slot); ?>

    <?php $__slots6d25880f36f3c7fd95605087d23b27de['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6d25880f36f3c7fd95605087d23b27de); ?>
<?php _6d25880f36f3c7fd95605087d23b27de($__blaze, $__attrs6d25880f36f3c7fd95605087d23b27de, $__slots6d25880f36f3c7fd95605087d23b27de, ['content', 'position', 'kbd'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6d25880f36f3c7fd95605087d23b27de)) { $__slots6d25880f36f3c7fd95605087d23b27de = array_pop($__slotsStack6d25880f36f3c7fd95605087d23b27de); } ?>
<?php if (! empty($__attrsStack6d25880f36f3c7fd95605087d23b27de)) { $__attrs6d25880f36f3c7fd95605087d23b27de = array_pop($__attrsStack6d25880f36f3c7fd95605087d23b27de); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php echo e($slot); ?>

<?php endif; ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\with-tooltip.blade.php ENDPATH**/ ?>