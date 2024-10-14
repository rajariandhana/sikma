@props(['title','footer'])

<div>
    {{-- Gray Background --}}
    <div class="fixed inset-0 bg-gray-900 opacity-40"></div>
    {{-- Modal Body --}}
    <div class="fixed inset-0 m-auto overflow-y-auto bg-white rounded-md shadow-md h-fit w-80">
        @csrf
        <div class="flex items-center justify-between px-4 py-2 border-b border-gray-300">
            <div class="text-xl text-gray-800">{{ $title }}</div>
            <button wire:click="Close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-4 ">
            {{ $body }}
        </div>
        @isset ($footer)
            <div class="flex items-center justify-between px-4 py-2 border-t border-gray-300 gap-x-4">
                {{$footer}}
            </div>
        @endisset
    </div>
</div>
