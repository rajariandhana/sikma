<div class="flex flex-col gap-y-2">
    @forelse ($presets as $preset)
        <div class="flex items-center justify-between w-full">
            <span class="bg-{{ $preset->category->color }}-300 text-{{ $preset->category->color }}-800 px-4 py-1 rounded-md shadow-md text-lg">
                {{$preset->category->name}} | {{ $preset->price }}
            </span>
            <div class="flex gap-x-2">
                <button wire:click="PresetShow({{ $preset->id }})" class="px-2 py-2 bg-white rounded-md shadow-md">
                    <svg class="w-6 h-6 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                    </svg>
                </button>
            </div>
        </div>
    @empty
        You have not set any preset
    @endforelse
    @isset($selectedPreset)
        <x-modal name="preset-details" title="Preset details">
            <x-slot:body>
                {{-- SEBAIKNYA PRESET GABISA DIEDIT --}}
                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Preset price</label>
                    <input type="numeric"disabled value="{{$selectedPreset->price}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Preset category</label>
                    <input type="text"disabled value="{{$selectedPreset->category->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                {{-- <form action="">
                    <div class="mb-5">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Preset price</label>
                        <input type="text" wire:model="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                </form> --}}
            </x-slot:body>
            <x-slot:footer>
                <button wire:click="PresetDelete"
                    class="flex items-center px-2 py-2 text-white rounded-md shadow-md bg-rose-500 gap-x-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                    <span>Remove</span>
                </button>
                {{-- <button wire:click="PresetUpdate"
                    class="flex items-center px-2 py-2 text-white bg-indigo-500 rounded-md shadow-md gap-x-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 11.917 9.724 16.5 19 7.5" />
                    </svg>
                    <span>Save</span>
                </button> --}}
            </x-slot:footer>
        </x-modal>
    @endisset
    {{-- @isset($PresetNew) --}}
        <x-modal name="preset-new-form" title="New Preset">
            <x-slot:body>
                <form action="">
                    <div class="mb-5">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Preset price</label>
                        <input type="numeric" wire:model="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                    <div class="mb-5">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                        <select wire:model="category_id"
                            class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 y-600">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </x-slot:body>
            <x-slot:footer>
                <button wire:click="PresetStore"
                    class="flex items-center px-2 py-2 text-white bg-indigo-500 rounded-md shadow-md gap-x-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 11.917 9.724 16.5 19 7.5" />
                    </svg>
                    <span>Create</span>
                </button>
            </x-slot:footer>
        </x-modal>
    {{-- @endisset --}}
    <button wire:click="PresetCreateForm" class="fixed flex px-4 py-2 text-white bg-indigo-500 rounded-md shadow-md gap-x-2 right-4 bottom-24">
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
          </svg>
        <span>Create Preset</span>
    </button>
</div>
