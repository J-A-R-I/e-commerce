<?php
if (!function_exists('_73f52897762b17ecacc38d7678f7a1c9')):
function _73f52897762b17ecacc38d7678f7a1c9($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;

if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php
$__defaults = [
    'iconVariant' => 'mini',
    'size' => null,
];
$iconVariant ??= $attributes['icon-variant'] ?? $attributes['iconVariant'] ?? $__defaults['iconVariant']; unset($attributes['iconVariant'], $attributes['icon-variant']);
$size ??= $attributes['size'] ?? $__defaults['size']; unset($attributes['size']);
unset($__defaults);
?>

<?php
$attributes = $attributes->merge([
    'variant' => 'subtle',
    'class' => '-me-1 [[data-flux-input]:has(input:placeholder-shown)_&]:hidden [[data-flux-input]:has(input[disabled])_&]:hidden',
    'square' => true,
    'size' => null,
]);
?>

<?php if (!function_exists('_fb729f1fbb168c8ea37cb7f1e91b394a')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php', $__blaze->compiledPath.'/fb729f1fbb168c8ea37cb7f1e91b394a.php'); require $__blaze->compiledPath.'/fb729f1fbb168c8ea37cb7f1e91b394a.php'; } ?>
<?php if (isset($__slotsfb729f1fbb168c8ea37cb7f1e91b394a)) { $__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a[] = $__slotsfb729f1fbb168c8ea37cb7f1e91b394a; } ?>
<?php if (isset($__attrsfb729f1fbb168c8ea37cb7f1e91b394a)) { $__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a[] = $__attrsfb729f1fbb168c8ea37cb7f1e91b394a; } ?>
<?php $__attrsfb729f1fbb168c8ea37cb7f1e91b394a = ['attributes' => $attributes,'size' => $size === 'sm' || $size === 'xs' ? 'xs' : 'sm','xData' => 'fluxInputClearable','xOn:click' => 'clear()','tabindex' => '-1','ariaLabel' => e(__('Clear input')),'dataFluxClearButton' => true]; ?>
<?php $__slotsfb729f1fbb168c8ea37cb7f1e91b394a = []; ?>
<?php $__blaze->pushData($__attrsfb729f1fbb168c8ea37cb7f1e91b394a); ?>
<?php ob_start(); ?>
    <?php if (!function_exists('_1f5a4149a23933a00be5b69f6c08efe0')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/x-mark.blade.php', $__blaze->compiledPath.'/1f5a4149a23933a00be5b69f6c08efe0.php'); require $__blaze->compiledPath.'/1f5a4149a23933a00be5b69f6c08efe0.php'; } ?>
<?php $__blaze->pushData(['variant' => $iconVariant]); ?>
<?php _1f5a4149a23933a00be5b69f6c08efe0($__blaze, ['variant' => $iconVariant], [], ['variant'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
<?php $__slotsfb729f1fbb168c8ea37cb7f1e91b394a['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsfb729f1fbb168c8ea37cb7f1e91b394a); ?>
<?php _fb729f1fbb168c8ea37cb7f1e91b394a($__blaze, $__attrsfb729f1fbb168c8ea37cb7f1e91b394a, $__slotsfb729f1fbb168c8ea37cb7f1e91b394a, ['attributes', 'size', 'dataFluxClearButton'], ['xData' => 'x-data', 'xOn:click' => 'x-on:click', 'ariaLabel' => 'aria-label', 'dataFluxClearButton' => 'data-flux-clear-button'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a)) { $__slotsfb729f1fbb168c8ea37cb7f1e91b394a = array_pop($__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a); } ?>
<?php if (! empty($__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a)) { $__attrsfb729f1fbb168c8ea37cb7f1e91b394a = array_pop($__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a); } ?>
<?php $__blaze->popData(); ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\input\clearable.blade.php ENDPATH**/ ?>