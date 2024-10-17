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
        <!-- @dump(App\Models\Entry::all()) -->
    {{-- @endif --}}
    {{-- <div class="fixed flex justify-end w-full pr-16 bottom-24">
        <button class="" wire:click="NewEntry">
            <svg class="w-12 h-12 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div> --}}
</div>
