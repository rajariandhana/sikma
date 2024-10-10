<div>
    {{-- @if ($newEntry) --}}
        <form class="bg-white rounded-md shadow-md p-4 flex flex-col gap-y-4 h-full"  wire:submit.prevent="StoreEntry">
            <div class="flex gap-x-4">
                <select wire:model="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 y-600">
                    {{-- <option selected disabled>Category</option> --}}
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
                <input wire:model="date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{date('Y-m-d')}}">
                @error('date')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                  Rp
                </span>
                <input type="numeric"wire:model="price" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">
            </div>
            @error('price')
                <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
            <div class="w-full flex justify-end">
                <div class="flex flex-col justify-center w-full">
                    @if ($successMessage)
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-green-500 text-white p-2 rounded">
                            {{ $successMessage }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="bg-indigo-500 rounded-md px-4 py-2 w-fit text-white">
                    Create
                </button>
            </div>

        </form>
        @dump(App\Models\Entry::all())
    {{-- @endif --}}
    {{-- <div class="w-full fixed bottom-24 justify-end flex pr-16">
        <button class="" wire:click="NewEntry">
            <svg class="w-12 h-12 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div> --}}
</div>
