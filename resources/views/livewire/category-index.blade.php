<div class="flex flex-col gap-y-2">
    @forelse ($categories as $category)
        <div class="flex items-center justify-between w-full">
            <span
                class="bg-{{ $category->color }}-300 text-{{ $category->color }}-800 px-4 py-1 rounded-md shadow-md text-lg">{{ $category->name }}</span>
            <div class="flex gap-x-2">
                <button wire:click="CategoryShow({{ $category }})" class="px-2 py-2 bg-white rounded-md shadow-md">
                    <svg class="w-6 h-6 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                    </svg>
                </button>
            </div>
        </div>
    @empty
        You have not set any category
    @endforelse
    <button wire:click="CategoryCreateForm" class="fixed flex px-4 py-2 text-white bg-indigo-500 rounded-md shadow-md gap-x-2 right-4 bottom-24">
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
          </svg>
        <span>Create category</span>
    </button>
    @if ($form=='create')
        <x-modal-form title="Create category">
            <x-slot:body>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                    <input type="text" wire:model="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 ">Color</label>
                    <select wire:model="color"
                        class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 y-600">
                        @foreach ($colors as $color)
                            <option value="{{ $color }}">{{ $color }}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot:body>
            <x-slot:footer>
                <button wire:click="CategoryStore"
                    class="flex items-center px-2 py-2 text-white bg-indigo-500 rounded-md shadow-md gap-x-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 11.917 9.724 16.5 19 7.5" />
                    </svg>
                    <span>Create</span>
                </button>
            </x-slot:footer>
        </x-modal-form>
    @elseif ($form=='editing')
        <x-modal-form title="Edit category">
            <x-slot:body>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Category name</label>
                    <input type="text" wire:model="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 ">Color</label>
                    <select wire:model="color"
                        class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 y-600">
                        @foreach ($colors as $color)
                            <option value="{{ $color }}">{{ $color }}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot:body>
            <x-slot:footer>
                <button wire:click="CategoryDelete"
                    class="flex items-center px-2 py-2 text-white bg-rose-500 rounded-md shadow-md gap-x-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                      </svg>
                    <span>Remove</span>
                </button>
                <button wire:click="CategoryUpdate"
                    class="flex items-center px-2 py-2 text-white bg-indigo-500 rounded-md shadow-md gap-x-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 11.917 9.724 16.5 19 7.5" />
                    </svg>
                    <span>Save</span>
                </button>
            </x-slot:footer>
        </x-modal-form>
    @endif


</div>
