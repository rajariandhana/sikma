<div class="grid grid-cols-2 w-full gap-4">
    @forelse ($presets as $preset)
    <button wire:click="EntryStore({{ $preset }})" class="bg-{{ $preset->category->color }}-300 text-{{ $preset->category->color }}-800 text-left px-4 py-1 rounded-md shadow-md text-lg">
        {{$preset->category->name}} | {{ $preset->price }}
    </button>
    @empty

    @endforelse
</div>
