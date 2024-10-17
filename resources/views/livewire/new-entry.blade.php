<div>
    {{-- @if ($newEntry) --}}
        <form class="flex flex-col h-full p-4 bg-white rounded-md shadow-md gap-y-4" wire:submit.prevent="StoreEntry">
            <div class="flex w-full gap-x-4">
                <select wire:model="category_id" class="bg-gray-50 w-1/2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 y-600">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <input wire:model="date" type="date" class="bg-gray-50 w-1/2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" value="{{date('Y-m-d')}}">
            </div>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 border-e-0 rounded-s-md ">
                  Rp
                </span>
                <input type="numeric"wire:model="price" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5">
            </div>
            @error('price')
                <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
            <div class="flex justify-end w-full">
                <div class="flex flex-col justify-center w-full">
                    @if ($successMessage)
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="p-2 text-white bg-green-500 rounded">
                            {{ $successMessage }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-500 rounded-md w-fit">
                    Create
                </button>
            </div>

        </form>
</div>
