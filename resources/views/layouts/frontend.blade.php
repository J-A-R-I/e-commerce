<x-layouts::frontend.header :title="$title ?? null">
    <flux:main container class="flex flex-col flex-1 justify-between">
        {{ $slot }}
    </flux:main>
</x-layouts::frontend.header>
