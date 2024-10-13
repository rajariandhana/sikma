<div class="w-full p-4 bg-red-200 rounded-md shadow-md">
    <form action="">
        <input type="text" value="{{$category->name}}">
        <input type="text" value="{{$category->color}}">
        <input type="text">
    </form>
    <button wire:click="CloseModal">
clkosemodal
    </button>
</div>
