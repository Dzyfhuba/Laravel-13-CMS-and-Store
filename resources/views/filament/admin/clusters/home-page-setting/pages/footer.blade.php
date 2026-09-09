<x-filament-panels::page>
    {{-- Page content --}}
    {{-- TODO: How to submit by pressing Ctrl+S --}}
    <form wire:submit="submit" x-on:keydown.window.ctrl.s.prevent="$wire.submit()">
        {{ $this->form }}
        <x-filament::button type="submit" class="mt-3" x-on:keydown.window.ctrl.s.prevent="$wire.submit()">
            Save
        </x-filament::button>
    </form>
</x-filament-panels::page>