<?php

use App\Models\User;
use App\Models\Store;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component {
    public int $totalUsers = 0;
    public int $totalStores = 0;

    public function mount(): void
    {
        $this->totalUsers = User::count();
        $this->totalStores = Store::count();
    }
};
?>
<section class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
        <div
            class="flex items-center justify-center relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <p class="font-bold text-center text-zinc-900 dark:text-white">
                Aantal gebruikers: {{ $totalUsers }}
            </p>
        </div>
        <div
            class="flex items-center justify-center relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <p class="font-bold text-center text-zinc-900 dark:text-white">
                Aantal winkels: {{ $totalStores }}
            </p>
        </div>
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
    </div>
</section>
