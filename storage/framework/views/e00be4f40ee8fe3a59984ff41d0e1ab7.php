<?php
if (!function_exists('_e00be4f40ee8fe3a59984ff41d0e1ab7')):
function _e00be4f40ee8fe3a59984ff41d0e1ab7($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;
$__slots['slot'] ??= new \Illuminate\View\ComponentSlot('');
if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php $iconTrailing ??= $attributes->pluck('icon:trailing'); ?>
<?php $iconVariant ??= $attributes->pluck('icon:variant'); ?>

<?php
$__defaults = [
    'iconVariant' => 'mini',
    'iconTrailing' => null,
    'variant' => 'default',
    'disabled' => false,
    'indent' => false,
    'suffix' => null,
    'value' => null,
    'icon' => null,
    'kbd' => null,
];
$iconVariant ??= $attributes['icon-variant'] ?? $attributes['iconVariant'] ?? $__defaults['iconVariant']; unset($attributes['iconVariant'], $attributes['icon-variant']);
$iconTrailing ??= $attributes['icon-trailing'] ?? $attributes['iconTrailing'] ?? $__defaults['iconTrailing']; unset($attributes['iconTrailing'], $attributes['icon-trailing']);
$variant ??= $attributes['variant'] ?? $__defaults['variant']; unset($attributes['variant']);
$disabled ??= $attributes['disabled'] ?? $__defaults['disabled']; unset($attributes['disabled']);
$indent ??= $attributes['indent'] ?? $__defaults['indent']; unset($attributes['indent']);
$suffix ??= $attributes['suffix'] ?? $__defaults['suffix']; unset($attributes['suffix']);
$value ??= $attributes['value'] ?? $__defaults['value']; unset($attributes['value']);
$icon ??= $attributes['icon'] ?? $__defaults['icon']; unset($attributes['icon']);
$kbd ??= $attributes['kbd'] ?? $__defaults['kbd']; unset($attributes['kbd']);
unset($__defaults);
?>

<?php
if ($kbd) $suffix = $kbd;

$iconClasses = Flux::classes()
    ->add('me-2')
    // When using the outline icon variant, we need to size it down to match the default icon sizes...
    ->add($iconVariant === 'outline' ? 'size-5' : null)
    ;

$trailingIconClasses = Flux::classes()
    ->add('ms-auto')
    // When using the outline icon variant, we need to size it down to match the default icon sizes...
    ->add($iconVariant === 'outline' ? 'size-5' : null)
    ;

$classes = Flux::classes()
    ->add('group flex items-center px-2 py-2 lg:py-1.5 w-full')
    ->add('rounded-md')
    ->add('text-start text-sm font-medium')
    ->add(match ($variant) {
        'danger' => [
            'text-zinc-800 hover:text-red-600 hover:bg-red-50 dark:text-white dark:hover:bg-red-400/20 dark:hover:text-red-400',
            '**:data-navmenu-icon:text-zinc-400 dark:**:data-navmenu-icon:text-white/60 [&:hover_[data-navmenu-icon]]:text-current',
        ],
        'default' => [
            'text-zinc-800 hover:bg-zinc-50 dark:text-white dark:hover:bg-zinc-600',
            '**:data-navmenu-icon:text-zinc-400 dark:**:data-navmenu-icon:text-white/60 [&:hover_[data-navmenu-icon]]:text-current',
        ]
    })
    ->add($disabled ? 'text-zinc-400' : '')
    ;
?>

<?php if (!function_exists('_07770e4b33b38e95ba5e57ae973043a8')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button-or-link.blade.php', $__blaze->compiledPath.'/07770e4b33b38e95ba5e57ae973043a8.php'); require $__blaze->compiledPath.'/07770e4b33b38e95ba5e57ae973043a8.php'; } ?>
<?php if (isset($__slots07770e4b33b38e95ba5e57ae973043a8)) { $__slotsStack07770e4b33b38e95ba5e57ae973043a8[] = $__slots07770e4b33b38e95ba5e57ae973043a8; } ?>
<?php if (isset($__attrs07770e4b33b38e95ba5e57ae973043a8)) { $__attrsStack07770e4b33b38e95ba5e57ae973043a8[] = $__attrs07770e4b33b38e95ba5e57ae973043a8; } ?>
<?php $__attrs07770e4b33b38e95ba5e57ae973043a8 = ['attributes' => $attributes->class($classes),'dataFluxNavmenuItem' => true]; ?>
<?php $__slots07770e4b33b38e95ba5e57ae973043a8 = []; ?>
<?php $__blaze->pushData($__attrs07770e4b33b38e95ba5e57ae973043a8); ?>
<?php ob_start(); ?>
    <?php if ($indent): ?>
        <div class="w-7"></div>
    <?php endif; ?>

    <?php if (is_string($icon) && $icon !== ''): ?>
        <?php $blaze_memoized_key = \Livewire\Blaze\Memoizer\Memo::key("flux::icon", ['icon' => $icon, 'variant' => $iconVariant, 'class' => $iconClasses, 'dataNavmenuIcon' => true]); ?><?php if ($blaze_memoized_key !== null && \Livewire\Blaze\Memoizer\Memo::has($blaze_memoized_key)) : ?><?php echo \Livewire\Blaze\Memoizer\Memo::get($blaze_memoized_key); ?><?php else : ?><?php ob_start(); ?><?php if (!function_exists('_67cfd735fe19824f967450cd492c334e')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php', $__blaze->compiledPath.'/67cfd735fe19824f967450cd492c334e.php'); require $__blaze->compiledPath.'/67cfd735fe19824f967450cd492c334e.php'; } ?>
<?php $__blaze->pushData(['icon' => $icon,'variant' => $iconVariant,'class' => $iconClasses,'dataNavmenuIcon' => true]); ?>
<?php _67cfd735fe19824f967450cd492c334e($__blaze, ['icon' => $icon,'variant' => $iconVariant,'class' => $iconClasses,'dataNavmenuIcon' => true], [], ['icon', 'variant', 'class', 'dataNavmenuIcon'], ['dataNavmenuIcon' => 'data-navmenu-icon'], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?><?php $blaze_memoized_html = ob_get_clean(); ?><?php if ($blaze_memoized_key !== null) { \Livewire\Blaze\Memoizer\Memo::put($blaze_memoized_key, $blaze_memoized_html); } ?><?php echo $blaze_memoized_html; ?><?php endif; ?>
    <?php elseif ($icon): ?>
        <?php echo e($icon); ?>

    <?php endif; ?>

    <?php echo e($slot); ?>


    <?php if ($suffix): ?>
        <?php if (is_string($suffix)): ?>
            <div class="ms-auto opacity-50 text-xs">
                <?php echo e($suffix); ?>

            </div>
        <?php else: ?>
            <?php echo e($suffix); ?>

        <?php endif; ?>
    <?php endif; ?>

    <?php if (is_string($iconTrailing) && $iconTrailing !== ''): ?>
        <?php $blaze_memoized_key = \Livewire\Blaze\Memoizer\Memo::key("flux::icon", ['icon' => $iconTrailing, 'variant' => $iconVariant, 'class' => $trailingIconClasses]); ?><?php if ($blaze_memoized_key !== null && \Livewire\Blaze\Memoizer\Memo::has($blaze_memoized_key)) : ?><?php echo \Livewire\Blaze\Memoizer\Memo::get($blaze_memoized_key); ?><?php else : ?><?php ob_start(); ?><?php if (!function_exists('_67cfd735fe19824f967450cd492c334e')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php', $__blaze->compiledPath.'/67cfd735fe19824f967450cd492c334e.php'); require $__blaze->compiledPath.'/67cfd735fe19824f967450cd492c334e.php'; } ?>
<?php $__blaze->pushData(['icon' => $iconTrailing,'variant' => $iconVariant,'class' => $trailingIconClasses]); ?>
<?php _67cfd735fe19824f967450cd492c334e($__blaze, ['icon' => $iconTrailing,'variant' => $iconVariant,'class' => $trailingIconClasses], [], ['icon', 'variant', 'class'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?><?php $blaze_memoized_html = ob_get_clean(); ?><?php if ($blaze_memoized_key !== null) { \Livewire\Blaze\Memoizer\Memo::put($blaze_memoized_key, $blaze_memoized_html); } ?><?php echo $blaze_memoized_html; ?><?php endif; ?>
    <?php elseif ($iconTrailing): ?>
        <?php echo e($iconTrailing); ?>

    <?php endif; ?>
<?php $__slots07770e4b33b38e95ba5e57ae973043a8['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots07770e4b33b38e95ba5e57ae973043a8); ?>
<?php _07770e4b33b38e95ba5e57ae973043a8($__blaze, $__attrs07770e4b33b38e95ba5e57ae973043a8, $__slots07770e4b33b38e95ba5e57ae973043a8, ['attributes', 'dataFluxNavmenuItem'], ['dataFluxNavmenuItem' => 'data-flux-navmenu-item'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack07770e4b33b38e95ba5e57ae973043a8)) { $__slots07770e4b33b38e95ba5e57ae973043a8 = array_pop($__slotsStack07770e4b33b38e95ba5e57ae973043a8); } ?>
<?php if (! empty($__attrsStack07770e4b33b38e95ba5e57ae973043a8)) { $__attrs07770e4b33b38e95ba5e57ae973043a8 = array_pop($__attrsStack07770e4b33b38e95ba5e57ae973043a8); } ?>
<?php $__blaze->popData(); ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\navmenu\item.blade.php ENDPATH**/ ?>