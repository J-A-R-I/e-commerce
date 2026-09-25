<?php
if (!function_exists('_52ad5832636cbfd19820f3b6b6076a4c')):
function _52ad5832636cbfd19820f3b6b6076a4c($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
$classes = Flux::classes('[grid-area:footer]')
    ->add($attributes->has('container') ? '' : 'p-6 lg:p-8')
    ;
?>

<div <?php echo e($attributes->class($classes)); ?> data-flux-footer>
    <?php if (!function_exists('_c2b03edc738c05adc20513cc8213d380')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/with-container.blade.php', $__blaze->compiledPath.'/c2b03edc738c05adc20513cc8213d380.php'); require $__blaze->compiledPath.'/c2b03edc738c05adc20513cc8213d380.php'; } ?>
<?php if (isset($__slotsc2b03edc738c05adc20513cc8213d380)) { $__slotsStackc2b03edc738c05adc20513cc8213d380[] = $__slotsc2b03edc738c05adc20513cc8213d380; } ?>
<?php if (isset($__attrsc2b03edc738c05adc20513cc8213d380)) { $__attrsStackc2b03edc738c05adc20513cc8213d380[] = $__attrsc2b03edc738c05adc20513cc8213d380; } ?>
<?php $__attrsc2b03edc738c05adc20513cc8213d380 = ['attributes' => $attributes->except('class')->class('p-6 lg:p-8')]; ?>
<?php $__slotsc2b03edc738c05adc20513cc8213d380 = []; ?>
<?php $__blaze->pushData($__attrsc2b03edc738c05adc20513cc8213d380); ?>
<?php ob_start(); ?>
        <?php echo e($slot); ?>

    <?php $__slotsc2b03edc738c05adc20513cc8213d380['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsc2b03edc738c05adc20513cc8213d380); ?>
<?php _c2b03edc738c05adc20513cc8213d380($__blaze, $__attrsc2b03edc738c05adc20513cc8213d380, $__slotsc2b03edc738c05adc20513cc8213d380, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackc2b03edc738c05adc20513cc8213d380)) { $__slotsc2b03edc738c05adc20513cc8213d380 = array_pop($__slotsStackc2b03edc738c05adc20513cc8213d380); } ?>
<?php if (! empty($__attrsStackc2b03edc738c05adc20513cc8213d380)) { $__attrsc2b03edc738c05adc20513cc8213d380 = array_pop($__attrsStackc2b03edc738c05adc20513cc8213d380); } ?>
<?php $__blaze->popData(); ?>
</div>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\footer.blade.php ENDPATH**/ ?>