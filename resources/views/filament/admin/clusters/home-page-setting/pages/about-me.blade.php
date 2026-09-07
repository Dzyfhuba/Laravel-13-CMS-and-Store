<x-filament-panels::page>
    {{-- Page content --}}
    <form wire:submit="submit">
        {{ $this->form }}
        <x-filament::button type="submit" class="mt-3">
            Save
        </x-filament::button>
    </form>
</x-filament-panels::page>