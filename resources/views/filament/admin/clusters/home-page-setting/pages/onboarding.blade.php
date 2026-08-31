<x-filament-panels::page>
    {{-- Page content --}}
    <form>
        {{ $this->form }}
        <x-filament::button wire:click="submit" type="submit">
            Save
        </x-filament::button>
    </form>
</x-filament-panels::page>