<?php

use Livewire\Component;

new class extends Component {
    public string $search = '';
};
?>

<section>
    <input wire:model.live='search' type="text">
</section>
