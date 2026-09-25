<?php
if (!function_exists('_533ef95f4ed28975051fb93fb56d7989')):
function _533ef95f4ed28975051fb93fb56d7989($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;

if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php
extract(Flux::forwardedAttributes($attributes, [
    'name',
    'multiple',
    'size',
]));
?>

<?php
$__defaults = [
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'multiple' => null,
    'size' => null,
];
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
$multiple ??= $attributes['multiple'] ?? $__defaults['multiple']; unset($attributes['multiple']);
$size ??= $attributes['size'] ?? $__defaults['size']; unset($attributes['size']);
unset($__defaults);
?>

<?php
$classes = Flux::classes()
    ->add('w-full flex items-center gap-4')
    ->add('[[data-flux-input-group]_&]:items-stretch [[data-flux-input-group]_&]:gap-0')

    // NOTE: We need to add relative positioning here to prevent odd overflow behaviors because of
    // "sr-only": https://github.com/tailwindlabs/tailwindcss/discussions/12429
    ->add('relative')
    ;

[ $styleAttributes, $attributes ] = Flux::splitAttributes($attributes);
?>

<div
    <?php echo e($styleAttributes->class($classes)); ?>

    data-flux-input-file
    wire:ignore
    tabindex="0"
    x-data="fluxInputFile({ files: '<?php echo e(__('files')); ?>', noFile: '<?php echo e(__('No file chosen')); ?>' })"
    x-on:click.prevent.stop="$refs.input.click()"
    x-on:keydown.enter.prevent.stop="$refs.input.click()"
    x-on:keydown.space.prevent.stop
    x-on:keyup.space.prevent.stop="$refs.input.click()"
    x-on:change="updateLabel($event)"
>
    <input
        x-ref="input"
        x-on:click.stop 
        type="file"
        class="sr-only"
        tabindex="-1"
        <?php echo e($attributes); ?> <?php echo e($multiple ? 'multiple' : ''); ?> <?php if($name): ?>name="<?php echo e($name); ?>"<?php endif; ?>
    >

    <?php if (!function_exists('_fb729f1fbb168c8ea37cb7f1e91b394a')) { $__blaze->compile('C:\wamp64\www\ecommerce\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php', $__blaze->compiledPath.'/fb729f1fbb168c8ea37cb7f1e91b394a.php'); require $__blaze->compiledPath.'/fb729f1fbb168c8ea37cb7f1e91b394a.php'; } ?>
<?php if (isset($__slotsfb729f1fbb168c8ea37cb7f1e91b394a)) { $__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a[] = $__slotsfb729f1fbb168c8ea37cb7f1e91b394a; } ?>
<?php if (isset($__attrsfb729f1fbb168c8ea37cb7f1e91b394a)) { $__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a[] = $__attrsfb729f1fbb168c8ea37cb7f1e91b394a; } ?>
<?php $__attrsfb729f1fbb168c8ea37cb7f1e91b394a = ['as' => 'div','class' => 'cursor-pointer','size' => $size,'ariaHidden' => 'true']; ?>
<?php $__slotsfb729f1fbb168c8ea37cb7f1e91b394a = []; ?>
<?php $__blaze->pushData($__attrsfb729f1fbb168c8ea37cb7f1e91b394a); ?>
<?php ob_start(); ?>
        <?php if ($multiple) : ?>
            <?php echo __('Choose files'); ?>

        <?php else : ?>
            <?php echo __('Choose file'); ?>

        <?php endif; ?>
    <?php $__slotsfb729f1fbb168c8ea37cb7f1e91b394a['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsfb729f1fbb168c8ea37cb7f1e91b394a); ?>
<?php _fb729f1fbb168c8ea37cb7f1e91b394a($__blaze, $__attrsfb729f1fbb168c8ea37cb7f1e91b394a, $__slotsfb729f1fbb168c8ea37cb7f1e91b394a, ['size'], ['ariaHidden' => 'aria-hidden'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a)) { $__slotsfb729f1fbb168c8ea37cb7f1e91b394a = array_pop($__slotsStackfb729f1fbb168c8ea37cb7f1e91b394a); } ?>
<?php if (! empty($__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a)) { $__attrsfb729f1fbb168c8ea37cb7f1e91b394a = array_pop($__attrsStackfb729f1fbb168c8ea37cb7f1e91b394a); } ?>
<?php $__blaze->popData(); ?>

    <div
        x-ref="name"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'cursor-default select-none truncate whitespace-nowrap text-sm text-zinc-500 dark:text-zinc-400 font-medium',
            '[[data-flux-input-group]_&]:flex-1 [[data-flux-input-group]_&]:border-e [[data-flux-input-group]_&]:border-y [[data-flux-input-group]_&]:shadow-xs [[data-flux-input-group]_&]:border-zinc-200 dark:[[data-flux-input-group]_&]:border-zinc-600 [[data-flux-input-group]_&]:px-4 [[data-flux-input-group]_&]:bg-white dark:[[data-flux-input-group]_&]:bg-zinc-700 [[data-flux-input-group]_&]:flex [[data-flux-input-group]_&]:items-center dark:[[data-flux-input-group]_&]:text-zinc-300',
        ]); ?>"
        aria-hidden="true"
    >
        <?php echo __('No file chosen'); ?>

    </div>
</div>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\wamp64\www\ecommerce\vendor\livewire\flux\stubs\resources\views\flux\input\file.blade.php ENDPATH**/ ?>