{{-- <div class="w-full flex justify-between items-center">
    <span class="bg-{{$category->color}}-300 text-{{$category->color}}-800 px-4 py-1 rounded-md shadow-md text-lg">{{$category->name}}</span>
    <div class="gap-x-2 flex">
        <button wire:click="Edit" class="bg-white px-2 py-2 rounded-md shadow-md">
            <svg class="w-6 h-6 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
              </svg>
        </button>
        <button wire:click="$emit('categoryDeleted', {{ $category->id }})" class="bg-white px-2 py-2 rounded-md shadow-md">
            <svg class="w-6 h-6 text-rose-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
              </svg>
        </button>
    </div>
</div> --}}
<div>
    @foreach ($categories as $category)
        {{-- @livewire('category-index',['category'=>$category]) --}}
        {{-- <x-modal name="category-edit-form" title="Contact Us Modal">
            <x-slot:body>
                @livewire('category-edit',['category'=>$category])
            </x-slot>
        </x-modal> --}}
        <div wire:key="{{$category->id}}" class="w-full flex justify-between items-center">
            <span
                class="bg-{{ $category->color }}-300 text-{{ $category->color }}-800 px-4 py-1 rounded-md shadow-md text-lg">{{ $category->name }}</span>
            <div class="gap-x-2 flex">
                <button wire:click="CategoryView({{$category}})"
                    class="bg-white px-2 py-2 rounded-md shadow-md">
                    <svg class="w-6 h-6 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                    </svg>
                </button>
                {{-- <button class="text-white px-3 py-1 bg-blue-500 rounded text-xs" x-data
                    @click="$dispatch('open-modal',{name:'category-edit-form'})">
                    Modal 2
                </button> --}}
                {{-- <button wire:click="$emit('categoryDeleted', {{ $category->id }})" class="bg-white px-2 py-2 rounded-md shadow-md">
                    <svg class="w-6 h-6 text-rose-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                      </svg>
                </button> --}}
            </div>
        </div>
    @endforeach
    @if ($selectedCategory)
        <x-modal name="category-details" title="View Category">
            <x-slot:body>
                Name: {{$category->name}}
            </x-slot:body>
        </x-modal>
    @endif

</div>
