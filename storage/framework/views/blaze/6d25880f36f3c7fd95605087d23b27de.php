<?php
if (!function_exists('__6d25880f36f3c7fd95605087d23b27de')):
function __6d25880f36f3c7fd95605087d23b27de($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'interactive' => null,
    'position' => 'top',
    'align' => 'center',
    'content' => null,
    'kbd' => null,
    'toggleable' => null,
];
$interactive ??= $attributes['interactive'] ?? $__defaults['interactive']; unset($attributes['interactive']);
$position ??= $attributes['position'] ?? $__defaults['position']; unset($attributes['position']);
$align ??= $attributes['align'] ?? $__defaults['align']; unset($attributes['align']);
$content ??= $attributes['content'] ?? $__defaults['content']; unset($attributes['content']);
$kbd ??= $attributes['kbd'] ?? $__defaults['kbd']; unset($attributes['kbd']);
$toggleable ??= $attributes['toggleable'] ?? $__defaults['toggleable']; unset($attributes['toggleable']);
unset($__defaults);
?>

<?php
// Support adding the .self modifier to the wire:model directive...
if (($wireModel = $attributes->wire('model')) && $wireModel->directive && ! $wireModel->hasModifier('self')) {
    unset($attributes[$wireModel->directive]);

    $wireModel->directive .= '.self';

    $attributes = $attributes->merge([$wireModel->directive => $wireModel->value]);
}
?>

<?php if ($toggleable): ?>
    <ui-dropdown position="<?php echo e($position); ?> <?php echo e($align); ?>" <?php echo e($attributes); ?> data-flux-tooltip>
        <?php echo e($slot); ?>


        <?php if ($content !== null): ?>
            <?php if (!function_exists('__c4ac87750c455e0eb7c3dc4aeaa97af9')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/content.blade.php', $__blaze->compiledPath.'/c4ac87750c455e0eb7c3dc4aeaa97af9.php'); require $__blaze->compiledPath.'/c4ac87750c455e0eb7c3dc4aeaa97af9.php'; } ?>
<?php if (isset($__slotsc4ac87750c455e0eb7c3dc4aeaa97af9)) { $__slotsStackc4ac87750c455e0eb7c3dc4aeaa97af9[] = $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9; } ?>
<?php if (isset($__attrsc4ac87750c455e0eb7c3dc4aeaa97af9)) { $__attrsStackc4ac87750c455e0eb7c3dc4aeaa97af9[] = $__attrsc4ac87750c455e0eb7c3dc4aeaa97af9; } ?>
<?php $__attrsc4ac87750c455e0eb7c3dc4aeaa97af9 = ['kbd' => $kbd]; ?>
<?php $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9 = []; ?>
<?php $__blaze->pushData($__attrsc4ac87750c455e0eb7c3dc4aeaa97af9); ?>
<?php ob_start(); ?><?php echo e($content); ?><?php $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slotsc4ac87750c455e0eb7c3dc4aeaa97af9); ?>
<?php __c4ac87750c455e0eb7c3dc4aeaa97af9($__blaze, $__attrsc4ac87750c455e0eb7c3dc4aeaa97af9, $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9, ['kbd'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackc4ac87750c455e0eb7c3dc4aeaa97af9)) { $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9 = array_pop($__slotsStackc4ac87750c455e0eb7c3dc4aeaa97af9); } ?>
<?php if (! empty($__attrsStackc4ac87750c455e0eb7c3dc4aeaa97af9)) { $__attrsc4ac87750c455e0eb7c3dc4aeaa97af9 = array_pop($__attrsStackc4ac87750c455e0eb7c3dc4aeaa97af9); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>
    </ui-dropdown>
<?php else: ?>
    <ui-tooltip position="<?php echo e($position); ?> <?php echo e($align); ?>" <?php echo e($attributes); ?> data-flux-tooltip <?php if($interactive): ?> interactive <?php endif; ?>>
        <?php echo e($slot); ?>


        <?php if ($content !== null): ?>
            <?php if (!function_exists('__c4ac87750c455e0eb7c3dc4aeaa97af9')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/content.blade.php', $__blaze->compiledPath.'/c4ac87750c455e0eb7c3dc4aeaa97af9.php'); require $__blaze->compiledPath.'/c4ac87750c455e0eb7c3dc4aeaa97af9.php'; } ?>
<?php if (isset($__slotsc4ac87750c455e0eb7c3dc4aeaa97af9)) { $__slotsStackc4ac87750c455e0eb7c3dc4aeaa97af9[] = $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9; } ?>
<?php if (isset($__attrsc4ac87750c455e0eb7c3dc4aeaa97af9)) { $__attrsStackc4ac87750c455e0eb7c3dc4aeaa97af9[] = $__attrsc4ac87750c455e0eb7c3dc4aeaa97af9; } ?>
<?php $__attrsc4ac87750c455e0eb7c3dc4aeaa97af9 = ['kbd' => $kbd]; ?>
<?php $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9 = []; ?>
<?php $__blaze->pushData($__attrsc4ac87750c455e0eb7c3dc4aeaa97af9); ?>
<?php ob_start(); ?><?php echo e($content); ?><?php $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slotsc4ac87750c455e0eb7c3dc4aeaa97af9); ?>
<?php __c4ac87750c455e0eb7c3dc4aeaa97af9($__blaze, $__attrsc4ac87750c455e0eb7c3dc4aeaa97af9, $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9, ['kbd'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackc4ac87750c455e0eb7c3dc4aeaa97af9)) { $__slotsc4ac87750c455e0eb7c3dc4aeaa97af9 = array_pop($__slotsStackc4ac87750c455e0eb7c3dc4aeaa97af9); } ?>
<?php if (! empty($__attrsStackc4ac87750c455e0eb7c3dc4aeaa97af9)) { $__attrsc4ac87750c455e0eb7c3dc4aeaa97af9 = array_pop($__attrsStackc4ac87750c455e0eb7c3dc4aeaa97af9); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>
    </ui-tooltip>
<?php endif; ?>
<?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/index.blade.php ENDPATH**/ ?>