<?php
if (!function_exists('_3a0b4ebe658b8b3ffa299b957e97e6b1')):
function _3a0b4ebe658b8b3ffa299b957e97e6b1($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'name' => $attributes->whereStartsWith('wire:model')->first(),
];
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
unset($__defaults);
?>

<?php if (!function_exists('_698f92ab7fca299a1096dc5551fbf9a9')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/with-inline-field.blade.php', $__blaze->compiledPath.'/698f92ab7fca299a1096dc5551fbf9a9.php'); require $__blaze->compiledPath.'/698f92ab7fca299a1096dc5551fbf9a9.php'; } ?>
<?php if (isset($__slots698f92ab7fca299a1096dc5551fbf9a9)) { $__slotsStack698f92ab7fca299a1096dc5551fbf9a9[] = $__slots698f92ab7fca299a1096dc5551fbf9a9; } ?>
<?php if (isset($__attrs698f92ab7fca299a1096dc5551fbf9a9)) { $__attrsStack698f92ab7fca299a1096dc5551fbf9a9[] = $__attrs698f92ab7fca299a1096dc5551fbf9a9; } ?>
<?php $__attrs698f92ab7fca299a1096dc5551fbf9a9 = ['variant' => 'inline','attributes' => $attributes]; ?>
<?php $__slots698f92ab7fca299a1096dc5551fbf9a9 = []; ?>
<?php $__blaze->pushData($__attrs698f92ab7fca299a1096dc5551fbf9a9); ?>
<?php ob_start(); ?>
    
    
    
    <ui-radio <?php echo e($attributes->class('flex size-[1.125rem] rounded-full mt-px outline-offset-2')); ?> data-flux-control data-flux-radio tabindex="-1">
        <?php $blaze_memoized_key = \Livewire\Blaze\Memoizer\Memo::key("flux::radio.indicator", []); ?><?php if ($blaze_memoized_key !== null && \Livewire\Blaze\Memoizer\Memo::has($blaze_memoized_key)) : ?><?php echo \Livewire\Blaze\Memoizer\Memo::get($blaze_memoized_key); ?><?php else : ?><?php ob_start(); ?><?php if (!function_exists('_ab78a7a333cc9b510951370faa2c58e8')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/radio/indicator.blade.php', $__blaze->compiledPath.'/ab78a7a333cc9b510951370faa2c58e8.php'); require $__blaze->compiledPath.'/ab78a7a333cc9b510951370faa2c58e8.php'; } ?>
<?php $__blaze->pushData([]); ?>
<?php _ab78a7a333cc9b510951370faa2c58e8($__blaze, [], [], [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?><?php $blaze_memoized_html = ob_get_clean(); ?><?php if ($blaze_memoized_key !== null) { \Livewire\Blaze\Memoizer\Memo::put($blaze_memoized_key, $blaze_memoized_html); } ?><?php echo $blaze_memoized_html; ?><?php endif; ?>
    </ui-radio>
<?php $__slots698f92ab7fca299a1096dc5551fbf9a9['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots698f92ab7fca299a1096dc5551fbf9a9); ?>
<?php _698f92ab7fca299a1096dc5551fbf9a9($__blaze, $__attrs698f92ab7fca299a1096dc5551fbf9a9, $__slots698f92ab7fca299a1096dc5551fbf9a9, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack698f92ab7fca299a1096dc5551fbf9a9)) { $__slots698f92ab7fca299a1096dc5551fbf9a9 = array_pop($__slotsStack698f92ab7fca299a1096dc5551fbf9a9); } ?>
<?php if (! empty($__attrsStack698f92ab7fca299a1096dc5551fbf9a9)) { $__attrs698f92ab7fca299a1096dc5551fbf9a9 = array_pop($__attrsStack698f92ab7fca299a1096dc5551fbf9a9); } ?>
<?php $__blaze->popData(); ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\radio\variants\default.blade.php ENDPATH**/ ?>