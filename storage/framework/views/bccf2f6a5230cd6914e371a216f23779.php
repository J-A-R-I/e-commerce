<?php
if (!function_exists('_bccf2f6a5230cd6914e371a216f23779')):
function _bccf2f6a5230cd6914e371a216f23779($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;

if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php if (!function_exists('_1fc31eed1f79ecd339606d69cc901d11')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/checkbox/index.blade.php', $__blaze->compiledPath.'/1fc31eed1f79ecd339606d69cc901d11.php'); require $__blaze->compiledPath.'/1fc31eed1f79ecd339606d69cc901d11.php'; } ?>
<?php $__blaze->pushData(['all' => true,'attributes' => $attributes]); ?>
<?php _1fc31eed1f79ecd339606d69cc901d11($__blaze, ['all' => true,'attributes' => $attributes], [], ['all', 'attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\checkbox\all.blade.php ENDPATH**/ ?>